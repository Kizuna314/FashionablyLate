<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CompressResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Only compress if the client accepts gzip encoding
        if ($request->header('Accept-Encoding') && strpos($request->header('Accept-Encoding'), 'gzip') !== false) {
            $content = $response->getContent();
            
            // Only compress if content is larger than 1KB
            if (strlen($content) > 1024) {
                $compressed = gzencode($content, 6); // Compression level 6 (good balance)
                
                if ($compressed !== false) {
                    $response->setContent($compressed);
                    $response->headers->set('Content-Encoding', 'gzip');
                    $response->headers->set('Content-Length', strlen($compressed));
                }
            }
        }

        return $response;
    }
}