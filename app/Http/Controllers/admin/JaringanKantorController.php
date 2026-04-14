<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JaringanKantorModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JaringanKantorController extends Controller
{
    function index(Request $r)
    {
        // $str = Carbon::now()->startOfMonth()->format('Y-m-d');
        // if ($r->str) {
        //     $str = Carbon::parse($r->str)->format('Y-m-d');
        // }
        // $end = Carbon::now()->endOfMonth()->format('Y-m-d');
        // if ($r->end) {
        //     $end = Carbon::parse($r->end)->format('Y-m-d');
        // }
        // $data['date_start'] = $str;
        // $data['date_end'] = $end;
        $data['data'] = JaringanKantorModel::get();
        return view('admin.jaringankantor.index', $data);
    }

    function store(Request $r)
    {
        $val = Validator::make($r->all(), [
            'kantor' => 'required',
            'latitude' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            // 'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($val->fails()) {
            return back()->with('error', $val->errors())->withInput();
        }

        // declare variabel
        $input = [
            'kantor' => $r->kantor,
            'no_telp' => $r->no_telp,
            'alamat' => $r->alamat,
            'latitude' => $r->latitude,
            'longitude' => $r->longitude,
            'updated_by' => Auth::user()->id,
        ];
        // bila data baru create dari user login
        if (!$r->id) {
            $input['created_by'] = Auth::user()->id;
        }
        // upload image
        if ($r->file('thumbnail')) {
            // validasi image
            $valimage = Validator::make($r->all(), [
                'thumbnail' => 'required|mimes:jpg,jpeg,png|max:2048',
            ]);
            // validasi gagal
            if ($valimage->fails()) {
                return back()->with('error', 'Gambar Harus JPG, JPEG, PNG')->withInput();
            }
            // proses upload
            $filedesktop = $r->file('thumbnail')->store('jaringan_kantor/' . $r->name . time());
            $input['thumbnail'] = $filedesktop;
        }
        // simpan data
        $i = JaringanKantorModel::updateOrCreate(['id' => $r->id], $input);
        if ($i) {
            return back()->with('success', 'Data berhasil disimpan');
        }
        // simpan gagal
        return back()->with('error', 'Data gagal disimpan');
    }

    public function destroy($id)
    {
        $data = JaringanKantorModel::find($id);
        if ($data) {
            $data->delete();
            return back()->with('success', 'Data berhasil dihapus');
        }
        return back()->with('error', 'Data gagal dihapus');
    }
}
