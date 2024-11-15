<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ImportStatService;
use Illuminate\Support\Facades\Storage;

class ImportStatsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-stats {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import stats from CSV files';

    public function __construct(ImportStatService $importStatService)
    {
        parent::__construct();
        $this->importStatService = $importStatService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = $this->argument('filename');
        $path = storage_path($filename);

        if (!file_exists($path)) {
            $this->error("File not found: $filename");
            return 1;
        }

        $data = array_map('str_getcsv', file($path));
        $headers = array_shift($data);
        $csvData = array_map(fn($row) => array_combine($headers, $row), $data);

        $this->importStatService->importStats($csvData);

        $this->info('Stats imported successfully!');
        return 0;
    }
}
