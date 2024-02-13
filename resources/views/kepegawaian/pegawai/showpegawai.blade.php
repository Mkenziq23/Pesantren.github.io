@extends('layouts.user_type.auth')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('storage/' . $pegawai->image) }}" alt="{{ $pegawai->image }}"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $pegawai->nama_lengkap }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ $pegawai->Jabatan_Pegawai->nama_jabatan }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="{{ route('pegawai.index') }}">
                                        <button class="border-none border-0 bg-transparent" type="button">
                                            <i class="fas fa-arrow-circle-left fs-5 text-primary "></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('pegawai.edit', ['pegawai' => $pegawai]) }}">
                                        <button class="border-none border-0 bg-transparent" type="button">
                                            <i class="fas fa-user-edit fs-5 text-secondary"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="fas fa-trash-alt fs-5 text-danger "></i>

                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <hr class="horizontal gray-light my-1">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">Nip:</strong> &nbsp; <strong>{{ $pegawai->nip }}</strong></li>
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama
                                        Lengkap:</strong> &nbsp; <strong>{{ $pegawai->nama_lengkap }}</strong></li>
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Jenis
                                        Kelamin:</strong> &nbsp;<strong> {{ $pegawai->jenis_kelamin }}</strong></li>
                                <li class="list-group-item border-0 ps-0 text-sm">
                                    <strong class="text-dark">Tempat, Tanggal Lahir:</strong>
                                    &nbsp; <strong>{{ $pegawai->tempat_lahir }},
                                        {{ $pegawai->tanggal_lahir->isoFormat('DD MMMM YYYY') }}</strong>
                                </li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong>
                                    &nbsp; <strong>{{ $pegawai->alamat }}</strong></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Pendidikan
                                        Terakhir:</strong>
                                    &nbsp; <strong>{{ $pegawai->pendidikan_terakhir }}</strong></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Status
                                        Kepegawaian:</strong>
                                    &nbsp; <strong>{{ $pegawai->status_kepegawaian }}</strong></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No
                                        telephone:</strong>
                                    &nbsp; <strong>{{ $pegawai->telephone }}</strong></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong>
                                    &nbsp;<strong> {{ $pegawai->email }}</strong></li>
                                <li class="list-group-item border-0 ps-0 text-sm">
                                    <strong class="text-dark">Masa Kerja:</strong>
                                    &nbsp; <strong>{{ $lengthOfService }}</strong>
                                </li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Status:</strong>
                                    &nbsp; <strong>{{ $pegawai->status }}</strong></li>
                            </ul>
                        </div>
                        <div class="card-footer ms-auto">
                            <a href="#" class="btn btn-light" data-toggle="tooltip" data-placement="top"
                                title="Print">
                                <i class="fas fa-print fa-2x"></i>
                            </a>


                        </div>
                    </div>
                </div>
                <!-- Riwayat Pendidikan -->
                <div class="col-12 col-xl-8">
                    <div class="card mb-2">
                        <div class="card-header pb-0">
                            <h3>Riwayat Pendidikan Table</h3>
                            <div class="pull-right mb-2">
                                <button class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#riwayat-pendidikan-modal" type="button"
                                    class="btn bg-gradient-success btn-block mb-3">
                                    <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive p-0">
                                <table id="data_riwayatpendidikan" class="table table-striped align-items-center mb-0"
                                    style="width: 100%">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                No</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Thn Masuk</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Thn Lulus</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Sekolah/Universitas</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Lokasi</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center font-weight-bold mb-0">
                                        @foreach ($pegawai->riwayatpendidikan as $rp)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rp->tahun_masuk }}</td>
                                                <td>{{ $rp->tahun_lulus }}</td>
                                                <td>{{ $rp->pendidikan }}</td>
                                                <td>{{ $rp->lokasi }}</td>
                                                <td>
                                                    <button class="btn edit-riwayatpendidikan-btn" data-bs-toggle="modal"
                                                        data-bs-target="#edit-riwayatpendidikan-modal"
                                                        data-id="{{ $rp->id }}"
                                                        data-tahun-masuk="{{ $rp->tahun_masuk }}"
                                                        data-tahun-lulus="{{ $rp->tahun_lulus }}"
                                                        data-pendidikan="{{ $rp->pendidikan }}"
                                                        data-lokasi="{{ $rp->lokasi }}">
                                                        <i class="fas fa-user-edit fs-5 text-secondary "></i>
                                                    </button>
                                                    <form
                                                        action="{{ route('destroy', ['pegawai' => $pegawai, 'riwayatPendidikan' => $rp]) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn border-none border-0 bg-transparent"
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
                    </div>
                </div>

                <!-- Tambah Riwayat Pendidikan Modal -->
                <div class="modal fade" id="riwayat-pendidikan-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Riwayat Pendidikan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form
                                    action="{{ route('riwayatPendidikanStore', ['pegawai' => $pegawai->nama_lengkap]) }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                                    <div class="mb-3">
                                        <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                                        <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk"
                                            placeholder="Contoh: 2021" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                        <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus"
                                            placeholder="Contoh: 2025" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pendidikan" class="form-label">Sekolah/Univ</label>
                                        <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                                            placeholder="Masukkan Sekolah/Universitas" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lokasi" class="form-label">Lokasi</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi"
                                            placeholder="Masukkan lokasi" required>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary px-5">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Riwayat Pendidikan Modal -->
                <div class="modal fade" id="edit-riwayatpendidikan-modal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Riwayat Pendidikan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="edit-riwayatpendidikan-form" method="POST">
                                    @csrf
                                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                                    <div class="mb-3">
                                        <label for="edit_tahun_masuk" class="form-label">Tahun Masuk</label>
                                        <input type="text" class="form-control" id="edit_tahun_masuk"
                                            name="tahun_masuk" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_tahun_lulus" class="form-label">Tahun Lulus</label>
                                        <input type="text" class="form-control" id="edit_tahun_lulus"
                                            name="tahun_lulus" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_pendidikan" class="form-label">Sekolah/Univ</label>
                                        <input type="text" class="form-control" id="edit_pendidikan"
                                            name="pendidikan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_lokasi" class="form-label">Lokasi</label>
                                        <input type="text" class="form-control" id="edit_lokasi" name="lokasi"
                                            required>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Keluarga dan Penghargaan -->
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-12 col-xl-6 mt-3">
                            <div class="card mb-2">
                                <div class="card-header pb-0">
                                    <h3>Data Keluarga</h3>
                                    <div class="pull-right mb-2">
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#datakeluarga-modal" type="button"
                                            class="btn bg-gradient-success btn-block mb-3">
                                            <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="table-responsive p-0">
                                        <table id="data_datakeluarga" class="table table-striped align-items-center mb-0"
                                            style="width: 100%">
                                            <thead class="bg-gradient-primary">
                                                <tr>
                                                    <th
                                                        class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                        No</th>
                                                    <th
                                                        class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                        Nama</th>
                                                    <th
                                                        class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                        Hubungan</th>
                                                    <th
                                                        class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                        Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center font-weight-bold mb-0">
                                                @foreach ($pegawai->dataKeluarga as $dk)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $dk->nama }}</td>
                                                        <td>{{ $dk->hubungan }}</td>
                                                        <td>
                                                            <button class="btn edit-datakeluarga-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#edit-datakeluarga-modal"
                                                                data-id="{{ $dk->id }}"
                                                                data-nama="{{ $dk->nama }}"
                                                                data-hubungan="{{ $dk->hubungan }}">
                                                                <i class="fas fa-user-edit fs-5 text-secondary "></i>
                                                            </button>
                                                            <form
                                                                action="{{ route('dataKeluarga.destroy', ['pegawai' => $pegawai->nama_lengkap, 'dataKeluarga' => $dk->id]) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn border-none border-0 bg-transparent"
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

                                <!--Tambah Data Keluarga Modal-->
                                <div class="modal fade" id="datakeluarga-modal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Keluarga
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="{{ route('dataKeluargaStore', ['pegawai' => $pegawai->nama_lengkap]) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="nama"
                                                            name="nama" placeholder="Masukkan nama" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="hubungan" class="form-label">Hubungan</label>
                                                        <input type="text" class="form-control" id="hubungan"
                                                            name="hubungan" placeholder="Masukkan hubungan" required>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-primary px-5">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--Edit Data Keluarga Modal-->
                                <div class="modal fade" id="edit-datakeluarga-modal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Keluarga
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="edit-datakeluarga-form" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                                                    <div class="mb-3">
                                                        <label for="edit_nama" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="edit_nama"
                                                            name="nama" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_hubungan" class="form-label">Hubungan</label>
                                                        <input type="text" class="form-control" id="edit_hubungan"
                                                            name="hubungan" required>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Penghargaan Modal -->
                        <div class="col-12 col-xl-6 mt-3">
                            <div class="card mb-2">
                                <div class="card-header pb-0">
                                    <h3>Penghargaan</h3>
                                    <div class="pull-right mb-2">
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#penghargaan-modal" type="button"
                                            class="btn bg-gradient-success btn-block mb-3">
                                            <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="table-responsive p-0">
                                        <table id="data_penghargaan" class="table table-striped align-items-center mb-0"
                                            style="width: 100%">
                                            <thead class="bg-gradient-primary">
                                                <tr>
                                                    <th
                                                        class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                        No</th>
                                                    <th
                                                        class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                        Tahun</th>
                                                    <th
                                                        class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                        Nama Penghargaan</th>
                                                    <th
                                                        class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                        Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center font-weight-bold mb-0">
                                                @foreach ($pegawai->penghargaan as $p)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->tahun }}</td>
                                                        <td>{{ $p->keterangan }}</td>
                                                        <td>
                                                            <button class="btn edit-penghargaan-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#edit-penghargaan-modal"
                                                                data-id="{{ $p->id }}"
                                                                data-tahun="{{ $p->tahun }}"
                                                                data-keterangan="{{ $p->keterangan }}">
                                                                <i class="fas fa-user-edit fs-5 text-secondary "></i>
                                                            </button>
                                                            <form
                                                                action="{{ route('penghargaan.destroy', ['pegawai' => $pegawai->nama_lengkap, 'penghargaan' => $p->id]) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn border-none border-0 bg-transparent"
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
                            </div>
                        </div>

                        <!--Tambah Penghargaan Modal-->
                        <div class="modal fade" id="penghargaan-modal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Penghargaan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('penghargaanStore', ['pegawai' => $pegawai->nama_lengkap]) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                                            <div class="form-group">
                                                <label for="tahun" class="form-label">Date</label>
                                                <input class="form-control" type="text" name="tahun" id="tahun"
                                                    placeholder="Masukkan tahun" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Nama Penghargaan</label>
                                                <input type="text" class="form-control" id="keterangan"
                                                    name="keterangan" placeholder="Masukkan nama penghargaan" required>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Penghargaan Modal -->
                        <div class="modal fade" id="edit-penghargaan-modal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Penghargaan
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit-penghargaan-form" method="POST">
                                            @csrf
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                                            <div class="mb-3">
                                                <label for="edit_tahun" class="form-label">Tahun</label>
                                                <input type="text" class="form-control" id="edit_tahun"
                                                    name="tahun" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_keterangan" class="form-label">Nama Penghargaan</label>
                                                <input type="text" class="form-control" id="edit_keterangan"
                                                    name="keterangan" required>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Riwayat Mengajar -->
            <div class="col-12 mt-4">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <h3 class="mb-1">Riwayat Mengajar</h3>
                        <p class="text-sm">
                        <div class="pull-right mb-2">
                            <button class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#riwayat-mengajar-modal" type="button"
                                class="btn bg-gradient-success btn-block mb-3">
                                <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                            </button>
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive p-0">
                                <table id="data_riwayatmengajar" class="table table-striped align-items-center mb-0"
                                    style="width: 100%">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                No</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Tahun Mulai</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Tahun Selesai</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Mata Pelajaran</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Keterangan</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center font-weight-bold mb-0">
                                        @foreach ($pegawai->riwayatmengajar as $rm)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d-m-Y', strtotime($rm->tahun_mulai)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($rm->tahun_selesai)) }}</td>

                                                <td>{{ $rm->mapel }}</td>
                                                <td>{{ $rm->keterangan }}</td>
                                                <td>
                                                    <button class="btn edit-riwayatmengajar-btn" data-bs-toggle="modal"
                                                        data-bs-target="#edit-riwayatmengajar-modal"
                                                        data-id="{{ $rm->id }}"
                                                        data-tahun-mulai="{{ $rm->tahun_mulai }}"
                                                        data-tahun-selesai="{{ $rm->tahun_selesai }}"
                                                        data-mapel="{{ $rm->mapel }}"
                                                        data-keterangan="{{ $rm->keterangan }}">
                                                        <i class="fas fa-user-edit fs-5 text-secondary "></i>
                                                    </button>
                                                    <form
                                                        action="{{ route('riwayatMengajar.destroy', ['pegawai' => $pegawai, 'riwayatMengajar' => $rm]) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn border-none border-0 bg-transparent"
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
                        <!--Tambah Riwayat Mengajar-->
                        <div class="modal fade" id="riwayat-mengajar-modal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Riwayat Mengajar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('riwayatMengajarStore', ['pegawai' => $pegawai->nama_lengkap]) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                                            <div class="form-group">
                                                <label for="tahun_mulai" class="form-control-label">Tahun Mulai</label>
                                                <input class="form-control" type="date" id="tahun_mulai"
                                                    name="tahun_mulai">
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun_selesai" class="form-control-label">Tahun
                                                    Selesai</label>
                                                <input class="form-control" type="date" id="tahun_selesai"
                                                    name="tahun_selesai">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mapel" class="form-label">Mata Pelajaran</label>
                                                <input type="text" class="form-control" id="mapel" name="mapel"
                                                    placeholder="Masukkan Mata Pelajaran" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" class="form-control" id="keterangan"
                                                    name="keterangan" placeholder="Masukkan keterangan" required>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Edit Riwayat Mengajar-->
                        <div class="modal fade" id="edit-riwayatmengajar-modal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Riwayat Mengajar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit-riwayatmengajar-form" method="POST">
                                            @csrf
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">

                                            <div class="form-group">
                                                <label for="edit_tahun_mulai" class="form-control-label">Tahun
                                                    Mulai</label>
                                                <input class="form-control" type="date" id="edit_tahun_mulai"
                                                    name="tahun_mulai" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_tahun_selesai" class="form-control-label">Tahun
                                                    Selesai</label>
                                                <input class="form-control" type="date" id="edit_tahun_selesai"
                                                    name="tahun_selesai" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_mapel" class="form-label">Mata Pelajaran</label>
                                                <input type="text" class="form-control" id="edit_mapel"
                                                    name="mapel" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_keterangan_rm" class="form-label">Keterangan</label>
                                                <input type="text" class="form-control" id="edit_keterangan_rm"
                                                    name="keterangan" required>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Riwayat Seminar dan Pelatihan -->
            <div class="col-12 mt-4">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <h3 class="mb-1">Riwayat Seminar & Pelatihan</h3>
                        <p class="text-sm">
                        <div class="pull-right mb-2">
                            <button class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#riwayat-seminardanpelatihan-modal" type="button"
                                class="btn bg-gradient-success btn-block mb-3">
                                <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                            </button>
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive p-0">
                                <table id="data_riwayatseminardanpelatihan"
                                    class="table table-striped align-items-center mb-0" style="width: 100%">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                No</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Mulai</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Selesai</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Penyelenggara</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Lokasi</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center font-weight-bold mb-0">
                                        @foreach ($pegawai->riwayatseminardanpelatihan as $rsdp)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d-m-Y', strtotime($rsdp->mulai)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($rsdp->selesai)) }}</td>
                                                <td>{{ $rsdp->penyelenggara }}</td>
                                                <td>{{ $rsdp->lokasi }}</td>
                                                <td>
                                                    <button class="btn edit-riwayatseminardanpelatihan-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#edit-riwayatseminardanpelatihan-modal"
                                                        data-id="{{ $rsdp->id }}" data-mulai="{{ $rsdp->mulai }}"
                                                        data-selesai="{{ $rsdp->selesai }}"
                                                        data-penyelenggara="{{ $rsdp->penyelenggara }}"
                                                        data-lokasi="{{ $rsdp->lokasi }}">
                                                        <i class="fas fa-user-edit fs-5 text-secondary "></i>
                                                    </button>
                                                    <form
                                                        action="{{ route('riwayatSeminardanPelatihan.destroy', ['pegawai' => $pegawai, 'riwayatSeminardanPelatihan' => $rsdp]) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn border-none border-0 bg-transparent"
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
                        <!--Tambah Riwayat Seminar dan Pelatihan-->
                        <div class="modal fade" id="riwayat-seminardanpelatihan-modal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('riwayatSeminardanPelatihanStore', ['pegawai' => $pegawai->nama_lengkap]) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                                            <div class="form-group">
                                                <label for="mulai" class="form-control-label">Tahun Mulai</label>
                                                <input class="form-control" type="date" id="mulai"
                                                    name="mulai">
                                            </div>
                                            <div class="form-group">
                                                <label for="selesai" class="form-control-label">Tahun Selesai</label>
                                                <input class="form-control" type="date" id="selesai"
                                                    name="selesai">
                                            </div>
                                            <div class="mb-3">
                                                <label for="penyelenggara" class="form-label">Penyelenggara</label>
                                                <input type="text" class="form-control" id="penyelenggara"
                                                    name="penyelenggara" placeholder="Penyelenggara Workshop" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="lokasi" class="form-label">Lokasi</label>
                                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                                    placeholder="Masukkan lokasi, Contoh: Jember" required>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Edit Riwayat Seminar dan Pelatihan-->
                        <div class="modal fade" id="edit-riwayatseminardanpelatihan-modal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit-riwayatseminardanpelatihan-form" method="POST">
                                            @csrf
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">

                                            <div class="form-group">
                                                <label for="edit_mulai" class="form-control-label">Tahun
                                                    Mulai</label>
                                                <input class="form-control" type="date" id="edit_mulai"
                                                    name="mulai" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_selesai" class="form-control-label">Tahun
                                                    Selesai</label>
                                                <input class="form-control" type="date" id="edit_selesai"
                                                    name="selesai" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_penyelenggara" class="form-label">Penyelenggara</label>
                                                <input type="text" class="form-control" id="edit_penyelenggara"
                                                    name="penyelenggara" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_lokasi_rsdp" class="form-label">Lokasi</label>
                                                <input type="text" class="form-control" id="edit_lokasi_rsdp"
                                                    name="lokasi" required>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Riwayat jabatan    -->
            <div class="col-12 mt-4">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <h3 class="mb-1">Riwayat Jabatan</h3>
                        <p class="text-sm">
                        <div class="pull-right mb-2">
                            <button class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#riwayat-jabatan-modal" type="button"
                                class="btn bg-gradient-success btn-block mb-3">
                                <span class="text-dark"><i class="fas fa-plus fa-lg"></i> Tambah</span>
                            </button>
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive p-0">
                                <table id="data_riwayatjabatan" class="table table-striped align-items-center mb-0"
                                    style="width: 100%">
                                    <thead class="bg-gradient-primary">
                                        <tr>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                No</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Tahun Mulai</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Tahun Selesai</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Keterangan</th>
                                            <th
                                                class="align-middle text-center text-uppercase text-white font-weight-bolder">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center font-weight-bold mb-0">
                                        @foreach ($pegawai->riwayatjabatan as $rj)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d-m-Y', strtotime($rj->tahun_mulai)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($rj->tahun_selesai)) }}</td>
                                                <td>{{ $rj->keterangan }}</td>
                                                <td>
                                                    <button class="btn edit-riwayatjabatan-btn" data-bs-toggle="modal"
                                                        data-bs-target="#edit-riwayatjabatan-modal"
                                                        data-id="{{ $rj->id }}"
                                                        data-tahun-mulai="{{ $rj->tahun_mulai }}"
                                                        data-tahun-selesai="{{ $rj->tahun_selesai }}"
                                                        data-keterangan="{{ $rj->keterangan }}">
                                                        <i class="fas fa-user-edit fs-5 text-secondary "></i>
                                                    </button>
                                                    <form
                                                        action="{{ route('riwayatJabatan.destroy', ['pegawai' => $pegawai, 'riwayatJabatan' => $rj]) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn border-none border-0 bg-transparent"
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
                        <!--Tambah Riwayat Jabatan-->
                        <div class="modal fade" id="riwayat-jabatan-modal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('riwayatJabatanStore', ['pegawai' => $pegawai->nama_lengkap]) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                                            <div class="form-group">
                                                <label for="tahun_mulai" class="form-control-label">Tahun Mulai</label>
                                                <input class="form-control" type="date" id="tahun_mulai"
                                                    name="tahun_mulai">
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun_selesai" class="form-control-label">Tahun
                                                    Selesai</label>
                                                <input class="form-control" type="date" id="tahun_selesai"
                                                    name="tahun_selesai">
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" class="form-control" id="keterangan"
                                                    name="keterangan" placeholder="Masukkan keterangan" required>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Edit Riwayat Seminar dan Pelatihan-->
                        <div class="modal fade" id="edit-riwayatjabatan-modal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit-riwayatjabatan-form" method="POST">
                                            @csrf
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">

                                            <div class="form-group">
                                                <label for="edit_tahun_mulai_rj" class="form-control-label">Tahun
                                                    Mulai</label>
                                                <input class="form-control" type="date" id="edit_tahun_mulai_rj"
                                                    name="tahun_mulai" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_tahun_selesai_rj" class="form-control-label">Tahun
                                                    Selesai</label>
                                                <input class="form-control" type="date" id="edit_tahun_selesai_rj"
                                                    name="tahun_selesai" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_keterangan_rj" class="form-label">Keterangan</label>
                                                <input type="text" class="form-control" id="edit_keterangan_rj"
                                                    name="keterangan" required>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>
        // Datatables Riwayat Pendidikan
        $(document).ready(function() {
            $('#data_riwayatpendidikan').DataTable({
                "lengthMenu": [
                    [6, 10, 25, -1],
                    [6, 10, 25, "All"]
                ],
                "pageLength": 6
            });
        });

        // Datatables Data Keluarga
        $(document).ready(function() {
            $('#data_datakeluarga').DataTable({
                "lengthMenu": [
                    [5, 10, 15, 25, -1],
                    [5, 10, 15, 25, "All"]
                ],
                "pageLength": 5
            });
        });

        // Datatables Penghargaan
        $(document).ready(function() {
            $('#data_penghargaan').DataTable({
                "lengthMenu": [
                    [5, 10, 15, 25, -1],
                    [5, 10, 15, 25, "All"]
                ],
                "pageLength": 5
            });
        });

        // Datatables Mengajar
        $(document).ready(function() {
            $('#data_riwayatmengajar').DataTable({
                "lengthMenu": [
                    [5, 10, 15, 25, -1],
                    [5, 10, 15, 25, "All"]
                ],
                "pageLength": 5
            });
        });

        // Datatables Riwayat Seminar dan Pelatihan
        $(document).ready(function() {
            $('#data_riwayatseminardanpelatihan').DataTable({
                "lengthMenu": [
                    [5, 10, 15, 25, -1],
                    [5, 10, 15, 25, "All"]
                ],
                "pageLength": 5
            });
        });

        // Datatables Riwayat Jabatan
        $(document).ready(function() {
            $('#data_riwayatjabatan').DataTable({
                "lengthMenu": [
                    [5, 10, 15, 25, -1],
                    [5, 10, 15, 25, "All"]
                ],
                "pageLength": 5
            });
        });

        // Riwayat Pendidikan
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-riwayatpendidikan-btn');
            const editForm = document.getElementById('edit-riwayatpendidikan-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const tahun_masuk = button.getAttribute('data-tahun-masuk');
                    const tahun_lulus = button.getAttribute('data-tahun-lulus');
                    const pendidikan = button.getAttribute('data-pendidikan');
                    const lokasi = button.getAttribute('data-lokasi');

                    editForm.action =
                        `{{ route('riwayatPendidikanUpdate', ['pegawai' => $pegawai->nama_lengkap, 'riwayatPendidikan' => ':riwayatPendidikanId']) }}`
                        .replace(':riwayatPendidikanId', id);

                    document.getElementById('edit_tahun_masuk').value = tahun_masuk;
                    document.getElementById('edit_tahun_lulus').value = tahun_lulus;
                    document.getElementById('edit_pendidikan').value = pendidikan;
                    document.getElementById('edit_lokasi').value = lokasi;
                });
            });
        });

        // Riwayat Data Keluarga
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-datakeluarga-btn');
            const editForm = document.getElementById('edit-datakeluarga-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const nama = button.getAttribute('data-nama');
                    const hubungan = button.getAttribute('data-hubungan');


                    editForm.action =
                        `{{ route('dataKeluargaUpdate', ['pegawai' => $pegawai->nama_lengkap, 'dataKeluarga' => ':dataKeluargaId']) }}`
                        .replace(':dataKeluargaId', id);

                    document.getElementById('edit_nama').value = nama;
                    document.getElementById('edit_hubungan').value = hubungan;
                });
            });
        });

        // Penghargaan
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-penghargaan-btn');
            const editForm = document.getElementById('edit-penghargaan-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const tahun = button.getAttribute('data-tahun');
                    const keterangan = button.getAttribute('data-keterangan');

                    editForm.action =
                        `{{ route('penghargaanUpdate', ['pegawai' => $pegawai->nama_lengkap, 'penghargaan' => ':penghargaanId']) }}`
                        .replace(':penghargaanId', id);

                    document.getElementById('edit_tahun').value = tahun;
                    document.getElementById('edit_keterangan').value = keterangan;
                });
            });
        });

        // Riwayat Mengajar
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-riwayatmengajar-btn');
            const editForm = document.getElementById('edit-riwayatmengajar-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const tahun_mulai = button.getAttribute('data-tahun-mulai');
                    const tahun_selesai = button.getAttribute('data-tahun-selesai');
                    const mapel = button.getAttribute('data-mapel');
                    const keterangan = button.getAttribute('data-keterangan');

                    editForm.action =
                        `{{ route('riwayatMengajarUpdate', ['pegawai' => $pegawai->nama_lengkap, 'riwayatMengajar' => ':riwayatMengajarId']) }}`
                        .replace(':riwayatMengajarId', id);

                    document.getElementById('edit_tahun_mulai').value = tahun_mulai;
                    document.getElementById('edit_tahun_selesai').value = tahun_selesai;
                    document.getElementById('edit_mapel').value = mapel;
                    document.getElementById('edit_keterangan_rm').value = keterangan;
                });
            });
        });

        // Riwayat Seminar dan Pelatihan
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-riwayatseminardanpelatihan-btn');
            const editForm = document.getElementById('edit-riwayatseminardanpelatihan-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const mulai = button.getAttribute('data-mulai');
                    const selesai = button.getAttribute('data-selesai');
                    const penyelenggara = button.getAttribute('data-penyelenggara');
                    const lokasi = button.getAttribute('data-lokasi');

                    editForm.action =
                        `{{ route('riwayatSeminardanPelatihanUpdate', ['pegawai' => $pegawai->nama_lengkap, 'riwayatSeminardanPelatihan' => ':riwayatSeminardanPelatihanId']) }}`
                        .replace(':riwayatSeminardanPelatihanId', id);

                    document.getElementById('edit_mulai').value = mulai;
                    document.getElementById('edit_selesai').value = selesai;
                    document.getElementById('edit_penyelenggara').value = penyelenggara;
                    document.getElementById('edit_lokasi_rsdp').value = lokasi;
                });
            });
        });

        // Riwayat Jabatan
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-riwayatjabatan-btn');
            const editForm = document.getElementById('edit-riwayatjabatan-form');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const tahun_mulai = button.getAttribute('data-tahun-mulai');
                    const tahun_selesai = button.getAttribute('data-tahun-selesai');
                    const keterangan = button.getAttribute('data-keterangan');

                    editForm.action =
                        `{{ route('riwayatJabatanUpdate', ['pegawai' => $pegawai->nama_lengkap, 'riwayatJabatan' => ':riwayatJabatanId']) }}`
                        .replace(':riwayatJabatanId', id);

                    document.getElementById('edit_tahun_mulai_rj').value = tahun_mulai;
                    document.getElementById('edit_tahun_selesai_rj').value = tahun_selesai;
                    document.getElementById('edit_keterangan_rj').value = keterangan;
                });
            });
        });
    </script>
@endsection
