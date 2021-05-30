@extends('templates.default')

@section('content')
<div class="template-demo">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom">
      <li class="breadcrumb-item"><a href="{{route('tour')}}">Komentar</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span></span></li>
    </ol>
  </nav>
</div>
<div class="card mt-4">
  <div class="card-body">
    <h4 class="card-title">Data table</h4>
    <div class="row">
      <div class="col-12">
        <table id="order-listing" class="table">
          <thead>
            <tr>
                <th>No</th>
                <th>Pengguna</th>
                <th>Komentar</th>
                <th>Tanggal/Waktu</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php($no =1)
            @foreach($comments as $comment)
            <tr>
                <td>{{$no}}</td>
                <td>{{$comment->user->name}}</td>
                <td>{{$comment->message}}</td>
                <td>{{ Carbon\Carbon::parse($comment->created_at)->formatLocalized('%A %d %B %Y') }}, Pukul {{ Carbon\Carbon::parse($comment->created_at)->formatLocalized('%H:%M') }}</td>
                <td></td>
            </tr>
            @php($no++)
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
