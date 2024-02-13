@extends('layouts.user_type.auth')

@section('content')
    <div class="col-12 mt-4">
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                <h3 class="mb-1">Semester</h3>
                <p class="text-sm">
                <div class="pull-right mb-2">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#semester-modal" type="button"
                        class="btn bg-gradient-success btn-block mb-3">
                        <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                    </button>
                    </p>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive p-0">
                    <table id="semester" class="table table-striped align-items-center mb-0" style="width: 100%">
                        <thead class="bg-gradient-primary">
                            <tr>
                                <th class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                    No
                                </th>
                                <th class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                    Nama Semester
                                </th>
                                <th class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                    Tahun Ajaran
                                </th>
                                <th class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                    status
                                </th>
                                <th class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center font-weight-bold mb-0">
                            @foreach ($semester as $smstr)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $smstr->nama_semester }}</td>
                                    <td>{{ $smstr->tahunajaran->tahun_awal }}/{{ $smstr->tahunajaran->tahun_akhir }}
                                    </td>
                                    <td>
                                        @if ($smstr->tahunajaran->status === 'Aktif')
                                            <i class="fas fa-check-circle text-success"></i>
                                        @else
                                            <i class="fas fa-times-circle text-danger"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn edit-semester-btn" data-bs-toggle="modal"
                                            data-bs-target="#edit-semester-modal" data-id="{{ $smstr->id }}"
                                            data-nama-semester="{{ $smstr->nama_semester }}"
                                            data-tahun-ajaran="{{ $smstr->tahunajaran_id }}">
                                            <i class="fas fa-user-edit fs-5 text-secondary "></i>
                                        </button>
                                        <form action="{{ route('semester.destroy', $smstr->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn border-none border-0 bg-transparent"
                                                type="button">
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
            <!--Tambah Tahun Ajaran-->
            <div class="modal fade" id="semester-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Semester</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('semester.store') }}" method="post">
                                @csrf
                                <div class="form-control">
                                    <label for="nama_semester" class="form-control-label">Nama Semester</label>
                                    <input class="form-control" type="text" id="nama_semester" name="nama_semester"
                                        placeholder="contoh: Ganjil/Semester 1">
                                </div>
                                <div class="form-group mb-2 pb-2">
                                    <label for="tahunajaran_id">Tahun Ajaran</label>
                                    <select class="select form-control" name="tahunajaran_id" id="tahunajaran_id">
                                        <option value="" disabled selected>--Pilih Tahun Ajaran--</option>
                                        @foreach ($tahunajaran as $ta)
                                            <option value="{{ $ta->id }}">
                                                {{ $ta->tahun_awal }}/{{ $ta->tahun_akhir }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex justify-content-center">
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
            <!-- Edit Semester Modal -->
            <div class="modal fade" id="edit-semester-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Semester</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="edit-semester-form" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group mb-2 pb2">
                                        <label for="edit_nama_semester" class="form-control-label">Nama
                                            Semester</label>
                                        <input class="form-control" type="text" id="edit_nama_semester"
                                            name="nama_semester" required>
                                    </div>

                                    <div class="form-group mb-2 pb-2">
                                        <label for="edit_tahunajaran_id">Tahun Ajaran</label>
                                        <select class="select form-control" name="tahunajaran_id"
                                            id="edit_tahunajaran_id" required>
                                            @foreach ($tahunajaran as $ta)
                                                <option value="{{ $ta->id }}">
                                                    {{ $ta->tahun_awal }}/{{ $ta->tahun_akhir }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn border-none border-0 bg-transparent">
                                            <i class="fas fa-save text-success" style="font-size: 20px;"></i>
                                        </button>
                                        <button type="button" class="btn border-none border-0 bg-transparent"
                                            data-bs-dismiss="modal">
                                            <i class="fas fa-window-close text-danger" style="font-size: 20px"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#semester').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "pageLength": 10
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-semester-btn');
            const editForm = document.getElementById('edit-semester-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const namaSemester = button.getAttribute('data-nama-semester');
                    const tahunajaranId = button.getAttribute('data-tahun-ajaran');

                    // Set values in the modal form
                    editForm.action = `/akademik/semester/${id}`;
                    document.getElementById('edit_nama_semester').value = namaSemester;
                    document.getElementById('edit_tahunajaran_id').value = tahunajaranId;

                });
            });
        });
    </script>
@endsection
