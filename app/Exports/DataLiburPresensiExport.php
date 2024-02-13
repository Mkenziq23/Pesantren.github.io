<?php

namespace App\Exports;

use App\Models\Data_Libur_Presensi;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataLiburPresensiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data_Libur_Presensi::select([
            'hari', 'keterangan'
        ])->get();
    }

    public function headings(): array{
        return [
            'Hari',
            'Keterangan',
        ];
    }

    public function map($row): array{
        return([
            $row->hari,
            $row->keterangan
        ]);
    }
}
