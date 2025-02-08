<?php

namespace App\Repositories;

use App\Models\MisLoan;
use Illuminate\Support\Facades\DB;

class MisLoanRepository
{
    public function store(array $data)
    {
        return MisLoan::create($data);
    }

    public function getAll()
    {
        return MisLoan::all();
    }
}
