<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GalleryController extends Controller
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

        $data['data'] = [];
        $data['kategori'] = GalleryModel::select('kategori')
            ->groupBy('kategori')
            ->pluck('kategori')
            ->toArray();
        foreach ($data['kategori'] as $key => $v) {
            $data['data'][$v] = GalleryModel::where('kategori', $v)
                ->get();
        }
        return view('admin.gallery.index', $data);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $valid = Validator::make($request->all(), [
            'kategori'       => 'required|string|max:255',
            'title.*'       => 'required|string|max:255',
            // 'image.*'       => 'required|file|mimes:jpg,jpeg,png|max:30000',
            // 'slug.*'        => 'nullable|string|max:255',
            // 'description.*' => 'required|string',
            'published_at.*' => 'required|date',
        ]);

        if ($valid->fails()) {
            return Redirect::back()->withErrors($valid)->withInput()->with('error', 'Terjadi kesalahan pada validasi data. Silakan periksa kembali inputan Anda.');
        }
        $error = [];
        foreach ($request->title as $index => $title) {
            $save = [
                'title' => $title,
                'slug' => Str::slug($title) . '-' . Str::random(5),
                'description' => $request->input("description.{$index}"),
                'status' => 1,
                'created_by' => Auth::user()->id,
                'published_at' => $request->input("published_at.{$index}"),
                'meta_title' => $title,
                'meta_description' => $request->input("description.{$index}"),
                'meta_opengraph_title' => $title,
                'meta_opengraph_description' => $request->input("description.{$index}"),
                'meta_twitter_card' => 'summary',
                'meta_twitter_title' => $title,
                'meta_twitter_description' => $request->input("description.{$index}"),
                'kategori' => $request->input("kategori"),
            ];

            if ($request->hasFile("image.{$index}")) {
                // validasi image
                $valimage = Validator::make($request->image, [
                    'image.*' . $index => 'required|mimes:jpg,jpeg,png|max:10240',
                ]);
                // validasi gagal
                if ($valimage->fails()) {
                    $error[] = "Gambar pada baris ke-" . ($index + 1) . " harus berformat JPG, JPEG, atau PNG dan maksimal berukuran 2MB.";
                }
                // proses upload
                $filedesktop = $request->file("image.{$index}")->store('gallery/' . $request->name . time());
                $save['meta_opengraph_image'] = $filedesktop;
                $save['meta_twitter_image'] = $filedesktop;
                $save['image'] = $filedesktop;
            }

            $i = GalleryModel::updateOrCreate([
                'id' => $request->input("id.{$index}"),
            ], $save);
            if (!$i) {
                $error[] = "Gagal menyimpan data pada baris ke-" . ($index + 1);
            }
        }
        if (!empty($error)) {
            return Redirect::back()->withInput()->with('error', implode(' ', $error));
        }
        return Redirect::back()->with('success', 'Gallery berhasil disimpan.');
    }

    public function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            $data = GalleryModel::find($id);
            if ($data) {
                $data->delete();
                return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
            }
            return back()->with('success', 'Data berhasil dihapus');
        }
        $data = GalleryModel::where('kategori', $id)->delete();
        if ($data) {
            return back()->with('success', 'Data berhasil dihapus');
        }
        return back()->with('error', 'Data gagal dihapus');
    }
}
