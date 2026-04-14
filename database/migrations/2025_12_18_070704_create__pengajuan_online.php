<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
    {
        Schema::create('pengajuan_online', function (Blueprint $table) {
            $table->id();
            $table->string('no_registrasi')->nullable();
            $table->string('jenis_pengajuan')->comment('kredit | tabungan | deposito');
            $table->string('nm_lengkap');
            $table->string('no_ktp', 16);
            $table->string('no_hp', 15);
            $table->string('email');
            $table->string('pekerjaan')->nullable();
            $table->double('penghasilan')->nullable();
            $table->text('alamat');

            // Kredit
            $table->string('jns_kredit')->nullable();
            $table->double('jml_kredit')->nullable();
            $table->integer('jngka_wkt')->nullable();
            $table->string('tujuan_kredit')->nullable();

            // Tabungan
            $table->string('jns_tab')->nullable();
            $table->double('setor_awal')->nullable();
            $table->string('sumber_dn')->nullable();
            $table->string('tujuan_bk_rek')->nullable();
            
            // Deposito
            $table->string('jns_depo')->nullable();
            $table->double('nmnl_depo')->nullable();
            $table->string('rek_pencairan')->nullable();
            $table->text('cat_tmbhn')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_online');
    }
};
