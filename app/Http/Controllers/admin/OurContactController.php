<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OurContactModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OurContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $x['data'] = OurContactModel::get();
        return view('admin.setting.website', $x);
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'category' => 'required',
            'type' => 'required',
            'title' => 'required',
            'url' => 'required',
            'icon' => 'required',
            'urutan' => 'required|integer',
        ]);
        if ($valid->fails()) {
            return Redirect::back()->withErrors($valid)->withInput($request->all())->with('error', 'Terjadi kesalahan validasi data');
        }

        $data = [
            'category' => $request->category,
            'type' => $request->type,
            'title' => $request->title,
            'url' => $request->url,
            'icon' => $request->icon,
            'urutan' => $request->urutan,
        ];

        $i = OurContactModel::updateOrCreate(['id' => $request->id], $data);
        if ($i) {
            return Redirect::back()->with('success', 'Data berhasil disimpan');
        }
        return Redirect::back()->with('error', 'Data gagal disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $d = OurContactModel::find($id);
        if ($d) {
            $d->delete();
            return Redirect::back()->with('success', 'Data berhasil dihapus');
        }
        return Redirect::back()->with('error', 'Data gagal dihapus');
    }
}
