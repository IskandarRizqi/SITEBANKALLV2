<?php

namespace App\Http\Controllers\admin;

use App\Helper\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Models\ProfileModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProfileController extends Controller
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

        $data['profile'] = ProfileModel::get();
        $data['tag'] = [];
        $data['kategori'] = [];
        foreach ($data['profile'] as $key => $v) {
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
        return view('admin.profile.index', $data);
    }

    function store(Request $r)
    {
        $val = Validator::make($r->all(), [
            'type' => 'required',
            'urutan' => 'required',
            'tag' => 'required',
            'kategori' => 'required',
            'title' => 'required',
            // 'content' => 'required',
        ]);
        if ($val->fails()) {
            return Redirect::back()->withErrors($val)->withInput($r->all())->with('error', 'Data tidak lengkap');
        }
        $insertdata = [
            'type' => $r->type,
            'urutan' => $r->urutan,
            'tag' => json_encode($r->tag),
            'kategori' => json_encode($r->kategori),
            'title' => $r->title,
            'slug' => Str::slug($r->title),
            'content' => $r->content,
            'updated_by' => Auth::user()->id,
        ];

        if (!$r->id) {
            $insertdata['created_by'] = Auth::user()->id;
        }

        if ($r->content) {
            $c = GlobalHelper::imagecheckbase64($r->content);
            if ($c == 1) {
                return response()->json(['success' => false, 'msg' => 'File selain gambar terdeteksi'], 400);
            }
            $insertdata['content'] = $r->content;
        }
        if ($r->hasFile('banner')) {
            $valbanner = Validator::make($r->all(), [
                'banner' => 'mimes:jpeg,jpg,png|max:2048',
            ]);
            if ($valbanner->fails()) {
                return Redirect::back()->withErrors($valbanner)->withInput($r->all())->with('error', 'File banner harus berupa gambar dan maksimal 2MB');
            }
            $filebanner = $r->file('banner')->store('profile/' . $r->file('banner')->getClientOriginalName() . time());
            $insertdata['banner'] = $filebanner;
        }
        if ($r->hasFile('thumbnail')) {
            $valthumbnail = Validator::make($r->all(), [
                'thumbnail' => 'mimes:jpeg,jpg,png|max:2048',
            ]);
            if ($valthumbnail->fails()) {
                return Redirect::back()->withErrors($valthumbnail)->withInput($r->all())->with('error', 'File thumbnail harus berupa gambar dan maksimal 2MB');
            }
            $filethumbnail = $r->file('thumbnail')->store('profile/' . $r->file('thumbnail')->getClientOriginalName() . time());
            $insertdata['thumbnail'] =  $filethumbnail;
        }

        $i = ProfileModel::UpdateOrCreate(['id' => $r->id], $insertdata);
        if (!$i) {
            return Redirect::back()->withInput($r->all())->with('error', 'Data gagal disimpan');
        }
        return Redirect::back()->withInput($r->all())->with('success', 'Data disimpan');
    }

    public function destroy($i)
    {
        $d = ProfileModel::find($i);
        if ($d) {
            $d->delete();
            return Redirect::back()->with('success', 'Data dihapus');
        }
        return Redirect::back()->with('error', 'Data tidak ditemukan');
    }
}
