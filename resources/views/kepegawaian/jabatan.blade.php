@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="pull-right mb-2">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#jabatan-modal"
                                    type="button" class="btn bg-gradient-success btn-block mb-3">
                                    <span>Tambah Jabatan</span>
                                </button>
                            </div>
                            <h6>Jabatan Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table id="data_santri" class="table table-striped align-items-center mb-0"
                                    style="width: 100%">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Id</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Kode Jabatan</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Nama Jabatan</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Unit Sekolah</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center font-weight-bold mb-0">
                                        @foreach ($jabatan as $jabatan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $jabatan->kode_jabatan }}</td>
                                                <td>{{ $jabatan->nama_jabatan }}</td>
                                                <td>{{ $jabatan->unit_sekolah }}</td>
                                                <td>
                                                    <button class="btn btn-primary edit-jabatan-btn" data-bs-toggle="modal"
                                                        data-bs-target="#edit-jabatan-modal" data-id="{{ $jabatan->id }}"
                                                        data-kode="{{ $jabatan->kode_jabatan }}"
                                                        data-nama="{{ $jabatan->nama_jabatan }}"
                                                        data-unit="{{ $jabatan->unit_sekolah }}">Edit</button>
                                                    <form action="{{ route('jabatan.destroy', $jabatan->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
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
    <div class="modal fade" id="jabatan-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('jabatan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_jabatan" class="form-label">Kode Jabatan</label>
                            <input type="text" class="form-control" id="kode_jabatan" name="kode_jabatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="unit_sekolah" class="form-label">Unit Sekolah</label>
                            <input type="text" class="form-control" id="unit_sekolah" name="unit_sekolah" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="edit-jabatan-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-jabatan-form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="edit_kode_jabatan" class="form-label">Kode Jabatan</label>
                            <input type="text" class="form-control" id="edit_kode_jabatan" name="kode_jabatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_nama_jabatan" class="form-label">Nama Jabatan</label>
                            <input type="text" class="form-control" id="edit_nama_jabatan" name="nama_jabatan"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_unit_sekolah" class="form-label">Unit Sekolah</label>
                            <input type="text" class="form-control" id="edit_unit_sekolah" name="unit_sekolah"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- JS Bootstrap --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle click on Edit button
            const editButtons = document.querySelectorAll('.edit-jabatan-btn');
            const editForm = document.getElementById('edit-jabatan-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const kode = button.getAttribute('data-kode');
                    const nama = button.getAttribute('data-nama');
                    const unit = button.getAttribute('data-unit');

                    editForm.action = `/kepegawaian/jabatan/${id}`;

                    document.getElementById('edit_kode_jabatan').value = kode;
                    document.getElementById('edit_nama_jabatan').value = nama;
                    document.getElementById('edit_unit_sekolah').value = unit;
                });
            });
        });
    </script>
@endsection
