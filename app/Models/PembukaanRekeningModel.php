<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembukaanRekeningModel extends Model
{
    protected $table = 'nama_tabel_kamu';

    protected $fillable = [
        // Section 1
        'nama_cabang',
        'tanggal',
        'jenis_rekening',
        'hubungan',
        'nomor_rekening',
        'tujuan',

        // Section 2
        'no_cif',
        'nama_lengkap',
        'alamat_ktp',
        'rt_rw',
        'kelurahan',
        'kecamatan',
        'negara',
        'provinsi',
        'kode_pos',
        'npwp',
        'sudah_rekening',
        'no_rekening_existing',
        'bertindak_untuk',

        // Section 3
        'no_cif_2',
        'nama_lengkap_2',
        'alamat_ktp_2',
        'rt_rw_2',
        'kelurahan_2',
        'kecamatan_2',
        'negara_2',
        'provinsi_2',
        'kode_pos_2',
        'npwp_2',
        'sudah_rekening_2',
        'no_rekening_existing_2',
        'bertindak_untuk_2',

        // Section 4
        'jenis_tabungan',

        // Section 5
        'nominal_deposito',
        'terbilang',
        'jangka_waktu',
        'suku_bunga',
        'perpanjangan',
        'pembayaran_bunga',
        'atas_nama',
        'no_rek_tujuan',
        'nama_bank',

        // Section 6
        'angsuran_kredit',
        'auto_debet_lainnya',
    ];
}

