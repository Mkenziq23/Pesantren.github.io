@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h4>Data Area Presensi</h4>
                            <div class="pull-right mb-2">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#dataareapresensi-modal"
                                    type="button" class="btn bg-gradient-success btn-block mb-3">
                                    <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                                </button>
                                <a href="{{ route('dataareapresensi.export') }}" type="blank" class="btn btn-info"
                                    style="color: white; text-decoration: none;" target="_blank">
                                    <i class="fas fa-file-export text-dark"></i> Export
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table id="data_areapresensi" class="table table-striped align-items-center mb-0"
                                    style="width: 100%">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                No</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Nama Area</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Longi</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Lati</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Keterangan</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center font-weight-bold mb-0">
                                        @foreach ($dataareapresensi as $dap)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dap->nama_area }}</td>
                                                <td>{{ $dap->longi }}</td>
                                                <td>{{ $dap->lati }}</td>
                                                <td>{{ $dap->keterangan }}</td>
                                                <td>
                                                    <button class="btn  edit-dataareapresensi-btn" data-bs-toggle="modal"
                                                        data-bs-target="#edit-dataareapresensi-modal"
                                                        data-id="{{ $dap->id }}" data-nama-area="{{ $dap->nama_area }}"
                                                        data-longi="{{ $dap->longi }}" data-lati="{{ $dap->lati }}"
                                                        data-keterangan="{{ $dap->keterangan }}">
                                                        <i class="fas fa-user-edit fs-5 text-secondary "></i>
                                                    </button>
                                                    <form action="{{ route('dataareapresensi.destroy', $dap->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn border-none border-0 bg-transparent" type="button">
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

    <!-- Tambah Modal -->
    <div class="modal fade" id="dataareapresensi-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Area Presensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dataareapresensi.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_area" class="form-label">Nama Area</label>
                            <input type="text" class="form-control" id="nama_area" name="nama_area" required>
                        </div>
                        <div class="mb-3">
                            <label for="longi" class="form-label">Longi</label>
                            <input type="text" class="form-control" id="longi" name="longi" required>
                        </div>
                        <div class="mb-3">
                            <label for="lati" class="form-label">Lati</label>
                            <input type="text" class="form-control" id="lati" name="lati" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
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
    <div class="modal fade" id="edit-dataareapresensi-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Area Presensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-dataareapresensi-form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="edit_nama_area" class="form-label">Nama Area</label>
                            <input type="text" class="form-control" id="edit_nama_area" name="nama_area" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_longi" class="form-label">Longi</label>
                            <input type="text" class="form-control" id="edit_longi" name="longi" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_lati" class="form-label">Lati</label>
                            <input type="text" class="form-control" id="edit_lati" name="lati" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="edit_keterangan" name="keterangan" required>
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

    {{-- JS Bootstrap --}}


    <script>
        $(document).ready(function() {
            $('#data_areapresensi').DataTable({
                "lengthMenu": [
                    [6, 10, 25, -1],
                    [6, 10, 25, "All"]
                ],
                "pageLength": 6
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Handle click on Edit button
            const editButtons = document.querySelectorAll('.edit-dataareapresensi-btn');
            const editForm = document.getElementById('edit-dataareapresensi-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const nama_area = button.getAttribute('data-nama-area');
                    const longi = button.getAttribute('data-longi');
                    const lati = button.getAttribute('data-lati');
                    const keterangan = button.getAttribute('data-keterangan');

                    editForm.action = editForm.action = '/kepegawaian/dataareapresensi/' + id;

                    document.getElementById('edit_nama_area').value = nama_area;
                    document.getElementById('edit_longi').value = longi;
                    document.getElementById('edit_lati').value = lati;
                    document.getElementById('edit_keterangan').value = keterangan;
                });
            });
        });
    </script>
@endsection
