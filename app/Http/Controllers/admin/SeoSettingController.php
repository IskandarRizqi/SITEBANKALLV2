<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSettingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class SeoSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $r)
    {
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

        $x['data'] = SeoSettingModel::whereBetween('created_at', [$str, $end])->get();

        return view('admin.setting.seo', $x);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        if ($valid->fails()) {
            return Redirect::back()->withErrors($valid)->withInput($request->all())->with('error', 'Terjadi kesalahan validasi data');
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->has('image')) {
            $valimage = Validator::make($request->all(), [
                'image' => 'mimes:jpeg,jpg,png|max:2048',
            ]);
            if ($valimage->fails()) {
                return Redirect::back()->withErrors($valimage)->withInput($request->all())->with('error', 'File image harus berupa gambar dan maksimal 2MB');
            }
            $fileimage = $request->file('image')->store('seosetting/' . $request->file('image')->getClientOriginalName() . time());
            $data['image'] = $fileimage;
        }

        $i = SeoSettingModel::UpdateOrCreate(['id' => $request->id], $data);
        if ($i) {
            return Redirect::back()->with('success', 'Data berhasil disimpan');
        }
        return Redirect::back()->with('error', 'Data gagal disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $d = SeoSettingModel::find($id);
        if ($d) {
            $d->delete();
            return Redirect::back()->with('success', 'Data berhasil dihapus');
        }
        return Redirect::back()->with('error', 'Data tidak ditemukan');
    }
}
