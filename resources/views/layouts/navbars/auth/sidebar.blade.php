<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg white ps bg-white"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
            <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="...">
            <span class="ms-3 font-weight-bold">Pesantren | {{ $tittle }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <ul class="navbar-nav accordion" id="accordionSidebar">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                <div
                    class="icon icon-shape icon-md shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M288 32C128.9 32 0 160.9 0 320c0 52.8 14.3 102.3 39.1 144.8 5.6 9.6 16.3 15.2 27.4 15.2h443c11.1 0 21.8-5.6 27.4-15.2C561.8 422.3 576 372.8 576 320c0-159.1-128.9-288-288-288zm0 64c14.7 0 26.6 10.1 30.3 23.7-1.1 2.3-2.6 4.2-3.5 6.7l-9.2 27.7c-5.1 3.5-11 6-17.6 6-17.7 0-32-14.3-32-32S270.3 96 288 96zM96 384c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm48-160c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm246.8-72.4l-61.3 184C343.1 347.3 352 364.5 352 384c0 11.7-3.4 22.6-8.9 32H232.9c-5.5-9.5-8.9-20.3-8.9-32 0-33.9 26.5-61.4 59.9-63.6l61.3-184c4.2-12.6 17.7-19.5 30.4-15.2 12.6 4.2 19.4 17.8 15.2 30.4zm14.7 57.2l15.5-46.6c3.5-1.3 7.1-2.2 11.1-2.2 17.7 0 32 14.3 32 32s-14.3 32-32 32c-11.4 0-20.9-6.3-26.6-15.2zM480 384c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z" />
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
        <li class="nav-item mt-2">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Menu</h6>
        </li>


        <li class="nav-item">
            <a class="nav-link" role="button" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="false"
                aria-controls="collapseOne">
                <div
                    class="icon icon-shape icon-md shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3 .7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3 .4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm224 32c1.9 0 3.7-.5 5.6-.6 8.3-21.7 20.5-42.1 36.3-59.2 7.4-8 17.9-12.6 28.9-12.6 6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4 7-14.6 11.2-30.8 11.2-48 0-61.9-50.1-112-112-112S208 82.1 208 144c0 61.9 50.1 112 112 112zm105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9-8.2 4.8-15.3 9.8-27.5 9.8-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-10.7-34.5 24.9-49.7 25.8-50.3-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1-3.3 .2-6.5 .6-9.8 .6-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3v-9.2zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" />
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Kesantrian</span>
            </a>
            <ul class="nav nav-pills nav-fill collapse mt-1 flex-column bg-secondary " id="collapseOne"
                aria-labelledby="headingOne" data-bs-parent="#accordionSidebar">
                <div class="navbar-nav collapse-horizontal rounded ">
                    <li class="nav-item collapse-item">
                        <a href="/kesantrian/kelas" class="nav-link  {{ Request::is('santri') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Kelas</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="/kesantrian/kamar"
                            class="nav-link {{ Request::is('kesantrian/kamar') ? 'active' : '' }}">
                            <span class="nav-link-text ms-1">Kamar</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="/kesantrian/santri"
                            class="nav-link {{ Request::is('kesantrian/santri') ? 'active' : '' }}">
                            <span class="nav-link-text ms-1">Santri</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('regristrasi-rfid') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Regristrasi RFID</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('kirim -pengumuman') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Santri</span>
                        </a>
                    </li>
                </div>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link" role="button" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                aria-controls="collapseTwo">
                <div
                    class="icon icon-shape icon-md shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3 .7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3 .4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm224 32c1.9 0 3.7-.5 5.6-.6 8.3-21.7 20.5-42.1 36.3-59.2 7.4-8 17.9-12.6 28.9-12.6 6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4 7-14.6 11.2-30.8 11.2-48 0-61.9-50.1-112-112-112S208 82.1 208 144c0 61.9 50.1 112 112 112zm105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9-8.2 4.8-15.3 9.8-27.5 9.8-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-10.7-34.5 24.9-49.7 25.8-50.3-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1-3.3 .2-6.5 .6-9.8 .6-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3v-9.2zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" />
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Kepengasuhan</span>
            </a>
            <ul class="nav nav-pills nav-fill collapse mt-1 flex-column bg-secondary " id="collapseTwo"
                aria-labelledby="headingOne" data-bs-parent="#accordionSidebar">
                <div class="navbar-nav collapse-horizontal rounded ">
                    <li class="nav-item collapse-item">
                        <a href="{{ url('user-profile') }}"
                            class="nav-link  {{ Request::is('user-profile') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Tahfidz</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('nadhoman') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Nadhoman</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('kesehatan') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Kesehatan</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('konseling') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Konseling</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('izin-keluar') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Izin Keluar</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('izin-pulang') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Izin Pulang</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('kunjungan-santri') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Kunjungan Santri</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link  {{ Request::is('keluar-masuk-ponfok') ? 'active' : '' }}">
                            <span class="nav-link-text ms-1">Keluar Masuk Pondok</span>
                        </a>
                    </li>
                </div>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link" role="button" data-bs-toggle="collapse" href="#collapseThree"
                aria-expanded="false" aria-controls="collapseThree">
                <div
                    class="icon icon-shape icon-md shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3 .7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3 .4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm224 32c1.9 0 3.7-.5 5.6-.6 8.3-21.7 20.5-42.1 36.3-59.2 7.4-8 17.9-12.6 28.9-12.6 6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4 7-14.6 11.2-30.8 11.2-48 0-61.9-50.1-112-112-112S208 82.1 208 144c0 61.9 50.1 112 112 112zm105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9-8.2 4.8-15.3 9.8-27.5 9.8-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-10.7-34.5 24.9-49.7 25.8-50.3-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1-3.3 .2-6.5 .6-9.8 .6-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3v-9.2zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" />
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Kepegawaian</span>
            </a>
            <ul class="nav nav-pills nav-fill collapse mt-1 flex-column bg-secondary " id="collapseThree"
                aria-labelledby="headingOne" data-bs-parent="#accordionSidebar">
                <div class="navbar-nav collapse-horizontal rounded ">
                    <li class="nav-item collapse-item">
                        <a href="{{ route('jabatan.index') }}"
                            class="nav-link  {{ Request::is('Jabatan') ? 'active' : '' }}">
                            <span class="nav-link-text ms-1">Jabatan Pegawai</span>
                        </a>
                    </li>
                    <a href="{{ route('pegawai.index') }}"
                        class="nav-link {{ Request::is('kepegawaian.pegawai') ? 'active' : '' }}">
                        <span class="nav-link-text ms-1">Pegawai</span>
                    </a>

                    <li class="nav-item collapse-item">
                        <a class="nav-link {{ Request::is('presensi-pegawai') ? 'active' : '' }}" role="button"
                            data-bs-toggle="collapse" href="#presensiDropdown" aria-expanded="false"
                            aria-controls="presensiDropdown">
                            <span class="nav-link-text ms-1">Presensi Pegawai </span>
                        </a>
                        <div class="collapse" id="presensiDropdown">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-link">
                                    <a class="nav-link" href="">
                                        <span class="nav-link-text ms-2">Area Presensi Pegawai</span>
                                    </a>
                                </li>
                                <li class="nav-link">
                                    <a class="nav-link" href="">
                                        <span class="nav-link-text ms-2">Rekap Presensi di Web</span>
                                    </a>
                                </li>
                                <li class="nav-link">
                                    <a class="nav-link" href="{{ route('dataareapresensi.index') }}">
                                        <span class="nav-link-text ms-2">Data Area Presensi</span>
                                    </a>
                                </li>
                                <li class="nav-link">
                                    <a class="nav-link" href="{{ route('presensikhusus.index') }}">
                                        <span class="nav-link-text ms-2">Presensi Khusus</span>
                                    </a>
                                </li>
                                <li class="nav-link">
                                    <a class="nav-link" href="{{ route('data-libur-presensi.index') }}">
                                        <span class="nav-link-text ms-2">Data Libur Presensi</span>
                                    </a>
                                </li>
                                <li class="nav-link">
                                    <a class="nav-link" href="{{ route('jam-masuk-dan-pulang.index') }}">
                                        <span class="nav-link-text ms-2">Jam Masuk & Pulang</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </div>
            </ul>
        </li>



        <li class="nav-item">
            <a class="nav-link" role="button" data-bs-toggle="collapse" href="#collapseFour" aria-expanded="false"
                aria-controls="collapseFour">
                <div
                    class="icon icon-shape icon-md shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3 .7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3 .4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm224 32c1.9 0 3.7-.5 5.6-.6 8.3-21.7 20.5-42.1 36.3-59.2 7.4-8 17.9-12.6 28.9-12.6 6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4 7-14.6 11.2-30.8 11.2-48 0-61.9-50.1-112-112-112S208 82.1 208 144c0 61.9 50.1 112 112 112zm105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9-8.2 4.8-15.3 9.8-27.5 9.8-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-10.7-34.5 24.9-49.7 25.8-50.3-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1-3.3 .2-6.5 .6-9.8 .6-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3v-9.2zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" />
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Akademik</span>
            </a>
            <ul class="nav nav-pills nav-fill collapse mt-1 flex-column bg-secondary " id="collapseFour"
                aria-labelledby="headingOne" data-bs-parent="#accordionSidebar">
                <div class="navbar-nav collapse-horizontal rounded ">
                    <li class="nav-item">
                        <a href="{{ route('tahun-ajaran.index') }}" class="nav-link">
                            <span class="nav-link-text ms-1">Tahun Ajaran</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="{{ route('semester.index') }}" class="nav-link">
                            <span class="nav-link-text ms-1">Semester</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('pindah-kelas') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Pindah Kelas</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('pindah-kamar') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Pindah Kamar</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('kelulusan') ? 'active' : '' }}">
                            <span class="nav-link-text ms-1">Kelulusan</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="{{ route('Mata-Pelajaran.index') }}" class="nav-link ">
                            <span class="nav-link-text ms-1">Mata Pelajaran</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="{{ route('Data-Kitab.index') }}" class="nav-link">
                            <span class="nav-link-text ms-1">Data Kitab</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="{{ route('Jam-Pelajaran.index') }}" class="nav-link">
                            <span class="nav-link-text ms-1">Jam Pelajaran</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="{{ route('Jadwal-Pelajaran.index') }}" class="nav-link">
                            <span class="nav-link-text ms-1">Jadwal Pelajaran</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('presensi-harian') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Presensi Harian</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link{{ Request::is('jurnal-mengajar') ? 'active' : '' }}">
                            <span class="nav-link-text ms-1">Jurnal Mengajar</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('data-ppdb') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Data PPDB</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('alumni') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Alumni</span>
                        </a>
                    </li>
                </div>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link" role="button" data-bs-toggle="collapse" href="#collapseFive" aria-expanded="false"
                aria-controls="collapseFive">
                <div
                    class="icon icon-shape icon-md shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3 .7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3 .4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm224 32c1.9 0 3.7-.5 5.6-.6 8.3-21.7 20.5-42.1 36.3-59.2 7.4-8 17.9-12.6 28.9-12.6 6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4 7-14.6 11.2-30.8 11.2-48 0-61.9-50.1-112-112-112S208 82.1 208 144c0 61.9 50.1 112 112 112zm105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9-8.2 4.8-15.3 9.8-27.5 9.8-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-10.7-34.5 24.9-49.7 25.8-50.3-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1-3.3 .2-6.5 .6-9.8 .6-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3v-9.2zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" />
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Keuangan</span>
            </a>
            <ul class="nav nav-pills nav-fill collapse mt-1 flex-column bg-secondary " id="collapseFive"
                aria-labelledby="headingOne" data-bs-parent="#accordionSidebar">
                <div class="navbar-nav collapse-horizontal rounded ">
                    <li class="nav-item collapse-item">
                        <a href="{{ url('user-profile') }}"
                            class="nav-link  {{ Request::is('user-profile') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Tabungan Santri</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link  {{ Request::is('kasdanbank') ? 'active' : '' }}">
                            <span class="nav-link-text ms-1">Kas & Bank</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('pengajian') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Pengajian</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('hutang') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Hutang</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link  {{ Request::is('kirim-tagihan') ? 'active' : '' }}">
                            <span class="nav-link-text ms-1">Kirim Tagihan</span>
                        </a>
                    </li>
                </div>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link" role="button" data-bs-toggle="collapse" href="#collapseSix" aria-expanded="false"
                aria-controls="collapseSix">
                <div
                    class="icon icon-shape icon-md shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3 .7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3 .4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm224 32c1.9 0 3.7-.5 5.6-.6 8.3-21.7 20.5-42.1 36.3-59.2 7.4-8 17.9-12.6 28.9-12.6 6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4 7-14.6 11.2-30.8 11.2-48 0-61.9-50.1-112-112-112S208 82.1 208 144c0 61.9 50.1 112 112 112zm105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9-8.2 4.8-15.3 9.8-27.5 9.8-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-10.7-34.5 24.9-49.7 25.8-50.3-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1-3.3 .2-6.5 .6-9.8 .6-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3v-9.2zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" />
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Lap. Pengasuhan</span>
            </a>
            <ul class="nav nav-pills nav-fill collapse mt-1 flex-column bg-secondary " id="collapseSix"
                aria-labelledby="headingOne" data-bs-parent="#accordionSidebar">
                <div class="navbar-nav collapse-horizontal rounded ">
                    <li class="nav-item collapse-item">
                        <a href="{{ url('user-profile') }}"
                            class="nav-link  {{ Request::is('user-profile') ? 'active' : '' }}">
                            <span class="nav-link-text ms-1">Lap. Akademik</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link  {{ Request::is('lap-pembayatran') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Lap. Pembayaran</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('lap-keuangan') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Lap. Keuangan</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('lap-tabungan') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Lap. Tabungan</span>
                        </a>
                    </li>
                </div>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link" role="button" data-bs-toggle="collapse" href="#collapseSeven"
                aria-expanded="false" aria-controls="collapseSeven">
                <div
                    class="icon icon-shape icon-md shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3 .7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3 .4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm224 32c1.9 0 3.7-.5 5.6-.6 8.3-21.7 20.5-42.1 36.3-59.2 7.4-8 17.9-12.6 28.9-12.6 6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4 7-14.6 11.2-30.8 11.2-48 0-61.9-50.1-112-112-112S208 82.1 208 144c0 61.9 50.1 112 112 112zm105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9-8.2 4.8-15.3 9.8-27.5 9.8-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-10.7-34.5 24.9-49.7 25.8-50.3-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1-3.3 .2-6.5 .6-9.8 .6-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3v-9.2zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" />
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Pengaturan</span>
            </a>
            <ul class="nav nav-pills nav-fill collapse mt-1 flex-column bg-secondary " id="collapseSeven"
                aria-labelledby="headingOne" data-bs-parent="#accordionSidebar">
                <div class="navbar-nav collapse-horizontal rounded ">
                    <li class="nav-item collapse-item">
                        <a href="{{ url('user-profile') }}"
                            class="nav-link {{ Request::is('user-profile') ? 'active' : '' }}">
                            <span class="nav-link-text ms-1">Informasi</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#"
                            class="nav-link  {{ Request::is('manajemen-penggunaan') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Manajemen Penggunaan</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="#" class="nav-link {{ Request::is('log-transaksi') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Log Transaksi</span>
                        </a>
                    </li>
                </div>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link" role="button" data-bs-toggle="collapse" href="#collapseEight"
                aria-expanded="false" aria-controls="collapseEight">
                <div
                    class="icon icon-shape icon-md shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3 .7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3 .4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm224 32c1.9 0 3.7-.5 5.6-.6 8.3-21.7 20.5-42.1 36.3-59.2 7.4-8 17.9-12.6 28.9-12.6 6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4 7-14.6 11.2-30.8 11.2-48 0-61.9-50.1-112-112-112S208 82.1 208 144c0 61.9 50.1 112 112 112zm105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9-8.2 4.8-15.3 9.8-27.5 9.8-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-10.7-34.5 24.9-49.7 25.8-50.3-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1-3.3 .2-6.5 .6-9.8 .6-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3v-9.2zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" />
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Pimpinan</span>
            </a>
            <ul class="nav nav-pills nav-fill collapse mt-1 flex-column bg-secondary " id="collapseEight"
                aria-labelledby="headingOne" data-bs-parent="#accordionSidebar">
                <div class="navbar-nav collapse-horizontal rounded ">
                    <li class="nav-item collapse-item">
                        <a href="" class="nav-link  ">
                            <span class="nav-link-text ms-1">Analisa & Performa</span>
                        </a>
                    </li>
                    <li class="nav-item collapse-item">
                        <a href="{{ url('user-profile') }}"
                            class="nav-link  {{ Request::is('user-profile') ? 'active' : '' }} ">
                            <span class="nav-link-text ms-1">Statistik</span>
                        </a>
                    </li>
                </div>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>customer-support</title>
                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                fill-rule="nonzero">
                                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                    <g id="customer-support" transform="translate(1.000000, 0.000000)">
                                        <path class="color-background"
                                            d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"
                                            id="Path" opacity="0.59858631"></path>
                                        <path class="color-foreground"
                                            d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"
                                            id="Path"></path>
                                        <path class="color-foreground"
                                            d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"
                                            id="Path"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <span class="nav-link-text ms-1">User Profile</span>
            </a>
        </li>
        <li class="nav-item pb-2">
            <a class="nav-link {{ Request::is('user-management') ? 'active' : '' }}"
                href="{{ url('user-management') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1rem;"
                        class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark {{ Request::is('user-management') ? 'text-white' : 'text-dark' }} "
                        aria-hidden="true"></i>
                </div>
                <span class="nav-link-text ms-1">User Management</span>
            </a>
        </li>
        <li class="nav-item mt-2">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Example pages</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('tables') ? 'active' : '' }}" href="{{ url('tables') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>office</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g id="office" transform="translate(153.000000, 2.000000)">
                                        <path class="color-background opacity-6"
                                            d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                        </path>
                                        <path class="color-background"
                                            d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Tables</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('billing') ? 'active' : '' }}" href="{{ url('billing') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>credit-card</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g transform="translate(453.000000, 454.000000)">
                                        <path class="color-background opacity-6"
                                            d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z">
                                        </path>
                                        <path class="color-background"
                                            d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Billing</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="{{ url('profile') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>customer-support</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g transform="translate(1.000000, 0.000000)">
                                        <path class="color-background opacity-6"
                                            d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                        </path>
                                        <path class="color-background"
                                            d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                        </path>
                                        <path class="color-background"
                                            d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
            </a>
        </li>
    </ul>
</aside>
