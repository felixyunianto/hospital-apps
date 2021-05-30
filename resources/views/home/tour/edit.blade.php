@extends('templates.default')

@section('content')
    <div class="template-demo">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{ route('tour') }}">Pariwisata</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Edit</span></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="cmxform" id="update-tours" method="post" action="{{ route('tour.update', $tour) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input id="name" name="name" type="text" value="{{ old('name', $tour->name) }}"
                                            class="form-control" placeholder="Masukan Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <textarea id="address" name="address" class="form-control" rows="4"
                                            placeholder="Masukan Alamat">{{ old('address', $tour->address) }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label>Layanan Kesehatan</label>
                                            <select name="category" class="form-control">
                                                <option value="Pukesmas"
                                                    {{ old('category') == 'Pukesmas' ? 'selected' : '' }} @if ($tour->category === 'Pukesmas') selected @endif>Pukesmas</option>
                                                <option value="Rumah Sakit"
                                                    {{ old('category') == 'Rumah Sakit' ? 'selected' : '' }} @if ($tour->category === 'Rumah Sakit') selected @endif>Rumah Sakit</option>
                                                <option value="Klinik" {{ old('category') == 'Klinik' ? 'selected' : '' }}
                                                    @if ($tour->category === 'Klinik') selected @endif>Klinik</option>
                                                <option value="Apotik" {{ old('category') == 'Apotik' ? 'selected' : '' }}
                                                    @if ($tour->category === 'Apotik') selected @endif>Apotik</option>
                                                <option value="Laboratorium"
                                                    {{ old('category') == 'Laboratorium' ? 'selected' : '' }} @if ($tour->category === 'Laboratorium') selected @endif>Laboratorium</option>
                                                <option value="Posyandu"
                                                    {{ old('category') == 'Posyandu' ? 'selected' : '' }} @if ($tour->category === 'Posyandu') selected @endif>Posyandu</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="region">Kecamatan</label>
                                            <input id="region" type="text" name="region"
                                                value="{{ old('region', $tour->region) }}" list="regions"
                                                class="form-control mt-1" placeholder="Masukan Kecamatan" />
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
                                            <input type="text" name="price" id="price"
                                                value="{{ old('price', substr($tour->price, 4)) }}" class="form-control"
                                                placeholder="Masukan Biaya Registrasi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="description" class="form-control" id="description" rows="10"
                                            cols="20" required>{!! old('description', $tour->description) !!}</textarea>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="form-group col-6">
                                            <img src="{{ asset('images/' . $tour->image) }}" alt="sample" width="450"
                                                height="300" />
                                            <p class="text-info mt-5">Gambar sebelumnya</p>
                                        </div>
                                        <div class="form-group col-6">
                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    @for ($i = 0; $i < count($tour->panoramas); $i++)
                                                        <div class="carousel-item  @if ($i==0) {{ 'active' }} @endif">
                                                            <img src="{{ asset('images/' . $tour->panoramas[$i]->path) }}"
                                                                alt="sample" width="450" height="300" />
                                                            <div class="card-img-overlay d-flex">
                                                                <div class="mt-auto text-center w-100">
                                                                    <button type="button" data-placement="bottom"
                                                                        title="Hapus Panorama" class="btn btn-danger btn-sm"
                                                                        data-target="#hapus{{ $tour->panoramas[$i]->id }}"
                                                                        data-toggle="modal"><span class="icon-trash">
                                                                        </span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls"
                                                    role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <p class="text-info mt-5">Panorama sebelumnya</p>
                                        </div>

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
                                                accept="image/*" multiple="multiple">
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
                                                value="{{ old('longitude', $tour->longitude) }}" placeholder="Longitude">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="name">Latitude</label>
                                            <input type="text" id="lat" name="lat" class="form-control"
                                                value="{{ old('latitude', $tour->latitude) }}" placeholder="Latitude">
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
    @foreach ($tour->panoramas as $panorama)
        <!-- modal hapus -->
        <div class="modal fade" id="hapus{{ $panorama->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Panorama</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('panorama.destroy', $panorama) }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="cname">Hapus Panorama ini ?</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="submit" value="hapus" class="btn btn-danger">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- akhir modal hapus -->
    @endforeach
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
        var myMarker = L.marker([{{ $tour->latitude }}, {{ $tour->longitude }}], {
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
