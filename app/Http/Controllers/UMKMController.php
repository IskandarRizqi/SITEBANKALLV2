<?php

namespace App\Http\Controllers;

use App\Models\UMKMModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UMKMController extends Controller
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

        $data['umkm'] = UMKMModel::get();
        $data['layanan'] = [];
        foreach ($data['umkm'] as $key => $v) {
            if ($v->tags) {
                foreach ($v->tags as $t) {
                    if (!in_array($t, $data['layanan'])) {
                        array_push($data['layanan'], $t);
                    }
                }
            }
        }
        return view('admin.umkm.index', $data);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'title' => 'required',
            'gambar' => 'array|max:5',
            'gambar.*' => 'mimes:jpeg,jpg,png|max:2048',
            'thumbnail' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        $umkm = UMKMModel::find($request->id);
        $gambarPaths = [];

        // Jika update → ambil gambar lama
        // if ($umkm && $umkm->gambar) {
        //     $gambarPaths = json_decode($umkm->gambar, true) ?? [];
        // }

        if ($request->gambar_lama) {
            $gambarPaths = $request->gambar_lama;
        }

        if ($request->hasFile('gambar')) {

            foreach ($request->file('gambar') as $file) {


                if (count($gambarPaths) >= 5)
                    break;

                $path = $file->store(
                    'umkm/gambar/' . $file->getClientOriginalName() . time()
                );

                $gambarPaths[] = $path;
            }
        }
        $gambarPaths = array_slice($gambarPaths, 0, 5);

        $thumbnailPath = $umkm ? $umkm->thumbnail : null;

        if ($request->hasFile('thumbnail')) {

            $thumbnailPath = $request->file('thumbnail')
                ->store(
                    'umkm/thumbnail/' . $request->file('thumbnail')->getClientOriginalName() . time()
                );
        }


        // PROSES SOSMED JSON
        $sosmed = [];

        if ($umkm && $umkm->sosmed) {
            $sosmed = json_decode($umkm->sosmed, true) ?? [];
        }

        if ($request->hasFile('sosmed_icon')) {

            foreach ($request->file('sosmed_icon') as $i => $file) {

                $iconPath = null;

                if ($file) {
                    $iconPath = $file->store(
                        'umkm/sosmed/' . $file->getClientOriginalName() . time()
                    );
                }

                $sosmed[] = [
                    'icon' => $iconPath,
                    'nama' => $request->sosmed_nama[$i] ?? null,
                    'link' => $request->sosmed_link[$i] ?? null,
                ];
            }
        }

        $data = [
            'title' => $request->title,
            'lokasi' => $request->lokasi,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,

            'nilai_discount' => $request->nilai_discount,
            'rating' => $request->rating,
            'type_pilihan' => $request->type_pilihan,
            'layanan' => json_encode($request->layanan ?? []),
            'gambar' => json_encode($gambarPaths),
            'thumbnail' => $thumbnailPath,
            'deskripsi' => $request->deskripsi,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'website' => $request->website,
            'sosmed' => json_encode($sosmed),
        ];

        UMKMModel::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return redirect()->back()->with('success', 'Data UMKM berhasil disimpan');
    }



    public function destroy($i)
    {
        $d = UMKMModel::find($i);
        if ($d) {
            $d->delete();
            return Redirect::back()->with('success', 'Data dihapus');
        }
        return Redirect::back()->with('error', 'Data tidak ditemukan');
    }
}
