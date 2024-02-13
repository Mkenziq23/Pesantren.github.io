<?php

namespace App\Exports;

use App\Models\Presensi_Khusus;
use Maatwebsite\Excel\Concerns\FromCollection;

class PresensiKhususExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Presensi_Khusus::with(['pegawai', 'dataareapresensi'])
            ->select('tanggal', 'pegawai_id', 'lokasi_id', 'keterangan')
            ->get();
    }

     public function headings(): array
    {
        return [
            'Tanggal',
            'Nama Pegawai',
            'Lokasi Absen',
            'Keterangan',
        ];
    }

    public function map($row): array
    {
       return [
            $row->tanggal,
            $row->pegawai->nama_lengkap,
            $row->dataareapresensi->nama_area,
            $row->keterangan,
        ];
    }
}
