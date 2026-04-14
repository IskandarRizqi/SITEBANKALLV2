<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
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
        $jsontags = BannerModel::pluck('tag')->toArray();
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
        $data['banner'] = BannerModel::where(function($q) use($str, $end) {
            $q->whereDate('tampil_start', '>=', $str)->whereDate('tampil_start', '<=', $end);
        })->orWhere(function($q) use($str, $end) {
            $q->whereDate('tampil_end', '>=', $str)->whereDate('tampil_end', '<=', $end);
        })->orWhere(function($q) use($str, $end) {
            $q->whereDate('tampil_start', '>=', $str)->whereDate('tampil_end', '<=', $str);
        })->orWhere(function($q) use($str, $end) {
            $q->whereDate('tampil_start', '>=', $str)->whereDate('tampil_end', '<=', $str);
        })->orWhere(function($q) use($str, $end) {
            $q->whereDate('tampil_start', '>=', $end)->whereDate('tampil_end', '<=', $end);
        })->orderBy('created_at', 'desc')->get();

        // return $data;

        return view('admin.banner.index', $data);
    }

    function store(Request $r) {
        $insertdata = [
            'type' => $r->type,
            'tampil' => 1,
            'tampil_start' => $r->datestart,
            'tampil_end' => $r->dateend,
            'tag' => ($r->tags)?json_encode(explode(',',$r->tags)):null,
            'name' => $r->nama,
        ];
        if ($r->id) {
            $insertdata['updated_by'] = Auth::user()->id;
        } else {
            $insertdata['created_by'] = Auth::user()->id;
        }

        $filedesktop = NULL;
        if ($r->file('filedesktop')) {
            $validator = Validator::make($r->all(), [
                'filedesktop' => 'image|mimes:jpeg,jpg,png,gif|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json([['Tipe File Harus Berupa Gambar dan Tidak Melebihi 2MB']], 401);
            }
            $filedesktop = $r->file('filedesktop')->store('bannerdesktop/' . $r->name . time());
            $insertdata['url'] = $filedesktop;
        } else if (!$r->id) {
            return response()->json([['Banner Desktop harus diisi']], 401);
        }
        
        $filemobile = NULL;
        if ($r->file('filemobile')) {
            $validator = Validator::make($r->all(), [
                'filemobile' => 'image|mimes:jpeg,jpg,png,gif|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json([['Tipe File Harus Berupa Gambar dan Tidak Melebihi 2MB']], 401);
            }
            $filemobile = $r->file('filemobile')->store('bannermobile/' . $r->name . time());
            $insertdata['url_mobile'] = $filemobile;
        }

        BannerModel::updateOrCreate([
            'id' => $r->id
        ], $insertdata);

        return ['success' => true];
    }

    function destroy($id) {
        BannerModel::where('id', $id)->delete();
        
        return ['success' => true];
    }


}
