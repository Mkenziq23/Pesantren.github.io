@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-4">
        <div class="box-header">
            <form action="{{ route('Jadwal-Pelajaran.index') }}" class="form-horizontal" method="get" accept-charset="utf-8">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="unit_id" class="form-label">Pilih Unit Pesantren</label>
                            <select style="width: 100%;" id="unit_id" name="unit_id" class="form-control" required>
                                <option value="" disabled selected>--- Pilih Unit Pesantren ---</option>
                                @foreach ($unit as $u)
                                    <option value="{{ $u->id }}" {{ $selectedUnit == $u->id ? 'selected' : '' }}>
                                        {{ $u->unit }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="kelas_id" class="form-label">Pilih Kelas</label>
                            <select style="width: 100%;" id="kelas_id" name="kelas_id" class="form-control" required="">
                                <option value="" disabled selected>--- Pilih Kelas ---</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}" {{ $selectedClass == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="semester_id" class="form-label">Pilih Semester</label>
                            <select style="width: 100%;" id="semester_id" name="semester_id" class="form-control"
                                required="">
                                <option value="" disabled selected>--- Pilih Semester ---</option>
                                @foreach ($semester as $s)
                                    <option value="{{ $s->id }}" {{ $selectedSemester == $s->id ? 'selected' : '' }}>
                                        {{ $s->nama_semester }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="tahunajaran_id" class="form-label">Pilih Tahun Ajaran</label>
                            <select style="width: 100%;" id="tahunajaran_id" name="tahunajaran_id" class="form-control"
                                required="">
                                <option value="" disabled selected>--- Pilih Tahun Ajaran ---</option>
                                @foreach ($tahunajaran as $ta)
                                    <option value="{{ $ta->id }}"
                                        {{ $selectedTahunajaran == $ta->id ? 'selected' : '' }}>
                                        {{ $ta->tahun_awal }}/{{ $ta->tahun_akhir }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-3 mx-auto text-center">
                            <label class="invisible">Submit</label>
                            <button type="submit" class="btn btn-primary form-control"><i class="fa fa-search"></i>
                                Pilih</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="box box-success mt-4">
            <div class="box-body">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#matapelajaran-modal" type="button">
                    <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                </button>
                <div class="mt-3">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td class="fw-bold">Unit</td>
                                <td>:</td>
                                <td>{{ $selectedUnit ? $unit->find($selectedUnit)->unit : 'Belum dipilih' }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kelas</td>
                                <td>:</td>
                                <td>{{ $selectedClass ? $kelas->find($selectedClass)->nama_kelas : 'Belum dipilih' }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Semester</td>
                                <td>:</td>
                                <td>
                                    {{ $selectedSemester ? $semester->find($selectedSemester)->nama_semester : 'Belum dipilih' }}
                                    (
                                    {{ $selectedTahunajaran ? $tahunajaran->find($selectedTahunajaran)->tahun_awal : 'Belum dipilih' }}/{{ $selectedTahunajaran ? $tahunajaran->find($selectedTahunajaran)->tahun_akhir : 'Belum dipilih' }}
                                    )
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if ($selectedUnit && $selectedClass)
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body p-5 bg-dark rounded">
                        <div class="table-responsive p-0">
                            @php
                                $daysOfWeek = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                            @endphp
                            <div class="row bg-dark">
                                @foreach ($daysOfWeek as $day)
                                    <div class="col-6 mt-4">
                                        <div class="card mb-4">
                                            <div class="card-body p-3">
                                                <h5 class="card-title">{{ $day }}</h5>
                                                <table class="table table-striped align-items-center mb-0"
                                                    style="width: 100%">
                                                    <thead class="bg-gradient-primary">
                                                        <tr>
                                                            <th
                                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                                No</th>
                                                            <th
                                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                                Mata Pelajaran</th>
                                                            <th
                                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                                Waktu</th>
                                                            <th
                                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($jadwalpelajaran as $index => $item)
                                                            @if ($item->hari == $day)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $item->matapelajaran->nama_mapel }}</td>
                                                                    <td>{{ $item->jampelajaran->jam_mulai }} S/d
                                                                        {{ $item->jampelajaran->jam_berakhir }}</td>
                                                                    <td>
                                                                        <form
                                                                            action="{{ route('Jadwal-Pelajaran.destroy', $item->id) }}"
                                                                            method="POST" style="display: inline-block;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn border-none border-0 bg-transparent">
                                                                                <i
                                                                                    class="fas fa-trash fs-5 text-danger"></i>
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Updated Modal for adding data with day selection -->
    <div class="modal fade" id="matapelajaran-modal" tabindex="-1" role="dialog"
        aria-labelledby="matapelajaran-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="matapelajaran-modal-label">Tambah Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('Jadwal-Pelajaran.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="hari" class="form-label">Pilih Hari</label>
                            <select style="width: 100%;" id="hari" name="hari" class="form-control" required>
                                <option value="" disabled selected>--- Pilih Hari ---</option>
                                @php
                                    $daysOfWeek = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                @endphp
                                @foreach ($daysOfWeek as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="matapelajaran_id">Mata Pelajaran<small data-toggle="tooltip" title=""
                                    data-original-title="Wajib diisi">*</small></label>
                            <select name="matapelajaran_id" id="matapelajaran_id" class="form-control" required>
                                <option value="" disabled selected>--Pilih Mata Pelajaran--</option>
                                @foreach ($matapelajaran as $mp)
                                    <option value="{{ $mp->id }}">{{ $mp->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jampelajaran_id">Waktu<small data-toggle="tooltip" title=""
                                    data-original-title="Wajib diisi">*</small></label>
                            <select name="jampelajaran_id" id="jampelajaran_id" class="form-control" required>
                                <option value="" disabled selected>--Pilih Jam Pelajaran--</option>
                                @foreach ($jampelajaran as $jp)
                                    <option value="{{ $jp->id }}">{{ $jp->keterangan }} ({{ $jp->jam_mulai }} S/d
                                        {{ $jp->jam_berakhir }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="unit_id" value="{{ $selectedUnit }}">
                        <input type="hidden" name="kelas_id" value="{{ $selectedClass }}">
                        <input type="hidden" name="semester_id" value="{{ $selectedSemester }}">
                        <input type="hidden" name="tahunajaran_id" value="{{ $selectedTahunajaran }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
