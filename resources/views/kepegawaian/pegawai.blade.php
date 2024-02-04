@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">

                            <div class="pull-right mb-2">
                                <a href="{{ route('kepegawaian.create') }}">
                                    <button class="btn btn-success" type="button">
                                        Tambah Pegawai
                                    </button>
                                </a>
                            </div>
                            <h6>Pegawai Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table id="data_santri" class="table table-striped align-items-center mb-0"
                                    style="width: 100%">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th class="align-middle text-center text-white font-weight-bolder">
                                                Id</th>
                                            <th class="align-middle text-center text-white font-weight-bolder">
                                                Nip</th>
                                            <th class="align-middle text-center text-white font-weight-bolder">
                                                Nama</th>
                                            <th class="align-middle text-center text-white font-weight-bolder">
                                                Unit Sekolah</th>
                                            <th class="align-middle text-center text-white font-weight-bolder">
                                                Jabatan</th>
                                            <th class="align-middle text-center text-white font-weight-bolder">
                                                Status Kepegawaian</th>
                                            <th class="align-middle text-center text-white font-weight-bolder">
                                                No.Telepon/Hp</th>
                                            <th class="align-middle text-center text-white font-weight-bolder">
                                                Status</th>
                                            <th class="align-middle text-center text-white font-weight-bolder">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center mb-0">
                                        @foreach ($pegawai as $pegawai)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pegawai->nip }}</td>
                                                <td>{{ $pegawai->nama_lengkap }}</td>
                                                <td>{{ $pegawai->unit_sekolah }}</td>
                                                <td>{{ $pegawai->Jabatan_Pegawai->nama_jabatan }}</td>
                                                <td>{{ $pegawai->status_kepegawaian }}</td>
                                                <td>{{ $pegawai->telephone }}</td>
                                                <td>
                                                    @if ($pegawai->status == 'Aktif')
                                                        <i class="fas fa-check-circle text-success"></i>
                                                    @elseif($pegawai->status == 'Tidak Aktif')
                                                        <i class="fas fa-times-circle text-danger"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('show', ['pegawai' => $pegawai]) }}">
                                                        <button class=" btn border-none border-0" type="button">
                                                            <i class="fas fa-eye fs-5 text-info "></i>
                                                        </button>
                                                    </a>

                                                    <a href="{{ route('edit', ['pegawai' => $pegawai]) }}">
                                                        <button class="btn border-none border-0" type="button">
                                                            <i class="fas fa-user-edit fs-5 text-secondary "></i>
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('kepegawaian.pegawai.destroy', $pegawai->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn border-0 bg-transparent">
                                                            <i class="fas fa-trash-alt fs-5 text-danger "></i>

                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
