@extends('welcome')

@section('content')
<a class="btn btn-outline-success btn-lg" href="/form_member" style="margin-bottom: 2rem;">Tambahkan Member</a>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Telepon</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($data as $k => $datas): ?>
    <tr>
      <th scope="row">{{ $k +1 }}</th>
      <td>{{ $datas->nama }}</td>
      <td>{{ $datas->alamat }}</td>
      <td>{{ $datas->jenis_kelamin }}</td>
      <td>{{ $datas->tlp }}</td>
      <td>
        <a href="{{ url('editmember/' . $datas->id . '/edit') }}"><button type="button" class="btn btn-primary">Edit</button></a>
        <a href="/hapus_member/{{ $datas->id }}"><button type="button" class="btn btn-danger">Hapus</button></a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
@endsection
