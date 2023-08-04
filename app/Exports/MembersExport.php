<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;

class MembersExport implements FromCollection
{
    protected $members;

    public function __construct(Collection $members)
    {
        $this->members = $members;
    }

    public function collection()
    {
        return $this->members;
    }
}
