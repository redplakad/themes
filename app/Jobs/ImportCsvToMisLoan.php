<?php

namespace App\Jobs;

use App\Models\MisLoan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class ImportCsvToMisLoan implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;

    /**
     * Create a new job instance.
     *
     * @param string $filePath
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Baca file CSV menggunakan library `league/csv`
        $csv = Reader::createFromPath(storage_path('app/' . $this->filePath), 'r');
        $csv->setHeaderOffset(0); // Baris pertama dianggap sebagai header

        // Proses setiap baris data
        foreach ($csv as $row) {
            // Simpan data ke database
            MisLoan::create($row);
        }

        // Hapus file CSV setelah selesai diimport
        Storage::delete($this->filePath);
    }
}