<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomServeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'serve:custom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the Laravel development server on a custom host and port';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $host = '0.0.0.0';
        $port = env('PORT', 8000); // Use the PORT environment variable or default to 8000

        $this->info("Laravel development server started on http://{$host}:{$port}/");

        passthru(sprintf(
            '%s -S %s:%s %s/server.php',
            PHP_BINARY,
            $host,
            $port,
            base_path()
        ));
    }
}