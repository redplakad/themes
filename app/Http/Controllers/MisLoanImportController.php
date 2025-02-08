<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MisLoan;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class MisLoanImportController extends Controller
{
    public function index()
    {
        return view('administrator.import-loan');
    }

    public function import(Request $request)
    {
        // Validasi file
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        $file = $request->file('csv_file');

        // Buka file dan proses data
        $handle = fopen($file->getPathname(), "r");
        $header = fgetcsv($handle, 1000, ","); // Ambil header

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $row = array_combine($header, $data); // Gabungkan header dengan data

            MisLoan::create([
                'DATADATE' => $row['DATADATE'] ?? null,
                'CAB' => $row['CAB'] ?? null,
                'NOMOR_REKENING' => $row['NOMOR_REKENING'] ?? null,
                'NO_CIF' => $row['NO_CIF'] ?? null,
                'NAMA_NASABAH' => $row['NAMA_NASABAH'] ?? null,
                'ALAMAT' => $row['ALAMAT'] ?? null,
                'KODE_KOLEK' => $row['KODE_KOLEK'] ?? null,
                'JML_HRI_PKK' => $row['JML_HRI_PKK'] ?? null,
                'JML_HARI_BGA' => $row['JML_HARI_BGA'] ?? null,
                'JML_HARI_TUNGGAKAN' => $row['JML_HARI_TUNGGAKAN'] ?? null,
                'KD_PRD' => $row['KD_PRD'] ?? null,
                'KET_KD_PRD' => $row['KET_KD_PRD'] ?? null,
                'NOMOR_PERJANJIAN' => $row['NOMOR_PERJANJIAN'] ?? null,
                // Tambahkan semua kolom lain sesuai model
            ]);
        }

        fclose($handle);

        return back()->with('success', 'File CSV berhasil diimpor.');
    }
}
