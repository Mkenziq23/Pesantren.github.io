@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h4>Data Libur Presensi</h4>
                            <div class="pull-right mb-2">
                                <button class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#dataliburpresensi-modal" type="button">
                                    <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                                </button>
                                <a href="{{ route('dataliburpresensi.export') }}" type="blank" class="btn btn-info"
                                    style="color: white; text-decoration: none;" target="blank">
                                    <i class="fas fa-file-export text-dark"></i> Export
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table id="dataliburpresensi" class="table table-striped align-items-center mb-0"
                                    style="width: 100%">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                No
                                            </th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Hari
                                            </th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Keterangan
                                            </th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center font-weight-bold mb-0">
                                        @foreach ($dataliburpresensi as $dlp)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dlp->hari }}</td>
                                                <td>{{ $dlp->keterangan }}</td>
                                                <td>
                                                    <button class="btn edit-dataliburpresensi-btn" data-bs-toggle="modal"
                                                        data-bs-target="#edit-dataliburpresensi-modal"
                                                        data-id="{{ $dlp->id }}" data-hari="{{ $dlp->hari }}"
                                                        data-keterangan="{{ $dlp->keterangan }}">
                                                        <i class="fas fa-user-edit fs-5 text-secondary"></i>
                                                    </button>

                                                    <form action="{{ route('data-libur-presensi.destroy', $dlp->id) }}"
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
    <div class="modal fade" id="dataliburpresensi-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Libur Presensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-libur-presensi.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label for="hari" class="form-label">Hari</label>
                                <select class="form-control" id="hari" name="hari" required>
                                    <option disabled selected>--Pilih Hari--</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="edit-dataliburpresensi-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Libur Presensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-dataliburpresensi-form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3">
                                <label for="edit_hari" class="form-label">Hari</label>
                                <select class="form-control" id="edit_hari" name="hari" required>
                                    <option disabled selected>--Pilih Hari--</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit_keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="edit_keterangan" name="keterangan"
                                    required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn border-none border-0 bg-transparent">
                                    <i class="fas fa-save text-success" style="font-size: 25px;"></i>
                                </button>
                                <button type="button" class="btn border-none border-0 bg-transparent"
                                    data-bs-dismiss="modal"><i class="fas fa-window-close text-danger"
                                        style="font-size: 25px"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- JS Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataliburpresensi').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "pageLength": 10
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-dataliburpresensi-btn');
            const editForm = document.getElementById('edit-dataliburpresensi-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const hari = button.getAttribute('data-hari');
                    const keterangan = button.getAttribute('data-keterangan');

                    console.log(id, hari, keterangan);

                    editForm.action = '/kepegawaian/data-libur-presensi/' + id;
                    document.getElementById('edit_hari').value = hari;
                    document.getElementById('edit_keterangan').value = keterangan;
                });
            });
        });
    </script>
@endsection
