@extends('templates.default')

@section('content')
<div class="template-demo">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom">
      <li class="breadcrumb-item"><a href="{{route('tour')}}">Pengguna</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span></span></li>
    </ol>
  </nav>
</div>

<div class="card mt-4">
  <div class="card-body">
    <h4 class="card-title">Data Pengguna</h4>
    <div class="row">
      <div class="col-12">
        <table id="order-listing" class="table">
          <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Terdaftar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php($no =1)
            @foreach($users as $user)
            <tr>
                <td>{{$no}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td></td>
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
