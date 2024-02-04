@extends('layouts.user_type.guest')

@section('content')

  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-lg-8 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Register now!</h5>
            </div>
            <div class="card-body">
              <form role="form text-left" method="POST" action="/register">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Nama Lengkap" name="username" id="username" aria-label="username" aria-describedby="username" value="{{ old('username') }}">
                  @error('username')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Nama Pesantren" name="pesantren" id="pesantren" aria-label="pesantren" aria-describedby="pesantren" value="{{ old('pesantren') }}">
                    @error('name')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" name="provinsi" id="floatingSelectProvinsi"
                        @error('provinsi') is-invalid @enderror>
                        <option selected>--Pilih Provinsi--</option>
                    </select>
                    @error('name')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <select class="form-select" name="kabupaten" id="floatingSelectKabupaten"
                        @error('kabupaten') is-invalid @enderror>
                        <option selected>--Pilih Kabupaten--</option>
                    </select>
                    @error('name')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <select class="form-select" name="kota" id="floatingSelectKota"
                        @error('kota') is-invalid @enderror>
                        <option selected>--Pilih Kota/Kecamatan--</option>
                    </select>
                    @error('name')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <select class="form-select" name="desa" id="floatingSelectDesa"
                        @error('desa') is-invalid @enderror>
                        <option selected>--Pilih Desa--</option>
                    </select>
                    @error('name')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat" aria-label="alamat" aria-describedby="alamat" value="{{ old('alamat') }}">
                    @error('email')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                <div class="mb-3">
                  <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                  @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-label="Password" aria-describedby="password-addon">
                  @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-check form-check-info text-left">
                  <input class="form-check-input" type="checkbox" name="agreement" id="flexCheckDefault" checked>
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                  </label>
                  @error('agreement')
                    <p class="text-danger text-xs mt-2">First, agree to the Terms and Conditions, then try register again.</p>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                </div>
                <p class="text-sm mt-3 mb-0">Already have an account? <a href="login" class="text-dark font-weight-bolder">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const provinsiSelect = document.getElementById('floatingSelectProvinsi');
        const kabupatenSelect = document.getElementById('floatingSelectKabupaten');
        const kotaSelect = document.getElementById('floatingSelectKota');
        const desaSelect = document.getElementById('floatingSelectDesa');

        fetch('https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(provinces => {
                var data = provinces;
                var tampung = '<option selected>--Pilih Provinsi--</option>';
                data.forEach(element => {
                    tampung +=
                        `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                provinsiSelect.innerHTML = tampung;
            });

        provinsiSelect.addEventListener('change', (e) => {
            var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
                .then(response => response.json())
                .then(regencies => {
                    var data = regencies;
                    var tampung = '<option selected>--Pilih Kabupaten--</option>';
                    data.forEach(element => {
                        tampung +=
                            `<option data-dist="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    kabupatenSelect.innerHTML = tampung;
                });
        });

        kabupatenSelect.addEventListener('change', (e) => {
            var kabupaten = e.target.options[e.target.selectedIndex].dataset.dist;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kabupaten}.json`)
                .then(response => response.json())
                .then(districts => {
                    var data = districts;
                    var tampung = '<option selected>--Pilih Kota/Kecamatan--</option>';
                    data.forEach(element => {
                        tampung +=
                            `<option data-vill="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    kotaSelect.innerHTML = tampung;
                });
        });

        kotaSelect.addEventListener('change', (e) => {
            var kota = e.target.options[e.target.selectedIndex].dataset.vill;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kota}.json`)
                .then(response => response.json())
                .then(villages => {
                    var data = villages;
                    var tampung = '<option selected>--Pilih Desa--</option>';
                    data.forEach(element => {
                        tampung +=
                            `<option value="${element.name}">${element.name}</option>`;
                    });
                    desaSelect.innerHTML = tampung;
                });
        });
    });
</script>
@endsection

