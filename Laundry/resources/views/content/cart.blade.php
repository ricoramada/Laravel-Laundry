@extends('welcome')

@section('content')
@if ($message = Session::get('message'))
 <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<a class="btn btn-outline-success btn-lg" href="/formcart/cartbuy" style="margin-top: 1rem; margin-bottom: 1rem;">Kerajang Cucian</a>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Outlet</th>
      <th scope="col">Kode Invoice</th>
      <th scope="col">Member</th>
      <th scope="col">Nama Paket</th>
      <th scope="col">Jenis Paket</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Batas Waktu</th>
      <th scope="col">Tanggal Bayar</th>
      <th scope="col">Biaya Tambahan</th>
      <th scope="col">Diskon</th>
      <th scope="col">Pajak</th>
      <th scope="col">Status</th>
      <th scope="col">Dibayar</th>
      <th scope="col">Nama Kasir</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($data_transaksi as $k => $datas): ?>
    <tr>
      <th scope="row">{{ $k +1 }}</th>
      <td>{{ $datas->outlet->nama_outlet }}</td>
      <td>{{ $datas->kode_invoice }}</td>
      <td>{{ $datas->member->nama }}</td>
      <td>{{ $datas->paket->nama_paket }}</td>
      <td>{{ $datas->paket->jenis }}</td>
      <td>{{ $datas->tgl }}</td>
      <td>{{ $datas->batas_waktu }}</td>
      <td>{{ $datas->tgl_bayar }}</td>
      <td>{{ $datas->biaya_tambahan }}</td>
      <td>{{ $datas->diskon }}</td>
      <td>{{ $datas->pajak }}</td>
      <td>{{ $datas->status }}</td>
      <td>{{ $datas->dibayar }}</td>
      <td>{{ $datas->login->nama }}</td>
      <td>
        <?php if (Session('role') == 'admin'): ?>
        <a href="{{ url('formcart/edit/' . $datas->id ) }}"><button type="button" class="btn btn-primary">Edit</button></a>
        <?php endif; ?>
        <a href="{{ url('formcart/' . $datas->id . '/bayar') }}"><button type="button" class="btn btn-success">Bayar</button></a>
        <a href="{{ url('formcart/hapus/'. $datas->id) }}"><button type="button" class="btn btn-danger">Hapus</button></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
@endsection
