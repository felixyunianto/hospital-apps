@extends('templates.default')

@section('content')
<div class="template-demo">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom">
      <li class="breadcrumb-item"><a href="{{route('tour')}}">Pariwisata</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span>Detail</span></li>
    </ol>
  </nav>
</div>
<div class="card mt-5">
    <img class="card-img-top" src="{{ asset('images/'.$tour->image) }}" width="985px" height="500px" alt="Card image cap">
      <div class="col-md-12">
      <div class="card-body">
        <div class="row">
          <div class="col-6">
              <div class="mb-3 mr-2">
                <h4 class="card-title">{{$tour->name}}</h4>
                <h6 class="card-text">{{$tour->category}}</h6>
                <h6 class="card-text">{{$tour->region}}, {{$tour->address}}</h6>
                <h6 class="card-text">{{$tour->price}}</h6>
            </div>
          </div>
        <div class="col-6">
          <div class="owl-carousel owl-theme full-width">
            @foreach($tour->panoramas as $panorama)
            <div class="item">
              <img src="{{asset('images/'.$panorama->path)}}" height="300px" alt="image"/>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <p class="card-description">{!!$tour->description!!}</p>
      <p class="card-text">{{$tour->created_at->diffForHumans()}}</p>
      <div class="mt-4">

          <div id="map4" class="vector-map demo-vector-map"></div>

      </div>
      <a style="text-decoration:none" href="{{route('tour')}}" class="btn btn-secondary mt-5">Kembali</a>
    </div>
  </div>
</div>

@endsection
