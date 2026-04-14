<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\MastePengajuanKreditModel;
use App\Models\MasterPengajuanTabunganModel;
use App\Models\PengajuanModel;
use App\Models\ProdukLayananModel;
use Illuminate\Http\Request;
use PDF;

class PengajuanOnlineController extends Controller
{
    public function formpengajuankredit()
    {
        $data['produkkredit'] = ProdukLayananModel::where('kategori', 0)
        ->get();
        return view(ENV('FORMPENGAJUANKREDIT'), $data);

    }

    public function formpengajuandeposito()
    {

        return view(ENV('FORMPENGAJUANDEPOSITO'));

    }

    public function formpengajuantabungan()
    {
        $data['produktabungan'] = ProdukLayananModel::where('kategori',2)
        ->get();
         return view(ENV('FORMPENGAJUANTABUNGAN'), $data);

    }

    public function savedata(Request $request)
    {
        // Validasi umum (semua form)
        $request->validate([
            'jenis_pengajuan' => 'required',
            'nm_lengkap' => 'required',
            'no_ktp' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);

        // Data dasar (dipakai semua)
        $data = [
            'no_registrasi'   => PengajuanModel::generateNoRegistrasi(),
            'nm_lengkap' => $request->nm_lengkap,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jenis_pengajuan' => $request->jenis_pengajuan,
        ];

        // KHUSUS KREDIT
        if ($request->jenis_pengajuan == 'kredit') {
            $data += [

                'pekerjaan' => $request->pekerjaan,
                'penghasilan' => $request->penghasilan,
                'alamat' => $request->alamat,
                'jns_kredit' => $request->jns_kredit,
                'jml_kredit' => $request->jml_kredit,
                'jngka_wkt' => $request->jngka_wkt,
                'tujuan_kredit' => $request->tujuan_kredit,
            ];
        }

        // KHUSUS TABUNGAN
        if ($request->jenis_pengajuan == 'tabungan') {
            $data += [
                'jns_tab' => $request->jns_tab,
                'setor_awal' => $request->setor_awal,
                'sumber_dn' => $request->sumber_dn,
                'tujuan_bk_rek' => $request->tujuan_bk_rek,
                'cat_tmbhn' => $request->cat_tmbhn,
            ];
        }

        // KHUSUS DEPOSITO
        if ($request->jenis_pengajuan == 'deposito') {
            $data += [
                'nmnl_depo' => $request->nmnl_depo,
                'jngka_wkt' => $request->jngka_wkt,
                'sumber_dn' => $request->sumber_dn,
                'rek_pencairan' => $request->rek_pencairan,
                'cat_tmbhn' => $request->cat_tmbhn,
            ];
        }


        PengajuanModel::create($data);

        return redirect()->back()->with('success', 'Data pengajuan berhasil dikirim');
    }


    public function downloadformkredit($id)
    {
         $data = PengajuanModel::with('masterKredit')->findOrFail($id);

        $pdf = Pdf::loadView('frontend.bprtaruna.pages.pengajuanonline.pdfkredit', compact('data'));

        return $pdf->stream('pengajuan_kredit'.$data->id.'.pdf');
    }

        public function downloadformdeposito($id)
    {
        $data = PengajuanModel::findOrFail($id);

        $pdf = Pdf::loadView('frontend.bprtaruna.pages.pengajuanonline.pdfdeposito', compact('data'));

        return $pdf->stream('pengajuan_kredit'.$data->id.'.pdf');
    }

        public function downloadformtabungan($id)
    {
          $data = PengajuanModel::with('masterTabungan')->findOrFail($id);
        $pdf = Pdf::loadView('frontend.bprtaruna.pages.pengajuanonline.pdftabungan', compact('data'));

        return $pdf->stream('pengajuan_kredit'.$data->id.'.pdf');
    }

}
