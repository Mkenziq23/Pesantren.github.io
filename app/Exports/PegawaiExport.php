<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PegawaiExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Include only the specified columns in the export
        return Pegawai::select(
            'nip', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir',
            'pendidikan_terakhir', 'unit_sekolah', 'jabatan_id', 'status_kepegawaian',
            'alamat', 'telephone', 'email','tanggal_masuk', 'tanggal_keluar',
            'status'
        )->get();
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama Lengkap',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Pendidikan Terakhir',
            'Unit Sekolah',
            'Jabatan',
            'Status Kepegawaian',
            'Alamat',
            'Telephone',
            'Email',
            'Tanggal Masuk',
            'Tanggal Keluar',
            'Status',
        ];
    }

    public function map($row): array
    {
        return [
            "'" . $row->nip,
            $row->nama_lengkap,
            $row->jenis_kelamin,
            $row->tempat_lahir,
            $row->tanggal_lahir,
            $row->pendidikan_terakhir,
            $row->unit_sekolah,
            $row->Jabatan_Pegawai->nama_jabatan,
            $row->status_kepegawaian,
            $row->alamat,
            $row->telephone,
            $row->email,
            $row->tanggal_masuk,
            $row->tanggal_keluar,
            $row->status,
        ];
    }
}
