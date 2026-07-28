<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukLayananModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProdukLayananController extends Controller
{
    function index(Request $r)
    {
        $jsontags = ProdukLayananModel::pluck('tag')->toArray();
        $arraytags = [];
        foreach ($jsontags as $k => $v) {
            if ($v) {
                $at = json_decode($v);
                foreach ($at as $a) {
                    if (!in_array($a, $arraytags)) {
                        $arraytags[] = $a;
                    }
                }
            }
        }
        $data['tag'] = $arraytags;
        $data['prolay'] = ProdukLayananModel::get();

        return view('admin.produklayanan.index', $data);
    }

    function store(Request $r)
    {
        if (ProdukLayananModel::withTrashed()->where('id', '!=', $r->id)->where('title', 'like', $r->title)->first()) {
            return response()->json([['Title Sudah Digunakan']], 401);
        }
        $slug = Str::slug($r->title);

        $insertdata = [
            'type' => $r->type,
            'urutan' => ($r->urutan) ? $r->urutan : 0,
            'tag' => ($r->tag) ? json_encode(explode(',', $r->tag)) : null,
            'kategori' => $r->kategori,
            'title' => $r->title,
            'slug' => $slug,
            'content' => $r->content,
            'deskripsi' => $r->deskripsi,
        ];
        if ($r->id) {
            $insertdata['updated_by'] = Auth::user()->id;
        } else {
            $insertdata['created_by'] = Auth::user()->id;
        }

        $banner = NULL;
        if ($r->file('filebanner')) {
            $validator = Validator::make($r->all(), [
                'filebanner' => 'image|mimes:jpeg,jpg,png,gif|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json([['Tipe File Harus Berupa Gambar dan Tidak Melebihi 2MB']], 401);
            }
            $banner = $r->file('filebanner')->store('pages/banner/' . $r->name . time());
            $insertdata['banner'] = $banner;
        } else if (!$r->id) {
            return response()->json([['Banner harus diisi']], 401);
        }

        $thumbnail = NULL;
        if ($r->file('filethumbnail')) {
            $validator = Validator::make($r->all(), [
                'filethumbnail' => 'image|mimes:jpeg,jpg,png,gif|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json([['Tipe File Harus Berupa Gambar dan Tidak Melebihi 2MB']], 401);
            }
            $thumbnail = $r->file('filethumbnail')->store('pages/thumbnail/' . $r->name . time());
            $insertdata['thumbnail'] = $thumbnail;
        }

        $brosur = NULL;
        if ($r->file('filbrosur')) {
            $validator = Validator::make($r->all(), [
                'filbrosur' => 'required|mimes:pdf,doc,docx|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json([['Tipe File Harus Berupa Gambar dan Tidak Melebihi 2MB']], 401);
            }
            $brosur = $r->file('filbrosur')->store('pages/brosur/' . $r->name . time());
            $insertdata['brosur'] = $brosur;
        }

        $riplay = NULL;
        if ($r->file('filriplay')) {
            $validator = Validator::make($r->all(), [
                'filriplay' => 'required|mimes:pdf,doc,docx|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json([['Tipe File Harus Berupa Gambar dan Tidak Melebihi 2MB']], 401);
            }
            $riplay = $r->file('filriplay')->store('pages/brosur/' . $r->name . time());
            $insertdata['riplay'] = $riplay;
        }



        ProdukLayananModel::UpdateOrCreate(['id' => $r->id], $insertdata);

        return ['success' => true];
    }

    function destroy($id)
    {
        $pgs = ProdukLayananModel::where('id', $id)->first();
        if (!$pgs) {
            return response()->json([['Data tidak ditemukan']], 401);
        }

        $title = $pgs->title . ' [del ' . $id . ']';
        $slug = Str::slug($title);
        ProdukLayananModel::where('id', $id)->update([
            'title' => $title,
            'slug' => $slug,
        ]);
        ProdukLayananModel::where('id', $id)->delete();

        return ['success' => true];
    }
}
