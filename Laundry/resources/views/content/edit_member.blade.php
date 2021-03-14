@extends('welcome')

@section('content')
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center">Tambah Member</h5>
          <form class="form-signin" action="{{ url('editmember/'. $data->id . '/update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-label-group">
              <input type="text" name="nama" id="inputPassword" class="form-control" placeholder="Nama Member" value="{{ $data->nama }}" required>
              <label for="inputPassword">Nama Member</label>
            </div>

            <div class="form-label-group">
              <input type="text" name="alamat" id="inputEmail" class="form-control" placeholder="Alamat" value="{{ $data->alamat }}" required>
              <label for="inputEmail">Alamat</label>
            </div>

            <div class="form-label-group">
              <input type="number" name="tlp" id="inputEmail" class="form-control" placeholder="Nomor Telepon" value="{{ $data->tlp }}" required>
              <label for="inputEmail">Nomor Telepon</label>
            </div>

            <div class="form-group">
                <label for="inputEmail">Jenis Kelamin</label>

                <?php if ($data->jenis_kelamin == 'Laki-Laki'): ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inputEmail" value="Laki-Laki" required checked>
                    <label for="jenis_kelamin">
                      Laki-Laki
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inputEmail" value="Perempuan" required>
                    <label for="jenis_kelamin">
                      Perempuan
                    </label>
                  </div>
                <?php else: ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inputEmail" value="Laki-Laki" required>
                    <label for="jenis_kelamin">
                      Laki-Laki
                    </label>
                  </div>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="inputEmail" value="Perempuan" required checked>
                  <label for="jenis_kelamin">
                      Perempuan
                  </label>
                </div>
              <?php endif; ?>

            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Submit</button>
            <hr class="md-2">
            <a class="btn btn-lg btn-success btn-block text-uppercase" href="/member"><i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
