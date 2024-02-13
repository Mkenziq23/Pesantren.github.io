@extends('layouts.user_type.auth')

@section('content')
    <div class="box-header">
        <form action="{{ route('Mata-Pelajaran.index') }}" class="form-horizontal" method="get" accept-charset="utf-8">
            <div class="box-body table-responsive">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="unit_id" class="form-label">Pilih Unit Pesantren</label>
                        <select style="width: 100%;" id="unit_id" name="unit_id" class="form-control" required="">
                            <option value="">--- Pilih Unit Pesantren ---</option>
                            @foreach ($unit as $u)
                                <option value="{{ $u->id }}" {{ $selectedUnit == $u->id ? 'selected' : '' }}>
                                    {{ $u->unit }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="invisible">Submit</label>
                        <button type="submit" class="btn btn-primary form-control"><i class="fa fa-search"></i>
                            Pilih</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    @if ($selectedUnit)
        <!-- Display DataTable and data only if a unit is selected -->
        <div class="col-12 mt-4">
            <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                    <h3 class="mb-1">Mata Pelajaran</h3>
                </div>
                <div class="card-body p-3">
                    <div class="pull-right mb-2">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#matapelajaran-modal"
                            type="button">
                            <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                        </button>
                    </div>
                    <div class="table-responsive p-0">
                        <table id="matapelajaran" class="table table-striped align-items-center mb-0" style="width: 100%">
                            <thead class="bg-gradient-primary">
                                <tr>
                                    <th class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                        No
                                    </th>
                                    <th class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                        Unit
                                    </th>
                                    <th class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                        Kode Mapel
                                    </th>
                                    <th class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                        Nama Mapel
                                    </th>
                                    <th class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                        Pengajar
                                    </th>
                                    <th class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <!-- DataTable Body -->
                            <tbody class="text-center font-weight-bold mb-0">
                                @foreach ($matapelajaran as $mapel)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mapel->unit->unit }}</td>
                                        <td>{{ $mapel->kode_mapel }}</td>
                                        <td>{{ $mapel->nama_mapel }}</td>
                                        <td>{{ $mapel->pengajar }}</td>
                                        <td>
                                            <button type="button" class="btn border-none border-0 bg-transparent"
                                                data-bs-toggle="modal" data-bs-target="#editModal{{ $mapel->id }}">
                                                <i class="fas fa-edit fs-5 text-warning"></i>

                                            </button>
                                            <form action="{{ route('Mata-Pelajaran.destroy', $mapel->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn border-none border-0 bg-transparent">
                                                    <i class="fas fa-trash fs-5 text-danger"></i> </button>
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
    @endif

    <!-- Modal for Adding New Mata Pelajaran -->
    <div class="modal fade" id="matapelajaran-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Mata-Pelajaran.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="unit_id" class="form-control-label">Unit</label>
                            <input type="hidden" name="unit_id" value="{{ $selectedUnit }}">
                            <p>Unit: {{ optional($unit->find($selectedUnit))->unit }}</p>
                        </div>
                        <div class="form-group">
                            <label for="kode_mapel" class="form-control-label">Kode Mapel</label>
                            <input class="form-control" type="text" id="kode_mapel" name="kode_mapel"
                                placeholder="Kode Mapel" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_mapel" class="form-control-label">Nama Mapel</label>
                            <input class="form-control" type="text" id="nama_mapel" name="nama_mapel"
                                placeholder="Nama Mapel" required>
                        </div>
                        <div class="form-group">
                            <label for="pengajar" class="form-control-label">Pengajar</label>
                            <input class="form-control" type="text" id="pengajar" name="pengajar"
                                placeholder="Pengajar" required>
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
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($matapelajaran as $mapel)
        <!-- Edit Modal for Mata Pelajaran -->
        <div class="modal fade" id="editModal{{ $mapel->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Mata Pelajaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('Mata-Pelajaran.update', $mapel->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="unit_id" class="form-control-label">Unit</label>
                                <input type="hidden" name="unit_id" value="{{ $mapel->unit->id }}">
                                <p>Unit: {{ $mapel->unit->unit }}</p>
                            </div>
                            <div class="form-group">
                                <label for="kode_mapel" class="form-control-label">Kode Mapel</label>
                                <input class="form-control" type="text" id="kode_mapel" name="kode_mapel"
                                    value="{{ $mapel->kode_mapel }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_mapel" class="form-control-label">Nama Mapel</label>
                                <input class="form-control" type="text" id="nama_mapel" name="nama_mapel"
                                    value="{{ $mapel->nama_mapel }}" required>
                            </div>
                            <div class="form-group">
                                <label for="pengajar" class="form-control-label">Pengajar</label>
                                <input class="form-control" type="text" id="pengajar" name="pengajar"
                                    value="{{ $mapel->pengajar }}" required>
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
    @endforeach



    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function() {
            $('#matapelajaran').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "pageLength": 10,
            });
        });
    </script>



@endsection
