<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\WbsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use PDF;




class WbsController extends Controller
{
     function index(Request $r) {

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
        $data['wbs'] = WbsModel::get();
        
        return view('admin.wbs.index',$data);
     }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'bersedia_identitas' => 'required|in:Ya,Tidak',
            'nama_pelapor'       => 'required_if:bersedia_identitas,Ya|string|max:255',
            'hp_pelapor'         => 'required_if:bersedia_identitas,Ya|string|max:13',
            'kategori_pelanggaran' => 'nullable|string|max:255',
            'nama_terlapor'      => 'required|string|max:255',
            'jabatan_terlapor'   => 'required|string',
            'lokasi'             => 'required|string',
            'waktu'              => 'required|date',
            'deskripsi'          => 'required|string|max:255',
            'bukti'              => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:30000',
        ]);

        // Simpan data
        $data = new WbsModel();
        $data->bersedia_identitas = $request->input('bersedia_identitas');
        $data->nama_pelapor       = $request->input('nama_pelapor');
        $data->hp_pelapor         = $request->input('hp_pelapor');
        $data->kategori_pelanggaran = $request->input('kategori_pelanggaran');
        $data->nama_terlapor      = $request->input('nama_terlapor');
        $data->jabatan_terlapor   = $request->input('jabatan_terlapor');
        $data->lokasi             = $request->input('lokasi');
        $data->waktu              = \Carbon\Carbon::parse($request->input('waktu')); // parse datetime-local
        $data->deskripsi          = $request->input('deskripsi');

        // Upload bukti jika ada
        if ($request->hasFile('bukti')) {
            $data->bukti = $request->file('bukti')->store('bukti', 'public');
        }

        $data->save();

        return redirect()->back()->with('success', 'Laporan berhasil dikirim.');
    }


     public function destroy($id)
    {
        $data = WbsModel::findOrFail($id);
    
        foreach (['bukti'] as $file) {
            if ($data->$file) {
                \Storage::disk('public')->delete($data->$file);
            }
        }
    
        $data->delete();
    
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    public function download($id)
    {
        $data = WbsModel::findOrFail($id);

        $pdf = Pdf::loadView('admin.wbs.pdfwbs', compact('data'));

        return $pdf->stream('laporan_wbs_'.$data->id.'.pdf');
    }

}
