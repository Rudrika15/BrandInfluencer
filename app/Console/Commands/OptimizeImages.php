<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class OptimizeImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:optimize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize all images in the public folder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get all files in the public directory and its subdirectories
        $files = File::allFiles(public_path());

        // Create an optimizer chain
        $optimizerChain = OptimizerChainFactory::create();

        // Loop through each file and optimize it
        foreach ($files as $file) {
            if (in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                $filePath = $file->getRealPath();
                try {
                    $optimizerChain->optimize($filePath);
                    $this->info("Optimized: {$filePath}");
                } catch (\Exception $e) {
                    $this->error("Failed to optimize: {$filePath} - {$e->getMessage()}");
                }
            }
        }

        $this->info('All images in the public folder have been optimized.');
        return 0;
    }
}
