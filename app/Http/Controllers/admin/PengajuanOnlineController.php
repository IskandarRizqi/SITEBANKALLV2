<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PengajuanOnlineController extends Controller
{
    function showkredit(Request $r)
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

          $data['kredit'] = PengajuanModel::select(
            'pengajuan_online.*',
            'mpk.nama as nama_kredit',
            'mpk.tenor',
            'mpk.bunga'
        )
        ->leftJoin(
            'master_pengajuan_kredit as mpk',
            'mpk.id',
            '=',
            'pengajuan_online.jns_kredit'
        )
        ->where('pengajuan_online.jenis_pengajuan', 'kredit')
        ->whereBetween('pengajuan_online.created_at', [$str, $end])
        ->orderBy('pengajuan_online.created_at', 'desc')
        ->get();



        return view('admin.pengajuanonline.indexkredit', $data);
    }

    function showdeposito(Request $r)
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

        $data['deposito'] = PengajuanModel::where('jenis_pengajuan', 'deposito')
        ->whereBetween('created_at', [$str, $end])
        ->orderBy('created_at', 'desc')
        ->get();


        return view('admin.pengajuanonline.indexdeposito', $data);
    }

    function showtabungan(Request $r)
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

       $data['tabungan'] = PengajuanModel::select(
            'pengajuan_online.*',
            'mpt.nama as nama_tabungan',
            'mpt.bunga',
            'mpt.min'
        )
        ->leftJoin(
            'master_pengajuan_tabungan as mpt',
            'mpt.id',
            '=',
            'pengajuan_online.jns_tab'
        )
        ->where('pengajuan_online.jenis_pengajuan', 'tabungan')
        ->whereBetween('pengajuan_online.created_at', [$str, $end])
        ->orderBy('pengajuan_online.created_at', 'desc')
        ->get();


        return view('admin.pengajuanonline.indextabungan', $data);
    }
}
