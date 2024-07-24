<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('contact.index', compact('categories'));
    }

    public function confirm(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        return view('contact.confirm', compact('inputs'));
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'address',
            'building',
            'category_id',
            'detail'
        ]);
        $data['tel'] = $request->input('tel_part1') . $request->input('tel_part2') . $request->input('tel_part3');
        // デバッグ用
        // dd($data);
            $contact = Contact::create($data);
        return redirect()->route('contact.thanks');
    }

    public function thanks()
    {
        return view('contact.thanks');
    }

    public function fix(Request $request){
        $inputs = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel_part1',
            'tel_part2',
            'tel_part3',
            'address',
            'building',
            'category_id',
            'detail'
        ]);

        // カテゴリの配列を定義
        $categories = [
            1 => '商品のお届けについて',
            2 => '商品の交換について',
            3 => '商品トラブル',
            4 => 'ショップへのお問い合わせ',
            5 => 'その他'
        ];
        // return $categories;
        return view('contact.fix', compact('inputs', 'categories'));
    }
}