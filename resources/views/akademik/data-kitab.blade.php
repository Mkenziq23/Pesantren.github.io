@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h4>Data Kitab</h4>
                            <div class="pull-right mb-2">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#datakitab-modal"
                                    type="button" class="btn bg-gradient-success btn-block mb-3">
                                    <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table id="datakitab" class="table table-striped align-items-center mb-0"
                                    style="width: 100%">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                No</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Nama Kitab</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white  font-weight-bolder">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center font-weight-bold mb-0">
                                        @foreach ($datakitab as $dk)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dk->nama_kitab }}</td>
                                                <td>
                                                    <button class="btn  edit-datakitab-btn" data-bs-toggle="modal"
                                                        data-bs-target="#edit-datakitab-modal" data-id="{{ $dk->id }}"
                                                        data-kitab="{{ $dk->nama_kitab }}">
                                                        <i class="fas fa-edit fs-5 text-secondary "></i>
                                                    </button>
                                                    <form action="{{ route('Data-Kitab.destroy', $dk->id) }}" method="POST"
                                                        style="display: inline;">
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
    <div class="modal fade" id="datakitab-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kitab</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Data-Kitab.store') }}" method="POST" id="datakitab-form">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kitab" class="form-label">Nama Kitab</label>
                            <input type="text" class="form-control" name="nama_kitab[]"
                                placeholder="Masukkan nama kitab contoh: Fathul Mu'in" required>
                        </div>
                        <div id="additional-rows"></div>
                        <button type="button" class="btn border-none border-0 bg-transparent" onclick="addRow()">
                            <i class="fas fa-plus text-primary" style="font-size: 20px;"></i> Tambah Baris
                        </button>
                        <div class="text-center">
                            <button type="submit" class="btn border-none border-0 bg-transparent">
                                <i class="fas fa-save text-success" style="font-size: 20px;"></i>
                            </button>
                            <button type="button" class="btn border-none border-0 bg-transparent" data-bs-dismiss="modal">
                                <i class="fas fa-window-close text-danger" style="font-size: 20px"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="edit-datakitab-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kitab</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-datakitab-form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="edit_nama_kitab" class="form-label">Nama Kitab</label>
                            <input type="text" class="form-control" id="edit_nama_kitab" name="nama_kitab" required>
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

    <script>
        function addRow() {
            const additionalRowsDiv = document.getElementById('additional-rows');
            const newRow = document.createElement('div');
            newRow.innerHTML = `
            <div class="mb-3">
                <label for="nama_kitab" class="form-label">Nama Kitab</label>
                <input type="text" class="form-control" name="nama_kitab[]" placeholder="Masukkan nama kitab contoh: Fathul Mu'in" required>
                <button type="button" class="btn btn-danger mt-2" onclick="removeRow(this)">Hapus Baris</button>
            </div>
        `;
            additionalRowsDiv.appendChild(newRow);
        }

        function removeRow(button) {
            const rowToRemove = button.parentNode;
            rowToRemove.parentNode.removeChild(rowToRemove);
        }

        $(document).ready(function() {
            $('#datakitab').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "pageLength": 10
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Handle click on Edit button
            const editButtons = document.querySelectorAll('.edit-datakitab-btn');
            const editForm = document.getElementById('edit-datakitab-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const nama_kitab = button.getAttribute('data-kitab');

                    // Update the URL in editForm.action
                    editForm.action = '{{ url('akademik/Data-Kitab') }}/' + id;

                    document.getElementById('edit_nama_kitab').value = nama_kitab;
                });
            });
        });
    </script>
@endsection
