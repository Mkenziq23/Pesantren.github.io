@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="pull-right mb-2">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#presensikhusus-modal"
                                    type="button">
                                    <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                                </button>
                                <a href="{{ route('presensikhusus.export') }}" type="blank" class="btn btn-info"
                                    style="color: white; text-decoration: none;" target="blank">
                                    <i class="fas fa-file-export text-dark"></i> Export
                                </a>
                            </div>
                            <h6>Jabatan Data Area Presensi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table id="presensikhusus" class="table table-striped align-items-center mb-0"
                                    style="width: 100%">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                No</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Tanggal</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Pegawai</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Lokasi Absen</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Keterangan</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center font-weight-bold mb-0">
                                        @foreach ($presensikhusus as $pk)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pk->tanggal }}</td>
                                                <td>{{ $pk->Pegawai->nama_lengkap }}</td>
                                                <td>{{ $pk->dataareapresensi->nama_area }}</td>
                                                <td>{{ $pk->keterangan }}</td>
                                                <td>
                                                    <button class="btn edit-presensikhusus-btn" data-bs-toggle="modal"
                                                        data-bs-target="#edit-presensikhusus-modal"
                                                        data-id="{{ $pk->id }}" data-tanggal="{{ $pk->tanggal }}"
                                                        data-pegawai="{{ $pk->pegawai->nama_lengkap }}"
                                                        data-lokasi="{{ $pk->dataareapresensi->nama_area }}"
                                                        data-keterangan="{{ $pk->keterangan }}">
                                                        <i class="fas fa-user-edit fs-5 text-secondary"></i>
                                                    </button>

                                                    <form action="{{ route('presensikhusus.destroy', $pk->id) }}"
                                                        method="POST" style="display: inline;"
                                                        onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn border-none border-0 bg-transparent">
                                                            <i class="fas fa-trash-alt fs-5 text-danger"></i>
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

    <!-- Tambah Modal -->
    <div class="modal fade" id="presensikhusus-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Presensi Khusus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('presensikhusus.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group md-5 mb-3">
                                <label for="tanggal" class="form-control-label">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    id="tanggal" name="tanggal" required autofocus value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-2 pb-2">
                            <label for="pegawai_id">Nama Pegawai</label>
                            <select class="select form-control" name="pegawai_id" id="pegawai_id" required>
                                <option value="" disabled selected>-- Pilih Pegawai --</option>
                                @foreach ($pegawai as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2 pb-2">
                            <label for="lokasi_id">Lokasi</label>
                            <select class="select form-control" name="lokasi_id" id="lokasi_id" required>
                                <option value="" disabled selected>-- Pilih Lokasi --</option>
                                @foreach ($dataareapresensi as $dap)
                                    <option value="{{ $dap->id }}">{{ $dap->nama_area }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                placeholder="Masukkan Keterangan" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn border-none border-0 bg-transparent">
                                <i class="fas fa-save text-success" style="font-size: 20px;"></i>
                            </button>
                            <button type="button" class="btn border-none border-0 bg-transparent"
                                data-bs-dismiss="modal"><i class="fas fa-window-close text-danger"
                                    style="font-size: 20px"></i></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="edit-presensikhusus-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Presensi Khusus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-presensikhusus-form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group md-5 mb-3">
                                <label for="edit_tanggal" class="form-control-label">Tanggal</label>
                                <input type="date" class="form-control" id="edit_tanggal" name="tanggal" required>
                            </div>
                        </div>
                        <div class="form-group mb-2 pb-2">
                            <label for="edit_pegawai_id">Nama Pegawai</label>
                            <select class="select form-control" name="pegawai_id" id="edit_pegawai_id" required>
                                @foreach ($pegawai as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2 pb-2">
                            <label for="edit_lokasi_id">Lokasi</label>
                            <select class="select form-control" name="lokasi_id" id="edit_lokasi_id" required>
                                @foreach ($dataareapresensi as $dap)
                                    <option value="{{ $dap->id }}">{{ $dap->nama_area }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="edit_keterangan" name="keterangan" required>
                        </div>
                        <div class="text-center">
                            <div class="text-center">
                                <button type="submit" class="btn border-none border-0 bg-transparent">
                                    <i class="fas fa-save text-success" style="font-size: 20px;"></i>
                                </button>
                                <button type="button" class="btn border-none border-0 bg-transparent"
                                    data-bs-dismiss="modal"><i class="fas fa-window-close text-danger"
                                        style="font-size: 20px"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- JS Bootstrap --}}


    <script>
        $(document).ready(function() {
            $('#presensikhusus').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "pageLength": 10
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-presensikhusus-btn');
            const editForm = document.getElementById('edit-presensikhusus-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const tanggal = button.getAttribute('data-tanggal');
                    const pegawai = button.getAttribute('data-pegawai');
                    const lokasi = button.getAttribute('data-lokasi');
                    const keterangan = button.getAttribute('data-keterangan');

                    editForm.action = '/kepegawaian/presensikhusus/' + id;

                    document.getElementById('edit_tanggal').value = tanggal;
                    document.getElementById('edit_pegawai_id').value = pegawai;
                    document.getElementById('edit_lokasi_id').value = lokasi;
                    document.getElementById('edit_keterangan').value = keterangan;

                });
            });
        });
    </script>
@endsection
