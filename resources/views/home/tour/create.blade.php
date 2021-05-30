@extends('templates.default')

@section('content')
    <div class="template-demo">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{ route('tour') }}">Pariwisata</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Tambah</span></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="cmxform" id="create-tours" method="post" action="{{ route('tour.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Masukan Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <textarea id="address" name="address" class="form-control" rows="4"
                                            placeholder="Masukan Alamat"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label>Layanan Kesehatan</label>
                                            <select name="category" class="form-control">
                                                <option value="Pukesmas"
                                                    {{ old('category') == 'Pukesmas' ? 'selected' : '' }}>Pukesmas
                                                </option>
                                                <option value="Rumah Sakit"
                                                    {{ old('category') == 'Rumah Sakit' ? 'selected' : '' }}>Rumah Sakit
                                                </option>
                                                <option value="Klinik"
                                                    {{ old('category') == 'Klinik' ? 'selected' : '' }}>
                                                    Klinik</option>
                                                <option value="Apotik"
                                                    {{ old('category') == 'Apotik' ? 'selected' : '' }}>
                                                    Apotik</option>
                                                <option value="Laboratorium"
                                                    {{ old('category') == 'Laboratorium' ? 'selected' : '' }}>Laboratorium
                                                </option>
                                                <option value="Posyandu"
                                                    {{ old('category') == 'Posyandu' ? 'selected' : '' }}>Posyandu
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="region">Kecamatan</label>
                                            <input id="region" type="text" name="region" value="{{ old('region') }}"
                                                list="regions" class="form-control mt-1" placeholder="Masukan Kecamatan"
                                                data-optgroup-list="regions" />
                                            <datalist id="regions">
                                                <option value="Tegal Timur">Tegal Timur</option>
                                                <option value="Tegal Barat">Tegal Barat</option>
                                                <option value="Tegal Selatan">Tegal Selatan</option>
                                                <option value="Margadana">Margadana</option>
                                                <option value="Adiwerna">Adiwerna</option>
                                                <option value="Balapulang">Balapulang</option>
                                                <option value="Bojong">Bojong</option>
                                                <option value="Bumijawa">Bumijawa</option>
                                                <option value="Dukuhturi">Dukuhturi</option>
                                                <option value="Dukuhwaru">Dukuhwaru</option>
                                                <option value="Jatinegara">Jatinegara</option>
                                                <option value="Kedungbanteng">Kedungbanteng</option>
                                                <option value="Kramat">Kramat</option>
                                                <option value="Lebaksiu">Lebaksiu</option>
                                                <option value="Margasari">Margasari</option>
                                                <option value="Pagerbarang">Pagerbarang</option>
                                                <option value="Pangkah">Pangkah</option>
                                                <option value="Slawi">Slawi</option>
                                                <option value="Suradadi">Suradadi</option>
                                                <option value="Talang">Talang</option>
                                                <option value="Tarub">Tarub</option>
                                                <option value="Warureja">Warureja</option>
                                            </datalist>
                                        </div>
                                        <div class="form-group row col-4">
                                            <label for="price">Biaya Registrasi</label>
                                            <input type="text" name="price" id="price" value="{{ old('price') }}"
                                                class="form-control" placeholder="Masukan Biaya Registrasi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="description" class="form-control" id="description" rows="10"
                                            cols="20" required>{{ old('description') }}</textarea>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="form-group col-6">
                                            <label for="image">Foto</label>
                                            <input type="file" name="image" id="image" class="file-upload-default"
                                                accept="image/*">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Pilih Foto">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-info"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Panorama</label>
                                            <input type="file" name="panorama[]" id="panorama" class="file-upload-default"
                                                accept="image/*" multiple="multiple" required>
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Pilih Panorama">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-info"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="form-group col-4">
                                            <label for="name">Longitude</label>
                                            <input type="text" id="long" name="long" class="form-control"
                                                value="{{ old('longitude') }}" placeholder="Longitude">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="name">Latitude</label>
                                            <input type="text" id="lat" name="lat" class="form-control"
                                                value="{{ old('latitude') }}" placeholder="Latitude">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div id="map2" class="dashboard-map"></div>
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Simpan">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var tanpa_rupiah = document.getElementById('price');
        tanpa_rupiah.addEventListener('keyup', function(e) {
            // console.log(tanpa_rupiah.value.replace('.','').replace('.',''));
            tanpa_rupiah.value = formatRupiah(this.value);
        });


        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

    </script>
    <script type="text/javascript">
        var options = {
            // center: [-6.894006, 109.377652],
            center : [-6.879704,109.125595],
            zoom: 13
        }

        var map = L.map('map2', options);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            id: 'mapbox.streets'
        }).addTo(map);
        var myMarker = L.marker(options.center, {
                draggable: true
            })
            .addTo(map)
            .on('dragend', function(e) {
                var coord = String(myMarker.getLatLng()).split(',');
                var lat = coord[0].split('(');
                var lng = coord[1].split(')');
                // myMarker.bindPopup("Moved to: " + lat[1] + ", " + lng[0] + ".");
                document.getElementById('lat').value = lat[1];
                document.getElementById('long').value = lng[0];
            });

    </script>
@endsection
