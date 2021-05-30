@extends('templates.default')

@section('content')
<div class="row">
		<div class="col-md-6 grid-margin">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title mb-0">Layanan Kesehatan</h4>
					<div class="d-flex justify-content-between align-items-center">
						<div class="d-inline-block pt-3">
							<div class="d-flex">
								<h2 class="mb-0">{{count($tours)}}</h2>
							</div>
						</div>
						<div class="d-inline-block">
							<div class="bg-info px-4 py-2 rounded">
								<i class="icon-location-pin text-white icon-lg"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 grid-margin">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title mb-0">Pengguna</h4>
					<div class="d-flex justify-content-between align-items-center">
						<div class="d-inline-block pt-3">
							<div class="d-flex">
								<h2 class="mb-0">{{count($users)}}</h2>
							</div>
						</div>
						<div class="d-inline-block">
							<div class="bg-warning px-4 py-2 rounded">
								<i class="icon-people text-white icon-lg"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  </div>
	<div id="map" class="dashboard-map" style=""></div>

	<script>
	var mymap = L.map('map').setView([-6.894006,109.377652], 13);
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	  maxZoom: 18,
	  id: 'mapbox.streets'
	}).addTo(mymap);
	var tour = L.layerGroup();
	@if(!$tours->isEmpty())
	@foreach($tours as $tour)
	L.marker([{{$tour->latitude}},{{$tour->longitude}}]).addTo(mymap)
	  .bindPopup("<a href='{{route("tour.show", $tour)}}'><b>{{$tour->name}}</b> </a><br/>{{$tour->category}}.").addTo(tour);
	@endforeach
	// mymap.on('click', onMapClick);
	@endif
	</script>
	<script type="text/javascript">
	setTimeout(function () { location.reload(1); }, 30000);
	</script>
@endsection
