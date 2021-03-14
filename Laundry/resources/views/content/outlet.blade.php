@extends('welcome')

@section('content')
<div class="card text-center">
  <div class="card-body">
    <h5 class="card-title">Selamat Datang Di {{ $data_outlet->nama_outlet }}</h5>
    <p class="card-text">Selamat Bekerja {{ Session('nama') }} dan Sehat Selalu</p>
  </div>
</div>

  <?php if (Session('role') == 'admin'): ?>
    <a class="btn btn-outline-success btn-lg" href="/buatpaket" style="margin-top: 1rem; margin-bottom: 1rem;">Paket Cucian</a>
  <?php endif; ?>
  <div class="row">
    <?php foreach ($data_paket as $k): ?>
    <div class="card text-center col-md-2 col-sm-6 col-12" style="margin: 1rem; float: left;">
      <div class="card-body">
        <h5 class="card-title">{{ $k->nama_paket }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">RP {{ $k->harga }}</h6>
        <p class="card-text">Jenis {{ $k->jenis }}</p>
        <?php if (Session('role') == 'admin'): ?>
          <a href="{{ url('hapuspaket/' . $k->id ) }}" class="btn btn-danger">Delete Paket</a>
        <?php endif; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
@endsection
