<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model_member;
use App\model_outlet;
use App\model_detail_transaksi;
use App\model_paket;
use App\model_transaksi;
use App\model_login;

class Page extends Controller
{
  // Welcome
  public function welcome()
  {
    $id = Session()->get('id');
    $data_outlet = model_login::where('id_outlet', $id)->get();
    if (Session('login_status')) {
      return view('content.Awalan',compact('data_outlet'));
    }else {
      return redirect('login');
    }
  }
  // Batas=======================================================================
  // Member
  public function member()
  {
    $data = model_member::all();
    if (Session('login_status')) {
      return view('content.Member',compact('data'));
    } else {
      return redirect('login');
    }
  }
  // Tambah Member
  public function form_member()
  {
    if ('login_status') {
      return view('content.tambah_member');
    } else {
      return redirect('login');
    }
  }
  public function TambahMember(Request $req)
  {
    try {
      $data = [
        'nama' => $req->nama,
        'alamat' => $req->alamat,
        'jenis_kelamin' => $req->jenis_kelamin,
        'tlp' => $req->tlp
      ];
      model_member::create($data);
      if ($data > 0) {
        return redirect('/member')->with('message', 'Menambahkan member telah berhasil!!');
      } else {
        return redirect('/member')->with('message', 'Menambahkan member tidak berhasil!!');
      }
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }
  // Hapus Member
  public function hapusmember($id)
  {
    $data = model_member::find($id);
    try {
      $data->delete();
      return back();
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }
  // Update Member
  public function Edit_member($id)
  {
    $data = model_member::findOrFail($id);
    return view('content.edit_member', compact('data'));
  }
  public function update_member($id, Request $req)
  {
    $data = model_member::findOrFail($id);
    $data->nama = $req->nama;
    $data->alamat = $req->alamat;
    $data->jenis_kelamin = $req->jenis_kelamin;
    $data->tlp = $req->tlp;
    $data->save();
    return redirect('/member')->with('message','Success Edit!!');
  }

  // Batas=========================================================================================

  //Outlet 1
  public function outlet($id)
  {
    $data_outlet = model_outlet::findOrFail($id);
    $data_paket = model_paket::where('id_outlet', $id)->get();
    if (Session('login_status')) {
      return view('content.outlet',compact('data_outlet','data_paket'));
    }else {
      return redirect('login');
    }
  }
  public function tampil_membuat_outlet()
  {
    if (Session('login_status')) {
      return view('content.membuat_paket');
    }
  }
  // Membuat Paket Outlet
  public function membuat_paket(Request $req)
  {
    try {
      $id = Session()->get('id');
      $model_outlet = model_outlet::findOrFail($id);
      $data = [
        'id_outlet' => $model_outlet->id,
        'jenis' => $req->jenis,
        'nama_paket' => $req->nama_paket,
        'harga' => $req->harga
      ];
      model_paket::create($data);
      return back()->with('message','Berhasil Membuat Paket!!');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }
  // Menghapus Outlet Paket
  public function hapus_paket($id)
  {
    $data = model_paket::findOrFail($id);
    try {
      $data->delete();
      return redirect('outlet/' . Session('id_outlet'))->with('message', 'Success Mengahapus Paket');
    } catch (\Exception $e) {
      return $e->getMessage();
    }

  }
  // Outlet 2
  public function outlet2()
  {
    if (Session('login_status')) {
      return view('content.outlet2');
    }else {
      return redirect('login');
    }
  }
  // Membuat Outlet
  public function tampil_outlet()
  {
    if (Session('login_status')) {
      return view('content.membuat_outlet');
    } else {
      return redirect('login');
    }
  }
  // Tambah outlet
  public function buat_outlet(Request $req)
  {
    $id = Session()->get('id');
    $data_id_outlet = model_login::findOrFail($id);
    $data_id_outlet->id_outlet = $id;
    $data = [
      'nama_outlet' => $req->nama_outlet,
      'alamat' => $req->alamat,
      'tlp' => $req->tlp
    ];
    model_outlet::create($data);
    $data_id_outlet->save();
    return redirect('/')->with('message','Success!!');
  }

  // Batas=========================================================================================

  // Form Cart
  public function form_cart()
  {
      $data_transaksi = model_transaksi::all();
      if (Session('login_status')) {
        return view('content.cart',compact('data_transaksi'));
      } else {
        return redirect('login');
      }
  }
  // Tampil Cart
  public function cart()
  {
    $data_member = model_member::where('id', '>', 0)->get();
    $data_paket = model_paket::where('id', '>', 0)->get();
    if (Session('login_status')) {
      return view('content.cart_buy',compact('data_member', 'data_paket'));
    } else {
      return redirect('login');
    }
  }
  // Masukan Keranjang Cucian
  public function cartbuy(Request $req)
  {
    $id = Session()->get('id');
    $data_belum_dibayar = 'belum_dibayar';
    $num_rand = mt_rand(100000, 999999);
    try {
      $data = [
        'id_outlet' => Session('id_outlet'),
        'id_paket' => $req->id_paket,
        'kode_invoice' => $num_rand,
        'id_member' => $req->id_member,
        'tgl' => $req->tgl,
        'batas_waktu' => $req->batas_waktu,
        'tgl_bayar' => $req->tgl_bayar,
        'biaya_tambahan' => $req->biaya_tambahan,
        'diskon' => $req->diskon,
        'pajak' => $req->pajak,
        'status' => $req->status,
        'dibayar' => $data_belum_dibayar,
        'id_user' => $id
      ];
      model_transaksi::create($data);
      return redirect('/formcart')->with('message','Berhasil ditambahkan ke Keranjang Cucian');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }
  // Hapus Cart
  public function hapus_cart($id)
  {
    $data = model_transaksi::findOrFail($id);
    try {
      $data->delete();
      return redirect('/formcart')->with('message','Berhasil dihapus!!');
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }
  // Edit Cart
  public function formEditCart($id)
  {
    $data_transaksi = model_transaksi::findOrFail($id);
    $data = model_transaksi::all();
    return view('content.edit_cart',compact('data_transaksi','data'));
  }
  public function update_edit_cart($id, Request $req)
  {
    $data = model_transaksi::findOrFail($id);
    $data->tgl = $req->tgl;
    $data->batas_waktu = $req->batas_waktu;
    $data->tgl_bayar = $req->tgl_bayar;
    $data->biaya_tambahan = $req->biaya_tambahan;
    $data->diskon = $req->diskon;
    $data->pajak = $req->pajak;
    $data->status = $req->status;
    $data->save();
    return redirect('/formcart')->with('message', 'Edit cart berhasil!!');
  }
  public function update_bayar($id, Request $req)
  {
    $data = model_transaksi::findOrFail($id);
    $data->dibayar = 'dibayar';
    $data->save();
    return redirect('/formcart')->with('message', 'Telah Dibayar');
  }

  // Batas=========================================================================================

  // Informasi Transaksi
  public function infoTransaksi()
  {
    $data_detail = model_transaksi::all();
    if ('login_status') {
      return view('content.info_transaksi',compact('data_detail'));
    } else {
      return redirect('login');
    }
  }

}
