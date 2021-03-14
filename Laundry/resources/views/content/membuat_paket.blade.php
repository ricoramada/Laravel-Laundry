@extends('welcome')

@section('content')
<div class="row">
  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
    <div class="card card-signin my-5">
      <div class="card-body">

        @if ($message = Session::get('message'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
         @endif

        <h5 class="card-title text-center">Buat Paket</h5>
        <form class="form-signin" action="{{ url('/buatpaket/tambahpaket') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="inputEmail">Jenis Cucian</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis" id="inputEmail" value="Kiloan" required>
                <label for="jenis">
                  Kiloan
                </label>
              </div>

             <div class="form-check">
               <input class="form-check-input" type="radio" name="jenis" id="inputEmail" value="Selimut" required>
               <label for="jenis">
                 Selimut
               </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="jenis" id="inputEmail" value="Bed Cover" required>
              <label for="jenis">
                Bed Cover
              </label>
           </div>

           <div class="form-check">
             <input class="form-check-input" type="radio" name="jenis" id="inputEmail" value="Kaos" required>
             <label for="jenis">
               Kaos
             </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis" id="inputEmail" value="Lain" required>
            <label for="jenis">
              Lain
            </label>
         </div>
          </div>

          <div class="form-label-group">
            <input type="text" name="nama_paket" id="inputEmail" class="form-control" placeholder="Nama Paket" required>
            <label for="inputEmail">Nama Paket</label>
          </div>

          <div class="form-label-group">
            <input type="number" name="harga" id="inputEmail" class="form-control" placeholder="Harga" required>
            <label for="inputEmail">Harga</label>
          </div>

          <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Tambahkan</button>
          <hr class="md-2">
          <a class="btn btn-lg btn-success btn-block text-uppercase" href="{{ url('outlet/' . Session('id_outlet') ) }}"><i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
