<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\ContactsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->paginate(7);
        
        // Cache categories for 1 hour
        $categories = Cache::remember('categories', 3600, function () {
            return Category::all();
        });
        
        return view('admin.index', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        // Create cache key based on search parameters
        $cacheKey = 'search_' . md5(serialize($request->only(['search', 'gender', 'category', 'date'])));
        
        $contacts = Cache::remember($cacheKey, 300, function () use ($request) {
            $query = Contact::query()->with('category');

            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
                });
            }

            if ($request->filled('gender')) {
                $query->where('gender', $request->input('gender'));
            }

            if ($request->filled('category')) {
                $query->where('category_id', $request->input('category'));
            }

            if ($request->filled('date')) {
                $query->whereDate('created_at', $request->input('date'));
            }

            return $query->paginate(7);
        });
        
        // Cache categories for 1 hour
        $categories = Cache::remember('categories', 3600, function () {
            return Category::all();
        });

        return view('admin.index', compact('contacts', 'categories'));
    }

    public function export()
    {
        return Excel::download(new ContactsExport, 'contacts.csv');
    }
}