<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JabatanModel;
use Illuminate\Http\Request;;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MasterJabatanController extends Controller
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

        $data['data'] = JabatanModel::get();
        $data['tag'] = [];
        $data['kategori'] = [];
        foreach ($data['data'] as $key => $v) {
            if ($v->tags) {
                foreach ($v->tags as $t) {
                    if (!in_array($t, $data['tag'])) {
                        array_push($data['tag'], $t);
                    }
                }
            }
            if ($v->kategoris) {
                foreach ($v->kategoris as $k) {
                    if (!in_array($k, $data['kategori'])) {
                        array_push($data['kategori'], $k);
                    }
                }
            }
        }
        return view('admin.masterjabatan.index', $data);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $valid = Validator::make($request->all(), [
            'nama' => 'required',
           
          
        ]);
        if ($valid->fails()) {
            return Redirect::back()->withErrors($valid)->withInput($request->all())->with('error', 'Terjadi kesalahan validasi data');
        }
        $input = [
            'nama' => $request->nama,
           
            
        ];
      
      
        $i = JabatanModel::updateOrCreate(['id' => $request->txtId], $input);
        if ($i) {
            return Redirect::back()->with('success', 'Data Berhasil Disimpan');
        }
        return Redirect::back()->withInput($request->all())->with('error', 'Data Gagal Disimpan');
    }

      public function destroy($id)
        {
            $d = JabatanModel::find($id);
            if ($d) {
                $d->delete();
                return Redirect::back()->with('success', 'Data Berhasil Dihapus');
            }
            return Redirect::back()->with('error', 'Data Gagal Dihapus');
        }
}
