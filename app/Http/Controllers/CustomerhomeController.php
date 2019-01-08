<?php

namespace App\Http\Controllers;

use App\User;
use App\Customer;
use App\Kemeja;
use App\Keranjang;
use App\Transaksi;
use App\Testimoni;
use Redirect;
use Illuminate\Http\Request;

class CustomerhomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        return view('frontend.home');
    }

    public function home()
    {
        return view('frontend.home');
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function bs()
    {
        return view('frontend.bestseller');
    }
    public function np()
    {
        return view('frontend.newproduct');
    }
    public function ap()
    {
        return view('frontend.allproduct');
    }
    public function profil()
    {
        return view('frontend.profil');
    }
    public function pesan()
    {
        return view('frontend.pesan');
    }
    
    public function testimoni()
    {
        $testimoni['testimoni'] = Testimoni::all();
        return view('frontend.testimoni', $testimoni);
    }

    public function cart($id)
    {
        $customer = Customer::find($id);
        $keranjang['keranjang'] = $customer->keranjang;
        if (!$keranjang['keranjang']->isEmpty()) {
            $customer = Customer::find($id);
            $keranjang['keranjang'] = $customer->keranjang->where('status', '0');
            return view('frontend.cart', $keranjang);
        }else{
            $customer = Customer::find($id);
            $keranjang['keranjang'] = $customer->keranjang->where('status', '1');
            return view('frontend.cart', $keranjang);
        }
        
    }

    public function cartdestroy($id)
    {
        $keranjang = Keranjang::find($id);
        $kemeja = Kemeja::find($keranjang->kemeja_id);
        $uk = $keranjang->uk;
  
        if ($uk == 'S') {
            $jml_akhir = $kemeja->uk_s + $keranjang->qty;
            $kemeja->uk_s = $jml_akhir;
        }elseif ($uk == 'M') {
            $jml_akhir = $kemeja->uk_m + $keranjang->qty;
            $kemeja->uk_m = $jml_akhir;
        }elseif ($uk == 'L') {
            $jml_akhir = $kemeja->uk_l + $keranjang->qty;
            $kemeja->uk_l = $jml_akhir;
        }elseif ($uk == 'XL') {
            $jml_akhir = $kemeja->uk_xl + $keranjang->qty;
            $kemeja->uk_xl = $jml_akhir;
        }

        $kemeja->update();
        $keranjang->delete();

        $customer_id = $keranjang->customer_id;
        $customer = Customer::find($customer_id);
        $keranjang['keranjang'] = $customer->keranjang;
        return view('frontend.cart', $keranjang);
    }

    public function profilshow($id)
    {
        $customer['customer'] = Customer::find($id);
        return view('frontend.profil', $customer);
    }

    public function profiledit($id)
    {
        $customer['customer'] = Customer::find($id);
        return view('frontend.profiledit', $customer);
    }

    public function profilupdate(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telp' => 'required|string',
            'jk' => 'required|integer|max:2',
            'alamat' => 'required',
            'kodepos' => 'required|integer'
            ]);
        $data = $request->all();
        $customer = Customer::find($id);
        $customer->update([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'telp' => $data['telp'],
            'jk' => $data['jk'],
            'alamat' => $data['alamat'],
            'kodepos' => $data['kodepos'],
        ]);
        return Redirect('home/profil/'.$id)->with('message', 'Profil Kamu Sudah Diperbarui');
    }

    public function show($id)
    {
        $kemeja['kemeja'] = Kemeja::find($id);
        return view('frontend.detailproduct', $kemeja);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'customer_id'=>'required',
            'nama_kemeja'=>'required',
            'harga'=>'required',
            'uk'=>'required',
            'jumlah'=>'required',
            'status'=>'required'
            ]);

        $harga = $request->harga;
        $uk = $request->uk;
        $jumlah = $request->jumlah;
        $total = $harga * $jumlah;

        $keranjang = new Keranjang();
        $keranjang->customer_id = $request->customer_id;
        $keranjang->kemeja_id = $request->kemeja_id;
        $keranjang->nama_kemeja = $request->nama_kemeja;
        $keranjang->uk = $uk;
        $keranjang->harga = $harga;
        $keranjang->qty = $jumlah;
        $keranjang->total_harga = $total;
        $keranjang->status = $request->status;
        $keranjang->save();

        $kemeja = Kemeja::find($request->kemeja_id);
        if ($uk == 'S') {
            $jml_akhir = $kemeja->uk_s - $jumlah;
            $kemeja->uk_s = $jml_akhir;
        }elseif ($uk == 'M') {
            $jml_akhir = $kemeja->uk_m - $jumlah;
            $kemeja->uk_m = $jml_akhir;
        }elseif ($uk == 'L') {
            $jml_akhir = $kemeja->uk_l - $jumlah;
            $kemeja->uk_l = $jml_akhir;
        }elseif ($uk == 'XL') {
            $jml_akhir = $kemeja->uk_xl - $jumlah;
            $kemeja->uk_xl = $jml_akhir;
        }

        $kemeja->update();
        
        return Redirect('home/'.$request->customer_id.'/cart');
    }

    public function checkout($id)
    {
        $customer = Customer::find($id);
        $keranjang['customer'] = $customer;
        $keranjang['keranjang'] = $customer->keranjang->where('status', '0');

        return view('frontend.checkout', $keranjang);
    }

    public function bayar($id)
    {
        $transaksi['customer'] = Customer::find($id);
        $transaksi['transaksi'] = Transaksi::where('customer_id', $id)->where('status', 0)->get();
        // return $transaksi;
        // return view('frontend.bayar', $transaksi);

        if (!$transaksi['transaksi']->isEmpty()) {
            $customer = Customer::find($id);
            $transaksi['transaksi'] = $customer->transaksi->where('status', 0);
            // return $transaksi;
            return view('frontend.bayar', $transaksi);
        }else{
            $customer = Customer::find($id);
            $transaksi['transaksi'] = $customer->transaksi;
            // return $transaksi;
            return view('frontend.bayar', $transaksi);
        }  
    }

    public function bayarstore(Request $request)
    {
        $this->validate($request,[
            'customer_id'=>'required',
            'noresi'=>'required',
            'kodeunik'=>'required',
            'total_bayar'=>'required',
            'status'=>'required'
            ]);

        $transaksi = new Transaksi();
        $transaksi->customer_id = $request->customer_id;
        $transaksi->noresi = $request->noresi;
        $transaksi->kodeunik = $request->kodeunik;
        $transaksi->total_bayar = $request->total_bayar;
        $transaksi->status = $request->status;
        $transaksi->save();
        
        $keranjang['keranjang'] = Keranjang::where('customer_id', $request->customer_id)->where('status', 0)->get();

        for ($i=0; $i < count($keranjang['keranjang']); $i++) { 
            $cart = Keranjang::find($keranjang['keranjang'][$i]['id']);
            $cart->status = '1';
            $cart->kodeunik = $request->kodeunik;
            $cart->update();
        }

        return Redirect('home/'.$request->customer_id.'/bayar');
    }

    public function trx($id)
    {
        $customer = Customer::find($id);
        $transaksi['transaksi'] = $customer->transaksi;

        // return $transaksi;
        return view('frontend.trx', $transaksi);
    }

    public function changestatus($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->status = $transaksi->status+1;
        $transaksi->update(); 
        
        return Redirect('home/'.$transaksi->customer_id.'/trx');
    }

    public function detailtrx($id)
    {
        $transaksi['transaksi'] = Transaksi::find($id);
        $transaksi['customer'] = Customer::find($transaksi['transaksi']['customer_id']);
        $transaksi['keranjang'] = Keranjang::where('customer_id', $transaksi['transaksi']['customer_id'])->where('kodeunik', $transaksi['transaksi']['kodeunik'])->get();

        return view('frontend.detailtrx', $transaksi);
    }

}