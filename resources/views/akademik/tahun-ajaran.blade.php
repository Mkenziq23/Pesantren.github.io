@extends('layouts.user_type.auth')

@section('content')
    <div class="col-12 mt-4">
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                <h3 class="mb-1">Tahun Ajaran</h3>
                <p class="text-sm">
                <div class="pull-right mb-2">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tahun-ajaran-modal" type="button"
                        class="btn bg-gradient-success btn-block mb-3">
                        <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                    </button>
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive p-0">
                        <table id="tahun_ajaran" class="table table-striped align-items-center mb-0" style="width: 100%">
                            <thead class="bg-gradient-primary">
                                <tr>
                                    <th class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                        No
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
                                @foreach ($tahunajaran as $ta)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ta->tahun_awal }}/{{ $ta->tahun_akhir }}</td>
                                        <td>
                                            @if ($ta->status === 'Aktif')
                                                <i class="fas fa-check-circle text-success"></i>
                                            @else
                                                <i class="fas fa-times-circle text-danger"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn edit-tahun-ajaran-btn" data-bs-toggle="modal"
                                                data-bs-target="#edit-tahun-ajaran-modal" data-id="{{ $ta->id }}"
                                                data-tahun-awal="{{ $ta->tahun_awal }}"
                                                data-tahun-akhir="{{ $ta->tahun_akhir }}" data-status="{{ $ta->status }}">
                                                <i class="fas fa-user-edit fs-5 text-secondary "></i>
                                            </button>
                                            <form action="{{ route('tahun-ajaran.destroy', $ta->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn border-none border-0 bg-transparent"
                                                    type="button">
                                                    <i class="fas fa-trash-alt fs-5 text-danger "></i>
                                                </button>
                                            </form>
                                            <button class="btn activate-status-btn btn-success"
                                                data-id="{{ $ta->id }}">
                                                Activate Status
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Tambah Tahun Ajaran-->
                <div class="modal fade" id="tahun-ajaran-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Ajaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('tahun-ajaran.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form col-sm-6 com-md-6">
                                            <label for="tahun_awal" class="form-control-label">Tahun Awal</label>
                                            <input class="form-control" type="number" id="tahun_awal" name="tahun_awal"
                                                placeholder="contoh: 2014">
                                        </div>

                                        <div class="form col-sm-6 col-md-6">
                                            <label for="tahun_akhir" class="form-control-label">Tahun
                                                Akhir</label>
                                            <input class="form-control" type="number" id="tahun_akhir" name="tahun_akhir"
                                                placeholder="contoh: 2015">
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="mb-0">Status</label>
                                        <div class="d-flex">
                                            <div class="form-check me-2">
                                                <input class="form-check-input"
                                                    style="box-shadow: 0 2px 4px rgba(0, 0, 0, 1);" type="radio"
                                                    name="status" id="statusAktif" value="Aktif">
                                                <label class="custom-control-label">Aktif</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    style="box-shadow: 0 2px 4px rgba(0, 0, 0, 1);" type="radio"
                                                    name="status" id="statusTidakAktif" value="Tidak Aktif">
                                                <label class="custom-control-label">Tidak
                                                    Aktif</label>
                                            </div>
                                        </div>
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
                <!--Edit Riwayat Mengajar-->
                <div class="modal fade" id="edit-tahun-ajaran-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Tahun Ajaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="edit-tahun-ajaran-form" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="form col-sm-6 col-md-6">
                                            <label for="edit_tahun_awal" class="form-control-label">Tahun
                                                Awal</label>
                                            <input class="form-control" type="number" id="edit_tahun_awal"
                                                name="tahun_awal" required>
                                        </div>
                                        <div class="form col-sm-6 col-md-6">
                                            <label for="edit_tahun_akhir" class="form-control-label">Tahun
                                                Akhir</label>
                                            <input class="form-control" type="number" id="edit_tahun_akhir"
                                                name="tahun_akhir" required>
                                        </div>
                                        <div class="mb-2">
                                            <label class="mb-0">Status</label>
                                            <div class="d-flex">
                                                <div class="form-check me-2">
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="edit_statusAktif" value="Aktif"
                                                        style="box-shadow: 0 2px 4px rgba(0, 0, 0, 1);">
                                                    <label class="custom-control-label">Aktif</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="edit_statusTidakAktif" value="Tidak Aktif"
                                                        style="box-shadow: 0 2px 4px rgba(0, 0, 0, 1);">
                                                    <label class="custom-control-label">Tidak Aktif</label>
                                                </div>
                                            </div>
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
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#tahun_ajaran').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "pageLength": 10
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Handle click on Edit button
            const editButtons = document.querySelectorAll('.edit-tahun-ajaran-btn');
            const editForm = document.getElementById('edit-tahun-ajaran-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const awal = button.getAttribute('data-tahun-awal');
                    const akhir = button.getAttribute('data-tahun-akhir');
                    const status = button.getAttribute('data-status');

                    editForm.action = `/akademik/tahun-ajaran/${id}`;
                    document.getElementById('edit_tahun_awal').value = awal;
                    document.getElementById('edit_tahun_akhir').value = akhir;

                    const aktifRadio = document.getElementById('edit_statusAktif');
                    const tidakAktifRadio = document.getElementById('edit_statusTidakAktif');

                    if (status === 'Aktif') {
                        aktifRadio.checked = true;
                    } else {
                        tidakAktifRadio.checked = true;
                    }
                });
            });

            // Handle click on Activate Status button
            const activateButtons = document.querySelectorAll('.activate-status-btn');
            activateButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const activateUrl = `/akademik/tahun-ajaran/${id}/activate`;

                    fetch(activateUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            window.location.reload();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>
@endsection
