<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MasterPengajuanDepositoModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MasterPengajuanDepositoController extends Controller
{
     function index(Request $r)
    {
        $str = Carbon::now()->startOfMonth()->format('Y-m-d');
        if ($r->str) {
            $str = Carbon::parse($r->str)->format('Y-m-d');
        }
        $end = Carbon::now()->endOfMonth()->format('Y-m-d');
        if ($r->end) {
            $end = Carbon::parse($r->end)->format('Y-m-d');
        }
        $data['date_start'] = $str;
        $data['date_end'] = $end;
         $data['data'] = MasterPengajuanDepositoModel::get();

     
       
        return view('admin.masterpengajuan.produk_deposito', $data);
    }

      public function store(Request $request)
    {
        // return $request->all();
        $valid = Validator::make($request->all(), [
            'nama' => 'required',
            'tenor' => 'required',
            'bunga' => 'required',
          
        ]);
        if ($valid->fails()) {
            return Redirect::back()->withErrors($valid)->withInput($request->all())->with('error', 'Terjadi kesalahan validasi data');
        }
        $input = [
            'nama' => $request->nama,
            'tenor' => $request->tenor,
            'bunga' => str_replace(',', '.', $request->bunga),
        ];
        // upload image
        if ($request->file('image')) {
            // validasi image
            $valimage = Validator::make($request->all(), [
                'image' => 'mimes:jpg,jpeg,png|max:2048',
            ]);
            // validasi gagal
            if ($valimage->fails()) {
                return back()->with('error', 'Gambar Harus JPG, JPEG, PNG, Maksimal File 2MB')->withInput($request->all());
            }
            // proses upload
            $filedesktop = $request->file('image')->store('image/' . time());
            $input['image'] = $filedesktop;
        }
      
        $i = MasterPengajuanDepositoModel::updateOrCreate(['id' => $request->txtId], $input);
        if ($i) {
            return Redirect::back()->with('success', 'Data Berhasil Disimpan');
        }
        return Redirect::back()->withInput($request->all())->with('error', 'Data Gagal Disimpan');
    }

      public function destroy($id)
        {
            $d = MasterPengajuanDepositoModel::find($id);
            if ($d) {
                $d->delete();
                return Redirect::back()->with('success', 'Data Berhasil Dihapus');
            }
            return Redirect::back()->with('error', 'Data Gagal Dihapus');
        }
}
