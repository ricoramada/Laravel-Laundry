@extends('welcome')

@section('content')
<div class="card text-center" style="width: 80rem; float: none; margin: 0 auto;">
  <div class="card-body">
    <h5 class="card-title">Selamat Datang Di Website Laundry</h5>
    <p class="card-text">Selamat Bekerja {{ Session('nama') }} dan Sehat Selalu</p>
  </div>
</div>
@endsection
