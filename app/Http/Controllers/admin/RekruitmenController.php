<?php

namespace App\Http\Controllers\admin;

use App\Helper\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Models\RekruitmenModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RekruitmenController extends Controller
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

        $data['rekruitmen'] = RekruitmenModel::where(function ($q) use ($str, $end) {
            $q->whereDate('created_at', '>=', $str)->whereDate('created_at', '<=', $end);
        })->get();



        return view('admin.rekruitmen.index', $data);
    }

    function lamaran(Request $r)
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

        return view('admin.rekruitmen.datalamaran', $data);
    }

    function store(Request $r)
    {
        // return $r->all();
        $val = Validator::make($r->all(), [
            'judul' => 'required',
            'tipe_pekerjaan' => 'required',
            'gaji_min' => 'required',
            'gaji_max' => 'required',
            'lokasi' => 'required',
            'tanggal_posting' => 'required',
            'tanggal_berakhir' => 'required',
            'deskripsi' => 'required',
            // 'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($val->fails()) {
            return response()->json(['errors' => $val->errors(), 'msg' => 'Data inputan tidak sesuai'], 422);
        }
        // declare variabel
        $insertdata = [
            'judul' => $r->judul,
            'tipe_pekerjaan' => $r->tipe_pekerjaan,
            'gaji_min' => $r->gaji_min,
            'gaji_max' => $r->gaji_max,
            'lokasi' => $r->lokasi,
            'tanggal_posting' => $r->tanggal_posting,
            'tanggal_berakhir' => $r->tanggal_berakhir,
            // 'deskripsi' => $r->deskripsi,
            'kualifikasi' => 0,
            'status' => 0,
        ];

        if ($r->deskripsi) {
            // validasi gambar wysiwyg
            $error = GlobalHelper::imagecheckbase64($r->deskripsi);

            if ($error == 1) {
                return response()->json(['success' => false, 'msg' => 'File selain gambar terdeteksi'], 400);
            }
            $insertdata['deskripsi'] = $r->deskripsi;
        }

        if ($r->file('gambar')) {
            // validasi image
            $valimage = Validator::make($r->all(), [
                'gambar' => 'required|mimes:jpg,jpeg,png|max:2048',
            ]);
            if ($valimage->fails()) {
                return response()->json(['errors' => $valimage->errors()], 422);
            }
            // proses upload
            $filegambar = $r->file('gambar')->store('rekruitmen/' . $r->file('gambar')->getClientOriginalName() . time());
            $insertdata['gambar'] = $filegambar;
        }
        $r = RekruitmenModel::UpdateOrCreate(['id' => $r->id], $insertdata);
        if (!$r) {
            return response()->json(['success' => false, 'msg' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.'], 500);
        }
        return response()->json(['success' => true, 'msg' => 'Simpan data berhasil'], 200);
    }

    function destroy($id)
    {

        RekruitmenModel::where('id', $id)->delete();

        return Redirect::back()->with('success', 'Data Berhasil di Hapus');
    }
}
