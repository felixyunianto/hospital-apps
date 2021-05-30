@extends('templates.default')

@section('content')
<div class="template-demo">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom">
      <li class="breadcrumb-item"><a href="{{route('tour')}}">Pariwisata</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span></span></li>
    </ol>
  </nav>
</div>
@if(session()->has('success'))
<div class="row col-12 mt-3">
     <div class="alert alert-success" role="alert">
         <strong>{{ session()->get('success') }}</strong>
     </div>
   </div>
  @endif
<div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="float-right">
            <button type="button" onclick="window.location='{{route("tour.create")}}'" class="btn btn-primary">Tambah</button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="row portfolio-grid">
                @if($tours->isEmpty())

                @else
                @foreach($tours as $tour)
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                  <a href="{{route('tour.show', $tour)}}">
                  <figure class="effect-text-in">
                    <img src="{{asset('images/'.$tour->image)}}" alt="image" height="150rem"/>
                    <figcaption>
                      <h4>{{$tour->name}}</h4>
                      <p>{{$tour->category}}</p>
                    </figcaption>
                  </figure>
                    </a>
                  <div class="float-right">
                    <button type="button" onclick="window.location='{{route("tour.edit", $tour)}}'" class="btn btn-warning btn-sm"> <span class="icon-pencil"></span> </button>
                    <button type="button" class="btn btn-danger btn-sm" data-target="#hapus{{$tour->id}}" data-toggle="modal"> <span class="icon-trash"></span> </button>
                  </div>
                </div>
                <div class="modal fade" id="hapus{{$tour->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Hapus Wisata</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{route('tour.destroy', $tour)}}" method="post">
                        @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="cname">Apakah anda yakin akan menghapus wisata <b>{{$tour->title}}</b> ?</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" value="hapus" class="btn btn-danger">
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove();
  });
}, 5000);
  </script>
  <script>
  function isNumberKey(evt)
    {
       var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;

       return true;
    }
  </script>
@endsection
