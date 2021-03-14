@extends('welcome')

@section('content')
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Outlet</th>
      <th scope="col">Nama Member</th>
      <th scope="col">Nama Paket</th>
      <th scope="col">Jenis Cucian</th>
      <th scope="col">Tanggal Hari Ini</th>
      <th scope="col">Tanggal Dibayar</th>
      <th scope="col">Alamat Member</th>
      <th scope="col">Nomer Telepon</th>
      <th scope="col">Harga Paket</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Nama Kasir</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($data_detail as $k => $datas): ?>
      <tr>
        <th scope="row">{{ $k +1 }}</th>
        <td>{{ $datas->outlet->nama_outlet }}</td>
        <td>{{ $datas->member->nama }}</td>
        <td>{{ $datas->paket->nama_paket }}</td>
        <td>{{ $datas->paket->jenis }}</td>
        <td>{{ $datas->tgl }}</td>
        <td>{{ $datas->tgl_bayar }}</td>
        <td>{{ $datas->member->alamat }}</td>
        <td>{{ $datas->member->tlp }}</td>
        <td>{{ $datas->paket->harga }}</td>
        <td>{{ $datas->diskon/100 * $datas->paket->harga + $datas->biaya_tambahan + $datas->pajak }}</td>
        <td>{{ $datas->login->nama }}</td>
        <td>{{ $datas->dibayar }}</td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="#"><button type="button" class="btn btn-success">Download Data</button></a>
@endsection
