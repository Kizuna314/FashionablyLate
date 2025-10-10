<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class OptimizePerformance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optimize:performance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize application performance by clearing caches and optimizing autoloader';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Starting performance optimization...');

        // Clear all caches
        $this->info('Clearing application caches...');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');

        // Optimize for production
        if (app()->environment('production')) {
            $this->info('Optimizing for production...');
            Artisan::call('config:cache');
            Artisan::call('route:cache');
            Artisan::call('view:cache');
        }

        // Optimize autoloader
        $this->info('Optimizing autoloader...');
        Artisan::call('optimize:autoloader');

        // Clear application cache
        $this->info('Clearing application cache...');
        Cache::flush();

        $this->info('Performance optimization completed!');
        
        return 0;
    }
}