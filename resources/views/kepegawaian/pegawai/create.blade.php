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
                                                    <form method="POST" action="{{ route('pegawai.store') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row g-0">
                                                            <div class="col-lg-6">
                                                                <div class="p-5">
                                                                    <h3 class="fw-normal mb-5" style="color: #4835d4;">
                                                                        Tambah
                                                                        Pegawai</h3>

                                                                    <div class="row">
                                                                        <label class="form-label">NIP</label>
                                                                        <div class="col-md-15 mb-2 pb-2">
                                                                            <div class="form-outline">
                                                                                <input type="text" id="nip"
                                                                                    class="form-control form-control-lg @error('nip')is-invalid @enderror"
                                                                                    name="nip" required autofocus
                                                                                    value="{{ old('nip') }}"
                                                                                    placeholder="Masukkan NIP" />
                                                                                @error('nip')
                                                                                    <div class="text-danger">{{ $message }}
                                                                                    </div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <label class="form-label">Nama
                                                                            Lengkap</label>
                                                                        <div class="col-md-15 mb-2 pb-2">
                                                                            <div class="form-outline">
                                                                                <input type="text" id="nama_lengkap"
                                                                                    class="form-control form-control-lg @error('nama_lengkap')is-invalid @enderror"
                                                                                    name="nama_lengkap" required autofocus
                                                                                    value="{{ old('nama_lengkap') }}"
                                                                                    placeholder="Masukkan nama lengkap" />
                                                                                @error('nama_lengkap')
                                                                                    <div class="text-danger">{{ $message }}
                                                                                    </div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2">
                                                                        <label class="mb-0">Jenis Kelamin</label>
                                                                        <div class="d-flex">
                                                                            <div class="form-check me-2">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="jenis_kelamin"
                                                                                    id="laki-laki" value="Laki-Laki">
                                                                                <label
                                                                                    class="custom-control-label">Laki-Laki</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="jenis_kelamin"
                                                                                    id="perempuan" value="Perempuan">
                                                                                <label
                                                                                    class="custom-control-label">Perempuan</label>
                                                                            </div>
                                                                        </div>
                                                                        @error('jenis_kelamin')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="form-group mb-2 pb-2">
                                                                            <label>Tempat Lahir</label>
                                                                            <textarea class="form-control @error('tempat_lahir')is-invalid @enderror" name="tempat_lahir"
                                                                                placeholder="Masukkan Tempat Lahir">{{ old('tempat_lahir') }}</textarea>
                                                                            @error('tempat_lahir')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group md-5 mb-3">
                                                                            <label for="example-datetime-local-input"
                                                                                class="form-control-label">Tanggal
                                                                                lahir</label>
                                                                            <input type="date"
                                                                                class="form-control @error('tangal_lahir')is-invalid @enderror"
                                                                                required autofocus
                                                                                value="{{ old('tanggal_lahir') }}"
                                                                                id="tanggal_lahir" name="tanggal_lahir">
                                                                            @error('tanggal_lahir')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group mb-2 pb-2">
                                                                        <select class="select form-control"
                                                                            name="pendidikan_terakhir">
                                                                            <option value="disable value">--- Pendidikan
                                                                                Terakhir
                                                                                ---
                                                                            </option>
                                                                            <option value="SD">SD</option>
                                                                            <option value="SMP">SMP</option>
                                                                            <option value="SMA">SMA</option>
                                                                        </select>
                                                                        @error('pendidikan_terakhir')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group mb-2 pb-2">
                                                                        <select class="select form-control"
                                                                            name="unit_sekolah">
                                                                            <option value="disable value">--- Unit Sekolah
                                                                                ---
                                                                            </option>
                                                                            <option value="SD">SD</option>
                                                                            <option value="SMP">SMP</option>
                                                                            <option value="SMA">SMA</option>
                                                                        </select>
                                                                        @error('unit_sekolah')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group mb-2 pb-2">
                                                                        <label for="jabatan_id">Jabatan</label>
                                                                        <select class="select form-control"
                                                                            name="jabatan_id" id="jabatan_id">
                                                                            @foreach ($jabatan as $jab)
                                                                                @if (old('jabatan_id') == $jab->id)
                                                                                    <option value="{{ $jab->id }}"
                                                                                        selected>{{ $jab->nama_jabatan }}
                                                                                    </option>
                                                                                @else
                                                                                    <option value="{{ $jab->id }}">
                                                                                        {{ $jab->nama_jabatan }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group mb-2 pb-2">
                                                                        <select class="select form-control"
                                                                            name="status_kepegawaian">
                                                                            <option value="" disabled selected>---
                                                                                Status Kepegawaian ---</option>
                                                                            <option value="Pegawai Tetap">Pegawai Tetap
                                                                            </option>
                                                                            <option value="Pegawai Tidak Tetap">Pegawai
                                                                                Tidak Tetap</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group mb-2 pb-2">
                                                                            <label>Alamat</label>
                                                                            <textarea class="form-control @error('alamat')is-invalid @enderror" name="alamat"
                                                                                placeholder="Alamat Tempat Tinggal">{{ old('alamat') }}</textarea>
                                                                            @error('alamat')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <label class="form-label" for="form3Examplev2">No
                                                                            Hp/Phone</label>
                                                                        <div class="col-md-15 mb-2 pb-2">
                                                                            <div class="form-outline">
                                                                                <input type="text" id="form3Examplev2"
                                                                                    class="form-control form-control-lg  @error('telephone')is-invalid @enderror"
                                                                                    placeholder="123-456-789"
                                                                                    name="telephone" required autofocus
                                                                                    value="{{ old('telephone') }}" />
                                                                                @error('telephone')
                                                                                    <div class="invalid-feedback">
                                                                                        {{ $message }}
                                                                                    </div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Email</label>
                                                                        <input type="email"
                                                                            class="form-control @error('email')is-invalid @enderror"
                                                                            name="email" id="email"
                                                                            placeholder="example@gmail.com"
                                                                            aria-label="Email"
                                                                            aria-describedby="email-addon" required
                                                                            autofocus value="{{ old('email') }}">
                                                                        @error('email')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Password <span
                                                                                style="font-size: smaller;">Default:</span>
                                                                            <span
                                                                                style="color: red;">password</span></label>
                                                                        <input type="password" class="form-control"
                                                                            name="password" id="password"
                                                                            placeholder="Password" aria-label="Password"
                                                                            aria-describedby="password-addon">
                                                                        @error('password')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Konfirmasi Password <span
                                                                                style="font-size: smaller;">kosongi jika
                                                                                password kosong</span></label>
                                                                        <input type="password" class="form-control"
                                                                            name="password_confirmation"
                                                                            id="password_confirmation"
                                                                            placeholder="Konfirmasi Password"
                                                                            aria-label="Konfirmasi Password"
                                                                            aria-describedby="password-addon">
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
                                                                            <input type="date"
                                                                                class="form-control @error('tanggal_masuk')is-invalid @enderror"
                                                                                value="tanggal_masuk" id="tanggal_masuk"
                                                                                name="tanggal_masuk" required autofocus
                                                                                value="{{ old('tanggal_masuk') }}">
                                                                            @error('tanggal_masuk')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group md-5 mb-3">
                                                                            <label for="example-datetime-local-input"
                                                                                class="form-control-label"
                                                                                style="color: white">Tanggal
                                                                                Keluar</label>
                                                                            <input type="date" class="form-control"
                                                                                value="tanggal_keluar" id="tanggal_keluar"
                                                                                name="tanggal_keluar"
                                                                                value="{{ old('tanggal_keluar') }}">
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
                                                                                    id="Tidak Aktif" value="Tidak Aktif">
                                                                                <label class="custom-control-label"
                                                                                    style="color: white">Tidak
                                                                                    Aktif</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="mb-3">
                                                                        <label for="image" class="form-label"
                                                                            style="color: white">Post
                                                                            Image</label>
                                                                        <img class="img-preview img-fluid d-block mb-3">
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
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-lg">Tambah
                                                                        Pegawai</button>
                                                                </div>
                                                                <div class="mt-1 text-center">
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
        // Mendapatkan elemen input tanggal
        var inputTanggal = document.getElementById('tanggal_lahir');

        // Mendapatkan tanggal saat ini
        var today = new Date();

        // Mendapatkan tanggal dalam format yang sesuai dengan preferensi lokal
        var options = {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
        };
        var formattedDate = today.toLocaleDateString(undefined, options);

        // Mengatur nilai elemen input tanggal
        inputTanggal.value = formattedDate;
    </script>

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

        // Attach the previewImage function to the change event of the file input
        document.querySelector('input[type="file"]').addEventListener('change', previewImage);
    </script>

    <!-- JavaScript function to validate password confirmation -->
    <script>
        function validatePassword() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;

            if (password !== confirmPassword) {
                alert('Password and Confirm Password do not match');
                return false;
            }

            return true;
        }
    </script>
@endsection
