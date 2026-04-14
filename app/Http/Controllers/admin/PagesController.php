<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CommonPagesModel;
use App\Models\MultiBannerPagesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    function index(Request $r) {
        $str = Carbon::now()->startOfYear()->format('Y-m-d');
        if ($r->str) {
            $str = Carbon::parse($r->str)->format('Y-m-d');
        }
        $end = Carbon::now()->endOfYear()->format('Y-m-d');
        if ($r->end) {
            $end = Carbon::parse($r->end)->format('Y-m-d');
        }
        $data['date_start'] = $str;
        $data['date_end'] = $end;
        $data['kategori'] = CommonPagesModel::pluck('kategori')->toArray();
        $jsontags = CommonPagesModel::pluck('tag')->toArray();
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
        $data['pages'] = CommonPagesModel::where(function($q) use($str, $end) {
            $q->whereDate('created_at', '>=', $str)->whereDate('created_at', '<=', $end);
        })->orderBy('created_at', 'desc')->get();

        
        return view('admin.pages.index', $data);
    }

    function store(Request $r) {
        if (CommonPagesModel::withTrashed()->where('id', '!=', $r->id)->where('title', 'like', $r->title)->first()) {
            return response()->json([['Title Sudah Digunakan']], 401);
        }
        $slug = Str::slug($r->title);

        $insertdata = [
            'type' => $r->type,
            'urutan' => ($r->urutan)?$r->urutan:0,
            'tag' => ($r->tag)?json_encode(explode(',',$r->tag)):null,
            'kategori' => $r->kategori,
            'title' => $r->title,
            'slug' => $slug,
            'content' => $r->content,
            'tanggal_tampil' => $r->tanggal_tampil,
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

        CommonPagesModel::UpdateOrCreate(['id' => $r->id], $insertdata);
        
        return ['success' => true];
    }

    function show($id) {
        // MULTIBANNER
        return MultiBannerPagesModel::where('page_id', $id)->orderBy('urutan')->get();
    }

    function update(Request $r, $id) {
        // MULTIBANNER
        if ($r->deldat == 1) {
            $tbd = MultiBannerPagesModel::where('id', $id)->first();;
            MultiBannerPagesModel::where('id', $id)->delete();
            return MultiBannerPagesModel::where('page_id', $tbd->page_id)->orderBy('urutan')->get();
        }
        
        $insertdata = [
            'page_id' => $id,
            'urutan' => ($r->urutan)?$r->urutan:0,
        ];
        $banner = NULL;
        if ($r->file('filebanner')) {
            $validator = Validator::make($r->all(), [
                'filebanner' => 'image|mimes:jpeg,jpg,png,gif|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json([['Tipe File Harus Berupa Gambar dan Tidak Melebihi 2MB']], 401);
            }
            $banner = $r->file('filebanner')->store('pages/multibanner/' . $r->name . time());
            $insertdata['url'] = $banner;
        } else {
            return response()->json([['File harus diisi']], 401);
        }

        MultiBannerPagesModel::create($insertdata);

        return MultiBannerPagesModel::where('page_id', $id)->orderBy('urutan')->get();
    }

    function destroy($id) {
        $pgs = CommonPagesModel::where('id', $id)->first();
        if (!$pgs) {
            return response()->json([['Data tidak ditemukan']], 401);
        }

        $title = $pgs->title.' [del ' . $id . ']';
        $slug = Str::slug($title);
        CommonPagesModel::where('id', $id)->update([
            'title' => $title,
            'slug' => $slug,
        ]);
        CommonPagesModel::where('id', $id)->delete();

        return ['success' => true];
    }
}
