<?php

namespace App\Exports;

use App\Models\Data_Area_Presensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping; 

class DataAreaPresensiExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data_Area_Presensi::all();
    }

    public function headings(): array
    {
        return [
            'Nama Area',
            'Longi',
            'Lati',
            'Keterangan',
        ];
    }

    // Add this method for mapping
    public function map($row): array
    {
        return [
            $row->nama_area,
            $row->longi,
            $row->lati,
            $row->keterangan,
        ];
    }
}
