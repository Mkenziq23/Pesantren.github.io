@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h4>Jam Masuk dan Pulang</h4>
                            <div class="pull-right mb-2">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#jammasukdanpulangModal"
                                    type="button">
                                    <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table class="table table-striped align-items-center mb-0">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th class="text-center text-uppercase text-white font-weight-bolder">No</th>
                                            <th class="text-center text-uppercase text-white font-weight-bolder">Unit</th>
                                            <th class="text-center text-uppercase text-white font-weight-bolder">Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($units as $key => $unit)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <a href="javascript:void(0);"
                                                        class="toggle-collapse-{{ $key + 1 }}"
                                                        data-target="#collapse{{ $key + 1 }}"><i
                                                            class="fa fa-plus"></i></a>
                                                    {{ $unit->unit }}
                                                </td>

                                                <td>
                                                    <form action="{{ route('jam-masuk-dan-pulang.destroyall') }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure you want to delete all data?')"
                                                            class="btn border-none border-0 bg-transparent">
                                                            <i class="fas fa-trash-alt fs-5 text-danger"></i>
                                                        </button>

                                                    </form>

                                                </td>
                                            </tr>
                                            <tr id="collapse{{ $key + 1 }}" class="collapse">
                                                <td colspan="3">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Hari</th>
                                                                <th>Jam Masuk</th>
                                                                <th>Jam Pulang</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($unit->jammasukdanpulang as $data)
                                                                <tr>
                                                                    <td>{{ $data->hari }}</td>
                                                                    <td>{{ $data->jam_masuk }}</td>
                                                                    <td>{{ $data->jam_pulang }}</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn border-none border-0 bg-transparent"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editModal{{ $data->id }}">
                                                                            <i class="fas fa-edit fs-5 text-warning"></i>

                                                                        </button>
                                                                        <form
                                                                            action="{{ route('jam-masuk-dan-pulang.destroy', $data->id) }}"
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
                                                            @endforeach
                                                        </tbody>
                                                    </table>
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

    <!-- Tambah -->
    <div class="modal fade" id="jammasukdanpulangModal" tabindex="-1" aria-labelledby="jammasukdanpulangModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jammasukdanpulangModalLabel">Tambah Data jammasukdanpulang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('jam-masuk-dan-pulang.store') }}" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8">
                        @csrf

                        <div class="form-group">
                            <label for="unit_id">Unit <small data-toggle="tooltip" title=""
                                    data-original-title="Wajib diisi">*</small></label>
                            <select name="unit_id" id="unit_id" class="form-control" required>
                                <option value="">--Pilih Unit--</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->unit }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            @php
                                $daysOfWeek = ['Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu'];
                            @endphp

                            @foreach ($daysOfWeek as $dayKey => $dayValue)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hari_{{ $dayKey }}">{{ $dayValue }} <small
                                                data-toggle="tooltip" title=""
                                                data-original-title="Wajib diisi">*</small></label>
                                        <input type="hidden" name="hari[]" value="{{ $dayKey }}"
                                            class="form-control">
                                        <input type="text" class="form-control" value="{{ $dayValue }}"
                                            disabled="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jam Masuk</label>
                                        <input type="time" name="jam_masuk[]" class="form-control"
                                            placeholder="Jam Masuk" value="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jam Pulang</label>
                                        <input type="time" name="jam_pulang[]" class="form-control"
                                            placeholder="Jam Pulang" value="">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group text-center">
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

    <!-- Edit Single Modal -->
    @foreach ($units as $unit)
        @foreach ($unit->jammasukdanpulang as $data)
            <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $data->id }}">Edit Data jammasukdanpulang
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('jam-masuk-dan-pulang.update', $data->id) }}" method="post"
                                accept-charset="utf-8">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="unit_id">Unit <small data-toggle="tooltip" title=""
                                            data-original-title="Wajib diisi">*</small></label>
                                    <input type="text" name="unit" class="form-control"
                                        value="{{ $unit->unit }}" disabled>
                                    <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                                </div>

                                <div class="form-group">
                                    <label for="hari">Hari <small data-toggle="tooltip" title=""
                                            data-original-title="Wajib diisi">*</small></label>
                                    <input type="text" name="hari" class="form-control"
                                        value="{{ $data->hari }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="jam_masuk">Jam Masuk</label>
                                    <input type="time" name="jam_masuk" class="form-control"
                                        value="{{ $data->jam_masuk }}">
                                </div>

                                <div class="form-group">
                                    <label for="jam_pulang">Jam Pulang</label>
                                    <input type="time" name="jam_pulang" class="form-control"
                                        value="{{ $data->jam_pulang }}">
                                </div>

                                <div class="form-group text-center">
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
        @endforeach
    @endforeach

    <script>
        $(document).ready(function() {
            @foreach ($units as $key => $unit)
                $('.toggle-collapse-{{ $key + 1 }}').click(function() {
                    var targetId = $(this).data('target');
                    $(targetId).toggleClass('show');
                });
            @endforeach
        });
    </script>

    <script>
        $(document).ready(function() {
            // Add your existing script here

            // Additional script for handling edit modal
            $('.edit-modal').click(function() {
                var modalId = $(this).data('target');
                $(modalId).modal('show');
            });
        });
    </script>
@endsection
