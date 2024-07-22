<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\Storage;


class OptimizeImages
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
        // Check if the request contains files
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Validate the file type
            if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif', 'svg'])) {
                // Store the file temporarily
                $path = $file->store('temp', 'public');
                $filePath = storage_path('app/public/' . $path);

                // Optimize the image
                $optimizerChain = OptimizerChainFactory::create();
                $optimizerChain->optimize($filePath);

                // Replace the original file in the request with the optimized one
                $request->files->set('image', new \Illuminate\Http\UploadedFile($filePath, $file->getClientOriginalName(), null, null, true));
            }
        }

        return $next($request);
    }
}
