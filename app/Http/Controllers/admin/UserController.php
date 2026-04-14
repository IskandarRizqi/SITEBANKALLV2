<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class UserController extends Controller
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

        $data['user'] = User::where('role', 0)
            ->where('email', '!=', 'root@root.root')
            ->get();
        return view('admin.user.index', $data);
    }

    public function store(Request $request)
    {
        // return $request;
        // validasi
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
        ];

        if (!$request->id) {
            $rules['password'] = 'required|min:5|confirmed';
        } else {
            $rules['password'] = 'nullable|min:5|confirmed';
        }

        $valid = Validator::make($request->all(), $rules);

        if ($valid->fails()) {
            return back()
                ->withErrors($valid)
                ->withInput()
                ->with('error', $valid->errors()->first());
        }

        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => 0,
        ];

        // penting: JANGAN Hash::make karena sudah auto hashed di model
        if ($request->filled('password')) {
            $input['password'] = $request->password;
        }

        if (!$request->id) {
            $input['uuid'] = Str::uuid();
        }

        User::updateOrCreate(
            ['id' => $request->id],
            $input
        );

        return back()->with('success', 'User berhasil disimpan');
    }

    public function destroy($i)
    {
        $d = User::find($i);
        if ($d) {
            $d->delete();
            return Redirect::back()->with('success', 'Data dihapus');
        }
        return Redirect::back()->with('error', 'Data tidak ditemukan');
    }
}