@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h4 class="">Pegawai Table</h4>
                            <div class="pull-right mb-2">
                                <a href="{{ route('pegawai.create') }}">
                                    <button class="btn btn-success" type="button">
                                        <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                                    </button>
                                </a>
                                <a type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importModal"
                                    style="color: white; text-decoration: none;">
                                    <i class="fas fa-file-import text-dark"></i> import
                                </a>
                                <a href="{{ route('pegawai.export') }}" type="blank" class="btn btn-danger"
                                    style="color: white; text-decoration: none;" target="_blank">
                                    <i class="fas fa-file-export text-dark"></i> Export
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table id="data_pegawai" class="table table-striped align-items-center mb-0"
                                style="width: 100%">
                                <thead class="bg-gradient-primary">
                                    <tr>
                                        <th class="align-middle text-center text-white font-weight-bolder">
                                            No</th>
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
                                                <a href="{{ route('pegawai.show', ['pegawai' => $pegawai]) }}">
                                                    <button class=" btn border-none border-0" type="button">
                                                        <i class="fas fa-eye fs-5 text-info "></i>
                                                    </button>
                                                </a>

                                                <a href="{{ route('pegawai.edit', ['pegawai' => $pegawai]) }}">
                                                    <button class="btn border-none border-0" type="button">
                                                        <i class="fas fa-user-edit fs-5 text-secondary "></i>
                                                    </button>
                                                </a>
                                                <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST"
                                                    style="display: inline;">
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

    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pegawai.import') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data_pegawai').DataTable({
                "lengthMenu": [
                    [5, 10, 15, 25, -1],
                    [5, 10, 15, 25, "All"]
                ],
                "pageLength": 5
            });
        });
    </script>
@endsection
