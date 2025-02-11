<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ImportCsvToMisLoan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MisLoanImportController extends Controller
{
    
    public function index()
    {
        return view('administrator.import-loan');
    }
    
    public function import(Request $request)
    {
        // Validasi request
        $validator = Validator::make($request->all(), [
            'csv-file' => 'required|file|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Simpan file CSV ke storage
        $filePath = $request->file('csv-file')->store('csv-imports');

        // Dispatch job untuk memproses file CSV
        ImportCsvToMisLoan::dispatch($filePath);

        return response()->json(['message' => 'CSV import process has been queued.'], 200);
    }
}