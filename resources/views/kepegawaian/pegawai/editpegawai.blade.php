@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <style>
                                @media (min-width: 1025px) {
                                    .h-custom {
                                        height: 100vh !important;
                                    }
                                }

                                .card-registration .select-input.form-control[readonly]:not([disabled]) {
                                    font-size: 1rem;
                                    line-height: 2.15;
                                    padding-left: .75em;
                                    padding-right: .75em;
                                }

                                .card-registration .select-arrow {
                                    top: 13px;
                                }

                                .gradient-custom-2 {
                                    /* fallback for old browsers */
                                    background: #a1c4fd;

                                    /* Chrome 10-25, Safari 5.1-6 */
                                    background: -webkit-linear-gradient(to right, rgba(161, 196, 253, 1), rgba(194, 233, 251, 1));

                                    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                                    background: linear-gradient(to right, rgba(161, 196, 253, 1), rgba(194, 233, 251, 1))
                                }

                                .bg-indigo {
                                    background-color: #4835d4;
                                }

                                @media (min-width: 992px) {
                                    .card-registration-2 .bg-indigo {
                                        border-top-right-radius: 15px;
                                        border-bottom-right-radius: 15px;
                                    }
                                }

                                @media (max-width: 991px) {
                                    .card-registration-2 .bg-indigo {
                                        border-bottom-left-radius: 15px;
                                        border-bottom-right-radius: 15px;
                                    }
                                }
                            </style>

                            <section class="h-auto bg-secondary">
                                <div class="container py-5 h-100">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col-12">
                                            <div class="card card-registration card-registration-2"
                                                style="border-radius: 15px;">
                                                <div class="card-body p-0">
                                                    <form method="POST"
                                                        action="{{ route('pegawai.update', $pegawai->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row g-0">
                                                            <div class="col-lg-6">
                                                                <div class="p-5">
                                                                    <div class="row">
                                                                        <label class="form-label">NIP</label>
                                                                        <div class="col-md-15 mb-2 pb-2">
                                                                            <div class="form-outline">
                                                                                <input type="text" id="nip"
                                                                                    class="form-control form-control-lg"
                                                                                    name="nip"
                                                                                    value="{{ $pegawai->nip }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <label class="form-label">Nama
                                                                            Lengkap</label>
                                                                        <div class="col-md-15 mb-2 pb-2">
                                                                            <div class="form-outline">
                                                                                <input type="text" id="nama_lengkap"
                                                                                    class="form-control form-control-lg"
                                                                                    name="nama_lengkap" required autofocus
                                                                                    value="{{ $pegawai->nama_lengkap }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2">
                                                                        <label class="mb-0">Jenis
                                                                            Kelamin</label>
                                                                        <div class="d-flex">
                                                                            <div class="form-check me-2">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="jenis_kelamin"
                                                                                    id="Laki-Laki" value="Laki-Laki">
                                                                                <label
                                                                                    class="custom-control-label">Laki-Laki</label>
                                                                            </div>

                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="jenis_kelamin"
                                                                                    id="Perempuan" value="Perempuan"
                                                                                    {{ $pegawai->status === 'Perempuan' ? 'checked' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label">Perempuan</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <div class="row">
                                                                        <div class="form-group mb-1 pb-2 mt-2">
                                                                            <label>Tempat Lahir</label>
                                                                            <textarea class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">{{ $pegawai->tempat_lahir }}</textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group md-5 mb-3">
                                                                            <label for="example-datetime-local-input"
                                                                                class="form-control-label">Tanggal
                                                                                Lahir</label>
                                                                            <input type="date" class="form-control"
                                                                                value="{{ $pegawai->tanggal_lahir }}"
                                                                                id="tanggal_lahir" name="tanggal_lahir">
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group mb-2 pb-2 mt-2">
                                                                        <label>Pendidikan Terakhir</label>
                                                                        <select class="select form-control"
                                                                            name="pendidikan_terakhir">
                                                                            <option
                                                                                value="{{ $pegawai->pendidikan_terakhir }}">
                                                                                {{ $pegawai->pendidikan_terakhir }}
                                                                            </option>
                                                                            <option value="SD">SD</option>
                                                                            <option value="SMP">SMP</option>
                                                                            <option value="SMA">SMA</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group mb-2 pb-2">
                                                                        <label>Unite Sekolah</label>
                                                                        <select class="select form-control"
                                                                            name="unit_sekolah">
                                                                            <option value="{{ $pegawai->unit_sekolah }}">
                                                                                {{ $pegawai->unit_sekolah }}
                                                                            </option>
                                                                            <option value="SD">SD</option>
                                                                            <option value="SMP">SMP</option>
                                                                            <option value="SMA">SMA</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group mb-2 pb-2">
                                                                        <label for="jabatan_id">Jabatan</label>
                                                                        <select class="select form-control"
                                                                            name="jabatan_id" id="jabatan_id">
                                                                            @foreach ($jabatan as $jab)
                                                                                @if (old('jabatan_id') == $jab->id)
                                                                                    <option value="{{ $jab->id }}"
                                                                                        selected>
                                                                                        {{ $jab->nama_jabatan }}
                                                                                    </option>
                                                                                @else
                                                                                    <option value="{{ $jab->id }}">
                                                                                        {{ $jab->nama_jabatan }}
                                                                                    </option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group mb-2 pb-2">
                                                                        <label>Status Kepegawaian</label>
                                                                        <select class="select form-control"
                                                                            name="status_kepegawaian">
                                                                            <option
                                                                                value="{{ $pegawai->status_kepegawaian }}">
                                                                                {{ $pegawai->status_kepegawaian }}
                                                                            </option>
                                                                            <option value="Pegawai Tetap">Pegawai Tetap
                                                                            </option>
                                                                            <option value="Pegawai Tidak Tetap">Pegawai
                                                                                Tidak Tetap</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group mb-2 pb-2">
                                                                            <label>Alamat</label>
                                                                            <textarea class="form-control" name="alamat" placeholder="Alamat Tempat Tinggal">{{ $pegawai->alamat }}</textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <label class="form-label" for="form3Examplev2">No
                                                                            Hp/Phone</label>
                                                                        <div class="col-md-15 mb-2 pb-2">
                                                                            <div class="form-outline">
                                                                                <input type="text" id="form3Examplev2"
                                                                                    class="form-control form-control-lg"
                                                                                    placeholder="123-456-789"
                                                                                    name="telephone"
                                                                                    value="{{ $pegawai->telephone }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Email</label>
                                                                        <input type="email" class="form-control"
                                                                            name="email" id="email"
                                                                            placeholder="example@gmail.com"
                                                                            aria-label="Email"
                                                                            aria-describedby="email-addon"
                                                                            value="{{ $pegawai->email }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Password <span
                                                                                style="font-size: smaller;">Default:</span>
                                                                            <span
                                                                                style="color: red;">password</span></label>
                                                                        <input type="text" class="form-control"
                                                                            name="password" id="password"
                                                                            placeholder="Password" aria-label="Password"
                                                                            aria-describedby="password-addon"
                                                                            value="{{ isset($pegawai->password) ? $pegawai->password : 'password' }}">
                                                                        @error('password')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                        <input type="hidden" name="hashed_password"
                                                                            value="{{ $pegawai->password ?? '' }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 bg-indigo text-white">
                                                                <div class="p-5">

                                                                    <div class="row">
                                                                        <div class="form-group md-5 mb-3">
                                                                            <label for="example-datetime-local-input"
                                                                                class="form-control-label"
                                                                                style="color: white">Tanggal
                                                                                Masuk</label>
                                                                            <input type="date" class="form-control"
                                                                                value="{{ $pegawai->tanggal_masuk }}"
                                                                                id="tanggal_masuk" name="tanggal_masuk">
                                                                        </div>
                                                                    </div>



                                                                    <div class="row">
                                                                        <div class="form-group md-5 mb-3">
                                                                            <label for="example-datetime-local-input"
                                                                                class="form-control-label"
                                                                                style="color: white">Tanggal
                                                                                Keluar</label>
                                                                            <input type="date" class="form-control"
                                                                                value="{{ $pegawai->tanggal_keluar }}"
                                                                                id="tanggal_keluar" name="tanggal_keluar">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2">
                                                                        <label class="mb-0"
                                                                            style="color: white">Status</label>
                                                                        <div class="d-flex">
                                                                            <div class="form-check me-2">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="status"
                                                                                    id="Aktif" value="Aktif">
                                                                                <label class="custom-control-label"
                                                                                    style="color: white">Aktif</label>
                                                                            </div>

                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="status"
                                                                                    id="Tidak Aktif" value="Tidak Aktif"
                                                                                    {{ $pegawai->status === 'Tidak Aktif' ? 'checked' : '' }}>
                                                                                <label class="custom-control-label"
                                                                                    style="color: white">Tidak
                                                                                    Aktif</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="mb-3">
                                                                        <label for="image"
                                                                            class="form-label">Foto</label>
                                                                        <input type="hidden" name="oldImage"
                                                                            value="{{ $pegawai->image }}">
                                                                        @if ($pegawai->image)
                                                                            <img src="{{ asset('storage/' . $pegawai->image) }}"
                                                                                class="img-preview img-fluid mb-3 d-block">
                                                                        @else
                                                                            <img
                                                                                class="img-preview img-fluid d-block mb-3">
                                                                        @endif
                                                                        <input
                                                                            class="form-control @error('image')is-invalid @enderror"
                                                                            type="file" id="image" name="image"
                                                                            onchange="previewImage()">
                                                                        @error('image')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="mt-5 text-center">
                                                                    <button type="submit" class="btn btn-success"
                                                                        style="width: 250px">Simpan Perubahan</button>
                                                                </div>
                                                                <div class="mt-2 text-center">
                                                                    <a href="pegawai"
                                                                        class="btn btn-secondary btn-primary"
                                                                        style="width: 250px;">Batal</a>
                                                                </div>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function previewImage() {
            const input = document.querySelector('input[type="file"]');
            const preview = document.querySelector('.img-preview');
            const file = input.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                preview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        document.querySelector('input[type="file"]').addEventListener('change', previewImage);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script>
        $(document).ready(function() {
            // Menangani perubahan pada radio button
            $('input[name="jenis_kelamin"]').on('change', function() {
                var jenisKelamin = $('input[name="jenis_kelamin"]:checked').val();
                console.log(jenisKelamin);

                // Anda dapat menggunakan nilai jenisKelamin sesuai kebutuhan Anda
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil nilai status dari objek pegawai
            var status = "{{ $pegawai->status }}";

            // Tentukan elemen radio button yang sesuai
            var radioStatus = document.getElementById(status);

            // Set atribut checked jika status sesuai
            if (radioStatus) {
                radioStatus.checked = true;
            }

            // Ambil nilai jenis kelamin dari objek pegawai
            var jenisKelamin = "{{ $pegawai->jenis_kelamin }}";

            // Tentukan elemen radio button yang sesuai
            var radioJenisKelamin = document.getElementById(jenisKelamin);

            // Set atribut checked jika jenis kelamin sesuai
            if (radioJenisKelamin) {
                radioJenisKelamin.checked = true;
            }
        });
    </script>
@endsection
