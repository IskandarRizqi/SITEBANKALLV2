<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
      Schema::create('pengaduan_nasabah', function (Blueprint $table) {
        
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable(); 
        $table->string('jenis_aduan')->nullable();
        $table->string('sub_aduan')->nullable();
        $table->json('kategori')->nullable();
        $table->string('nama')->nullable();
        $table->string('jbt_plg')->nullable();
        $table->string('lokasi')->nullable();
        $table->datetime('waktu_plg')->nullable();
        $table->string('rugi')->nullable();
        $table->text('uraian')->nullable();
        $table->json('bukti1')->nullable();  
        $table->json('bukti2')->nullable();  
        $table->string('jenis_pl')->nullable();
        $table->string('tuntutan_pl')->nullable();

        $table->tinyInteger('status')->default(0)->comment('0=pending, 1=proses, 2=selesai, 3=gugur');
    
        $table->datetime('p_data1')->nullable();     
        $table->datetime('p_data2')->nullable();      
        $table->text('ket_perpanjangan_1')->nullable();  
        $table->text('ket_perpanjangan_2')->nullable();  
 	    $table->tinyInteger('step_data')->default(1)->comment('1=cekdata, 2=validasi, 3=penanganan, 4=penyelesaian, 5=selesai');

  	    $table->string('v_jenis_konfir')->nullable();
        $table->dateTime('v_waktu_konfir')->nullable();
        $table->text('v_uraian_konfir')->nullable();
        $table->text('v_bukti_konfir')->nullable();
        $table->dateTime('v_mulaipenanganan')->nullable();
        $table->dateTime('v_selesaipenanganan')->nullable();

        $table->json('p_proses_penanganan')->nullable();
        $table->dateTime('p_perpanjanganpenanganan')->nullable();
        $table->datetime('p_berakhirpenanganan')->nullable(); 
        
        $table->datetime('s_w_selesai')->nullable();
        $table->text('s_ket_selesai')->nullable(); 

        $table->timestamps();
        $table->softDeletes();
    });
    }

    public function down()
    {
        Schema::dropIfExists('pengaduan_nasabah');
    }
};
