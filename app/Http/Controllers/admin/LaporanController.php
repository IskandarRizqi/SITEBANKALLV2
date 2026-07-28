<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
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

        // tampilkan semua data
        $data['data'] = LaporanModel::get();

        return view('admin.laporan.index', $data);
    }


    // public function store(Request $request)
    // {
    //     // return $request->all();
    //     $valid = Validator::make($request->all(), [
    //         'type' => 'required',
    //         'tanggal' => 'required|date',
    //         'title' => 'required|string|max:255',
    //     ]);
    //     if ($valid->fails()) {
    //         return Redirect::back()->withErrors($valid)->withInput($request->all())->with('error', 'Terjadi kesalahan validasi data');
    //     }
    //     $input = [
    //         'type' => $request->type,
    //         'tanggal' => $request->tanggal,
    //         'title' => $request->title,
    //     ];
    //     // upload image
    //     if ($request->file('thumbnail')) {
    //         // validasi image
    //         $valimage = Validator::make($request->all(), [
    //             'thumbnail' => 'mimes:jpg,jpeg,png|max:2048',
    //         ]);
    //         // validasi gagal
    //         if ($valimage->fails()) {
    //             return back()->with('error', 'Gambar Harus JPG, JPEG, PNG, Maksimal File 2MB')->withInput($request->all());
    //         }
    //         // proses upload
    //         $filedesktop = $request->file('thumbnail')->store('laporan/' . time());
    //         $input['thumbnail'] = $filedesktop;
    //     }
    //     // upload image
    //     if ($request->file('pdf')) {
    //         // validasi image
    //         $valpdf = Validator::make($request->all(), [
    //             'pdf' => 'mimes:pdf|max:2048',
    //         ]);
    //         // validasi gagal
    //         if ($valpdf->fails()) {
    //             return back()->with('error', 'Gambar Harus JPG, JPEG, PNG, Maksimal File 2MB')->withInput($request->all());
    //         }
    //         // proses upload
    //         $filedesktop = $request->file('pdf')->store('laporan/' . time());
    //         $input['url'] = $filedesktop;
    //     }

    //     $i = LaporanModel::updateOrCreate(['id' => $request->id], $input);
    //     if ($i) {
    //         return Redirect::back()->with('success', 'Data Berhasil Disimpan');
    //     }
    //     return Redirect::back()->withInput($request->all())->with('error', 'Data Gagal Disimpan');
    // }
    public function store(Request $request)
    {
        // Validasi dasar
        $valid = Validator::make($request->all(), [
            'type' => 'required',
            'tanggal' => 'required|date',
            'title' => 'required|string|max:255',
        ]);
        if ($valid->fails()) {
            return Redirect::back()
                ->withErrors($valid)
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan validasi data');
        }

        $input = [
            'type' => $request->type,
            'tanggal' => $request->tanggal,
            'title' => $request->title,
        ];

        // ── Upload Thumbnail ────────────────────────────────────────────
        if ($request->file('thumbnail')) {
            $valimage = Validator::make($request->all(), [
                'thumbnail' => 'mimes:jpg,jpeg,png|max:10000',
            ]);
            if ($valimage->fails()) {
                return back()
                    ->with('error', 'Thumbnail harus JPG, JPEG, PNG, maksimal 10MB')
                    ->withInput($request->all());
            }
            $input['thumbnail'] = $request->file('thumbnail')->store('laporan/' . time());
        }

        // ── Laporan Publikasi: cek mode Pisah / Gabung ───────────────────
        $isPublikasi = ($request->type == '0');
        $modePisah = ($isPublikasi && $request->publikasi_mode === 'pisah');

        if ($modePisah) {
            // ── Mode PISAH: 5 file PDF → urls_json ──────────────────────
            $pdfKeys = ['keuangan', 'laba_rugi', 'aset', 'komitmen', 'lainnya'];
            $urlsJson = [];

            // Ambil nilai lama jika ada (supaya file lama tidak hilang bila tidak diupload ulang)
            if ($request->id) {
                $existing = LaporanModel::find($request->id);
                if ($existing && $existing->urls_json) {
                    $urlsJson = $existing->urls_json;
                }
            }

            foreach ($pdfKeys as $key) {
                $fieldName = 'pdf_' . $key;
                if ($request->file($fieldName)) {
                    $valPdf = Validator::make(
                        [$fieldName => $request->file($fieldName)],
                        [$fieldName => 'mimes:pdf|max:2048']
                    );
                    if ($valPdf->fails()) {
                        return back()
                            ->with('error', "File PDF {$key} harus berformat PDF, maksimal 2MB")
                            ->withInput($request->all());
                    }
                    $urlsJson[$key] = $request->file($fieldName)->store('laporan/' . time());
                }
            }

            $input['urls_json'] = $urlsJson;
            // Kosongkan url tunggal supaya tidak ambigu
            $input['url'] = '';

        } else {
            // ── Mode GABUNG: 1 file PDF → url ───────────────────────────
            if ($request->file('pdf')) {
                $valpdf = Validator::make($request->all(), [
                    'pdf' => 'mimes:pdf|max:2048',
                ]);
                if ($valpdf->fails()) {
                    return back()
                        ->with('error', 'File PDF harus berformat PDF, maksimal 2MB')
                        ->withInput($request->all());
                }
                $input['url'] = $request->file('pdf')->store('laporan/' . time());
            }
            // Kosongkan urls_json supaya tidak ambigu
            $input['urls_json'] = null;
        }

        // ── Simpan ───────────────────────────────────────────────────────
        $i = LaporanModel::updateOrCreate(['id' => $request->id], $input);
        if ($i) {
            return Redirect::back()->with('success', 'Data Berhasil Disimpan');
        }
        return Redirect::back()->withInput($request->all())->with('error', 'Data Gagal Disimpan');
    }
    public function destroy($id)
    {
        $d = LaporanModel::find($id);
        if ($d) {
            $d->delete();
            return Redirect::back()->with('success', 'Data Berhasil Dihapus');
        }
        return Redirect::back()->with('error', 'Data Gagal Dihapus');
    }


}
