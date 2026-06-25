@extends('frontend.bprkeduarthasetia.layout.main')

@section('content')


<style>
  .tabs {
    display: flex;
    margin-bottom: 20px;
    border-bottom: 2px solid #ccc;
  }

  .tab-button {
    padding: 10px 20px;
    border: none;
    background-color: #eee;
    cursor: pointer;
    margin-right: 5px;
    border-radius: 5px 5px 0 0;
  }

  .tab-button.active {
    background-color: #fff;
    border-bottom: 2px solid #fff;
    font-weight: bold;
  }

  .tab-content {
    border: 1px solid #ccc;
    padding: 20px;
    background-color: #fff;
  }

  .hidden {
    display: none;
  }


.tab-button {
  background-color: #f1f1f1;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  font-weight: bold;
  color: #333;
  border-radius: 4px;
  margin: 0 5px;
  transition: 0.3s;
}

.tab-button:hover {
  background-color: #e0e0e0;
}

.tab-button.active {
  background-color: #3059CE; /* Biru Bootstrap */
  color: white;
}


.common-hero {
  background: url('{{ asset(env('GLOBAL_TOPPAGE')) }}') no-repeat center center; 
  background-size: cover; /* default untuk desktop */
  background-position: center;
  color: #fff;
  padding: 40px 0;
  position: relative;
  margin-top: 70px; /* jarak dari navbar */
  text-align: center; /* teks ke tengah */
}

/* Versi Mobile */
@media (max-width: 768px) {
  .common-hero {
    background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center; 
    background-size: cover;   /* gambar diperbesar biar penuh */
    min-height: 180px;        /* tinggi hero agar kelihatan besar */
    display: flex;
    align-items: center;      /* teks di tengah vertikal */
    justify-content: center;  /* teks di tengah horizontal */
    padding: 0;               /* hilangkan padding default */
  }

  .common-hero h1,
  .common-hero h2,
  .common-hero .title { 
    font-size: 20px;   /* sesuaikan ukuran teks agar pas di mobile */
    font-weight: bold;
    color: #000;       /* atau putih jika kontras dengan background */
  }
}



</style>

  <!--=====progress END=======-->


        <!--=====HERO AREA START=======-->

        <div class="common-hero">
          <div class="container">
            <div class="row align-items-center text-center">
              <div class="col-lg-8 m-auto">
                <div class="main-heading">
                  <h1 style="font-size: 35px; color: #fff;">PENGAJUAN ONLINE</h1>
                    <span class="span"><a href="index.html">Home</a> <span class="arrow"><i class="fa-regular fa-angle-right"></i></span> Pengajuan Online <span class="arrow">
                </div>
              </div>
            </div>
          </div>
        </div>


        <!--=====SERVICE DETAILS AREA START=======-->



        <div class="container" style="margin-top: 40px; margin-bottom: 40px;">
            <div class="tabs" style="text-align: center">
                <button class="tab-button active" onclick="openTab(event, 'form1')">Form Kredit</button>
                <button class="tab-button" onclick="openTab(event, 'form2')">Form Deposito</button>
                <button class="tab-button" onclick="openTab(event, 'form3')">Form Tabungan</button>
            </div>

            <div class="tab-content" id="form1">
                <form  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row layout-top-spacing">
                        <div class="col-md-6">
                            <div class="form-group row" style="margin-bottom: 10px;">
                                <div class="col-lg-4">
                                    <label>Produk Kredit</label>
                                </div>
                                <div class="col-lg-8">
                                    <select class="form-control" >
                                        <option value="">Pilih</option>
                                        {{-- @foreach ($produkKredit as $k)
                                        <option value="{{$k->nominal.'---'.$k->tenor.'---'.$k->id.'---'.$k->image.'---'.$k->nama.'---'.$k->nominal}}"
                                            {{old('tabu_produk')?'selected':''}}>
                                            {{$k->nama}}
                                        </option>
                                        @endforeach --}}
                                    </select>
                                    @error('plafon')
                                    <div class="text-danger">
                                        Plafon Belum Diisi
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 10px;">
                                <div class="col-lg-4">
                                    <label>Plafon</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Rp. </span>
                                        </div>
                                        <input type="number" class="form-control" name="plafon" id="plafon" value=""
                                            min="0">
                                    </div>
                                    <small class="text-secondary" id="plafons"></small>
                                    @error('plafon')
                                    <div class="text-danger">
                                        Plafon Belum Diisi
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 10px;">
                                <div class="col-lg-4">
                                    <label>Tenor</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="tenor" id="tenor" value=""
                                            min="0">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Bulan</span>
                                        </div>
                                    </div>
                                    <small class="text-secondary" id="tenors"></small>
                                    @error('tenor')
                                    <div class="text-danger">
                                        Tenor Belum Diisi
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 10px;">
                                <div class="col-lg-4">
                                    <label>Angsuran</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="number" class="form-control" name="angsuran" id="angsuran"
                                            value="" readonly>
                                    </div>
                                    <small class="text-secondary" id="bungas"></small>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 10px;">
                                <div class="col-lg-4">
                                    <label>Geo Lokasi</label>
                                </div>
                                <div class="col-lg-8">
                                    <small class="text-warning font-weight-bold">*Koordinat Domisili</small>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="geo" id="geo" value="">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Geo
                                                Lokasi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" onclick="getcurrentlocation()">Ambil Lokasi</a>
                                                <a class="dropdown-item" href="https://www.google.com/maps" target="_blank">Buka
                                                    Map</a>
                                            </div>
                                        </div>
                                    </div>
                                    @error('geo')
                                    <div class="text-danger">
                                        Geo Belum Diisi
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 30px;">
                                <div class="col-lg-4">
                                    <label>Jenis Agunan</label>
                                </div>
                                <div class="col-lg-8">
                                    <select class="form-control" name="bentuk_agunan" id="bentuk_agunan">
                                        <!-- <option value="tanah_dan_bangunan" {{old('bentuk_agunan')=='tanah_dan_bangunan'
                                            ?'selected':''}}>Tanah dan Bangunan</option>
                                        <option value="benda_bergerak" {{old('bentuk_agunan')=='benda_bergerak' ?'selected':''}}>
                                            Benda Bergerak</option>
                                        <option value="lainnya" {{old('bentuk_agunan')=='lainnya' ?'selected':''}}>Lainnya</option> -->
                                        {{-- @foreach($jenisagunan as $key => $value)
                                        <option value="{{$value->id}}" {{old('bentuk_agunan')==$value->id
                                            ?'selected':''}}>{{$value->agunan}}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('bentuk_agunan')
                                    <div class="text-danger">
                                        Bentuk Agunan Belum Diisi
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <input type="text" value="" name=" bunga" id="bunga" hidden />
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="layout-top-spacing justify-content-md-center">
                                
                                    <div class="card-body">
                                        <div class="">
                                                <img class="" style="border-radius: 5px;" id="imageKreditProduk" width="520px" height="316px">
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    
                                <div id="toggleAccordion">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card" style="margin-bottom: 15px;">
                                            <div class="card-header  text-white"  style="background-color: #3059CE;" id="...">
                                                <section class="mb-0 mt-0" style="padding: 0 !important">
                                                    <div 
                                                        role="menu" 
                                                        class="d-flex justify-content-between align-items-center" 
                                                        data-toggle="collapse"
                                                        data-target="#kreditAccordionOne" 
                                                        aria-expanded="true"
                                                        aria-controls="kreditAccordionOne"
                                                        style="cursor: pointer; padding: 1px;"
                                                    >
                                                        <span>Data Pribadi</span>
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                <!-- #endregion --></section>
                                            </div>

                                                <div id="kreditAccordionOne" class="collapse " aria-labelledby="..."
                                                    data-parent="#toggleAccordion">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Jenis Identitas <strong class="text-danger">*</strong></label>
                                                            <select class="form-control" name="jenis_identitas" id="jenis_identitas">
                                                                <option value="">Pilih</option>
                                                                
                                                            </select>
                                                            @error('nama')
                                                            <div class="text-danger">
                                                                Nama Belum Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No KTP <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" name="no_ktp"
                                                                value="" id="no_ktp" />@error('no_ktp')
                                                            <div class="text-danger">
                                                                No KTP Belum Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" name="nama" value=""
                                                                id="nama" />@error('nama')
                                                            <div class="text-danger">
                                                                Nama Belum Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Handphone/WA <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" name="no_hp"
                                                                value="" id="no_hp" />@error('no_hp')
                                                            <div class="text-danger">
                                                                Nomor HP Belum Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat <strong class="text-danger">*</strong></label>
                                                            <textarea class="form-control" name="alamat" id="alamat"
                                                                value="" style="height: 120px"'></textarea>
                                                                        @error(' alamat') <div class="text-danger">
                                                                            Alamat Belum Diisi
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                    <?php $addon_list = explode(',', env('ADDON_LIST', '')); ?>
                                                        @if (in_array('sederhana',$addon_list))
                                                    <div hidden>
                                                    @else
                                                    <div class="card">
                                                            @endif
                                                    <div class="card-header  text-white"  style="background-color: #3059CE;" id="...">
                                                    <section class="mb-0 mt-0" style="padding: 0 !important">
                                                        <div 
                                                            role="menu" 
                                                            class="d-flex justify-content-between align-items-center" 
                                                            data-toggle="collapse"
                                                            data-target="#kreditAccordionTwo" 
                                                            aria-expanded="true"
                                                            aria-controls="kreditAccordionTwo"
                                                            style="cursor: pointer; padding: 1px;"
                                                        >
                                                            <span>Pembukaan Rekening</span>
                                                            <i class="fas fa-chevron-down"></i>
                                                        </div>
                                                        </section>
                                                    </div>

                                                    <div id="kreditAccordionTwo" class="collapse" aria-labelledby="..."
                                                        data-parent="#toggleAccordion">
                                                        <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Tujuan Buka Rekening</label>
                                                        <select class="form-control" id="tujuan_buka_rekening" name="tujuan_buka_rekening">
                                                        <option value="">Pilih</option>
                                                        <option value="">Tabungan</option>
                                                        <option value="">Lainnya</option>
                                                    </select>
                                                    @error('tujuan_buka_rekening')
                                                    <div class="text-danger">
                                                        Harus Diisi
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Tujuan Buka Rekening Lainnya</label>
                                                    <input type="text" class="form-control" id="tujuan_buka_rekening_lainnya" name="tujuan_buka_rekening_lainnya" value="" />
                                                    @error('tujuan_buka_rekening_lainnya')
                                                    <div class="text-danger">
                                                        Harus Diisi
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah Setoran (Nominal) <strong class="text-danger">*</strong></label>
                                                    <input type="text" class="form-control" id="jumlah_setoran_kredit" name="jumlah_setoran_kredit" />
                                                    <textarea class="form-control" id="terbilang_kredit" name="terbilang_kredit"></textarea>
                                                            @error('jumlah_setoran_kredit')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="card" style="margin-bottom: 15px;">
                                                    <div class="card-header  text-white"  style="background-color: #3059CE;" id="...">
                                                    <section class="mb-0 mt-0" style="padding: 0 !important">
                                                        <div 
                                                            role="menu" 
                                                            class="d-flex justify-content-between align-items-center" 
                                                            data-toggle="collapse"
                                                            data-target="#kreditAccordionFour" 
                                                            aria-expanded="true"
                                                            aria-controls="kreditAccordionFour"
                                                            style="cursor: pointer; padding: 1px;"
                                                        >
                                                            <span>Data Pekerjaan</span>
                                                            <i class="fas fa-chevron-down"></i>
                                                        </div>
                                                        </section>
                                                    </div>

                                                <div id="kreditAccordionFour" class="collapse" aria-labelledby="..."
                                                    data-parent="#toggleAccordion">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Jenis Pekerjaan</label>
                                                            <select class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan">
                                                                <option value="">Pilih</option>
                                                                <option value="">
                                                                    Karyawan</option>
                                                                <option value="pns" >PNS
                                                                </option>
                                                                <option value="wiraswasta">Wiraswasta</option>
                                                            </select>
                                                            @error('data_pekerjaan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Kantor <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="nama_kantor"
                                                                value="" name="nama_kantor" />
                                                            @error('nama_kantor')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Bidang Pekerjaan <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="bidang_pekerjaan"
                                                                value="" name="bidang_pekerjaan" />
                                                            @error('bidang_pekerjaan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jabatan <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                                                value="" />
                                                            @error('jabatan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Lama Bekerja</label>
                                                            <input type="text" class="form-control" id="lama_bekerja"
                                                                value="" name="lama_bekerja" />
                                                            @error('lama_bekerja')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NPWP Nasabah</label>
                                                            <input type="text" class="form-control" id="npwp_nasabah"
                                                                value="" name="npwp_nasabah" />
                                                            @error('npwp_nasabah')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kode POS <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                                                                value="" />
                                                            @error('kode_pos')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat Kantor <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="alamat_kantor"
                                                                value="" name="alamat_kantor" />
                                                            @error('alamat_kantor')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>RT/RW</label>
                                                            <input type="text" class="form-control" id="rtrw" name="rtrw"
                                                                value="" />
                                                            @error('rtrw')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kelurahan/Desa <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="kelurahan"
                                                                value="" name="kelurahan" />
                                                            @error('kelurahan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kecamatan <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="kecamatan"
                                                                value="" name="kecamatan" />
                                                            @error('kecamatan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kota/Kabupaten <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="kabupaten"
                                                                value="" name="kabupaten" />
                                                            @error('kabupaten')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Provinsi <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="provinsi" name="provinsi"
                                                                value="" />
                                                            @error('provinsi')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Telepon</label>
                                                            <input type="text" class="form-control" id="telepon" name="telepon"
                                                                value="" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Faksimili</label>
                                                            <input type="text" class="form-control" id="faksimili"
                                                                value="" name="faksimili" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat Surat Menyurat <strong class="text-danger">*</strong></label>
                                                            <select class="form-control" id="alamat_surat_menyurat"
                                                                name="alamat_surat_menyurat">
                                                                <option value="">Pilih</option>
                                                                <option value="identitas" >
                                                                    Alamat Identitas</option>
                                                                <option value="tempat_kerja"
                                                                >
                                                                    Alamat Tempat Kerja</option>
                                                            </select>
                                                            @error('alamat_surat_menyurat')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                    <div class="card-header  text-white" style="background-color: #3059CE;" id="...">
                                                    <section class="mb-0 mt-0" style="padding: 0 !important">
                                                        <div 
                                                            role="menu" 
                                                            class="d-flex justify-content-between align-items-center" 
                                                            data-toggle="collapse"
                                                            data-target="#kreditAccordionThree" 
                                                            aria-expanded="true"
                                                            aria-controls="kreditAccordionThree"
                                                            style="cursor: pointer; padding: 1px;"
                                                        >
                                                            <span>Data Keuangan</span>
                                                            <i class="fas fa-chevron-down"></i>
                                                        </div>
                                                        </section>
                                                    </div>

                                                <div id="kreditAccordionThree" class="collapse" aria-labelledby="..."
                                                    data-parent="#toggleAccordion">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Penghasilan Perbulan <strong class="text-danger">*</strong></label>
                                                            <select class="form-control" name="penghasilan_perbulan">
                                                                <option value="">Pilih</option>
                                                                <option value="5000000"></option>
                                                                <option value="10000000" ></option>
                                                                <option value="15000000"></option>
                                                                <option value="20000000" ></option>
                                                            </select>
                                                            @error('penghasilan_perbulan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Transaksi Normal Harian <strong
                                                                    class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="transaksi_normal_harian"
                                                                name="transaksi_normal_harian"
                                                                value="}" />
                                                            <small class="text-secondary" id="transaksiNH"></small>
                                                            @error('transaksi_normal_harian')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sumber Utama Lainnya</label>
                                                            <input type="text" class="form-control" name="sumber_lainnya"
                                                                value="" />
                                                            @error('sumber_lainnya')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nominal Sumber Utama Lainnya</label>
                                                            <input type="text" class="form-control" id="nominal_sumber_lainnya"
                                                                name="nominal_sumber_lainnya"
                                                                value="" />
                                                            <small class="text-secondary" id="nominalSUL"></small>
                                                            @error('nominal_sumber_lainnya')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <div class="custom-file-container" data-upload-id="imgKredit">
                                                            <label>KTP <a href="javascript:void(0)"
                                                                    class="custom-file-container__image-clear" title="Clear Image">x</a>
                                                                <strong class="text-danger">*</strong></label>
                                                            <label class="custom-file-container__custom-file">
                                                                <input type="file"
                                                                    class="custom-file-container__custom-file__custom-file-input"
                                                                    accept="image/*" id="ktp_kredit" name="foto">
                                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                                <span
                                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>
                                                            <div class="custom-file-container__image-preview"></div>
                                                            @error('foto')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                        </div>
                    </div>
                    <div class="n-chk" style="margin-top: 20px;">
                        <label class="new-control new-checkbox checkbox-primary">
                            <input type="checkbox" class="new-control-input" id="checkboxKredit">
                            <span class="new-control-indicator"></span><span data-toggle="modal" data-target="#syaratKredit">Syarat &
                                Ketentuan Berlaku</span>
                        </label>
                    </div>
                    {{-- <button type="submit" class="btn btn-primary mt-3" id="simpanKredit" disabled>Simpan</button> --}}
                    <!-- Modal -->
                    <div class="modal fade" id="syaratKredit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body" style="background-color: white;">
                                    <div class="d-flex justify-content-center mt-4">
                                        <svg viewBox="0 0 24 24" width="100" height="100" stroke="currentColor" stroke-width="1.5"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="16" x2="12" y2="12"></line>
                                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                        </svg>
                                    </div>
                                    <div class="mt-4" >
                                        <p class="text-justify">Dengan membaca syarat dan Ketentuan ini.</p>
                                        <p class="text-justify">
                                            Saya menyatakan memahami dan bersedia untuk dilakukan pengecekan data pribadi saya guna
                                            kepentingan pengajuan Kredit, Tabungan, dan atau Deposito yang saya ajukan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        // $('#ktp_kredit').change(function () {
                            // 
                        // })
                    </script>
                </form>
            </div>
            <div class="tab-content hidden" id="form2">
                <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="row layout-top-spacing">
                        <div class="col-md-6">
                            <div class="form-group row" style="margin-bottom: 10px;">
                                <div class="col-lg-4"><label>Produk</label></div>
                                <div class="col-lg-8">
                                    <select class="form-control" name="depo_produk" id="depo_produk">
                                        <option value="">Pilih</option>
                                        {{-- @foreach ($produkDeposito as $deposito)
                                        <option value="{{$deposito->id.'---'.$deposito->tenor.'---'.$deposito->image}}"
                                            {{old('depo_jangka_waktu')?'selected':''}}>{{$deposito->nama}}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('depo_produk')
                                    <div class="text-danger">
                                        Produk Belum Diisi
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row"  style="margin-bottom: 10px;">
                                <div class="col-lg-4"><label>Nominal</label></div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="number" class="form-control" name="depo_nominal" id="depo_nominal" min="0"
                                            value="">
                                    </div>
                                    <small class="text-secondary" id="depo_nominals"></small>
                                    @error('depo_nominal')
                                    <div class="text-danger">
                                        Nominal Belum Diisi
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4"><label>Jangka Waktu</label></div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="depo_jangka_waktu" id="depo_jangka_waktu"
                                            value="" min="0">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Bulan</span>
                                        </div>
                                    </div>
                                    @error('depo_jangka_waktu')
                                    <div class="text-danger">
                                        Jangka Waktu Belum Diisi
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="layout-top-spacing justify-content-md-center">
                        
                                    <div class="card-body">

                                        <img class="m-1" id="imageDepositoProduk" style="border-radius: 5px;" width="520px;" height="200px">
                                    </div>
                            
                            </div>
                        </div>
                        
                                <div id="toggleAccordion">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card" style="margin-bottom: 15px;">
                                                    <div class="card-header  text-white"  style="background-color: #3059CE;" id="...">
                                                    <section class="mb-0 mt-0" style="padding: 0 !important">
                                                        <div 
                                                            role="menu" 
                                                            class="d-flex justify-content-between align-items-center" 
                                                            data-toggle="collapse"
                                                            data-target="#depositoAccordionOne" 
                                                            aria-expanded="true"
                                                            aria-controls="depositoAccordionOne"
                                                            style="cursor: pointer; padding: 1px;"
                                                        >
                                                            <span>Data Pribadi</span>
                                                            <i class="fas fa-chevron-down"></i>
                                                        </div>
                                                        </section>
                                                    </div>

                                                <div id="depositoAccordionOne" class="collapse " aria-labelledby="..."
                                                    data-parent="#toggleAccordion">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Jenis Identitas <strong class="text-danger">*</strong></label>
                                                            <select class="form-control" name="jenis_identitas" id="jenis_identitas">
                                                                <option value="">Pilih</option>
                                                                
                                                            </select>
                                                            @error('nama')
                                                            <div class="text-danger">
                                                                Nama Belum Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No KTP <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" name="no_ktp"
                                                                value="" id="no_ktp" />@error('no_ktp')
                                                            <div class="text-danger">
                                                                No KTP Belum Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" name="nama" value=""
                                                                id="nama" />@error('nama')
                                                            <div class="text-danger">
                                                                Nama Belum Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Handphone/WA <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" name="no_hp"
                                                                value="" id="no_hp" />@error('no_hp')
                                                            <div class="text-danger">
                                                                Nomor HP Belum Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat <strong class="text-danger">*</strong></label>
                                                            <textarea class="form-control" name="alamat" id="alamat"
                                                                value="" style="height: 120px"'></textarea>
                                                                        @error(' alamat') <div class="text-danger">
                                                                            Alamat Belum Diisi
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                    <?php $addon_list = explode(',', env('ADDON_LIST', '')); ?>
                                                        @if (in_array('sederhana',$addon_list))
                                                    <div hidden>
                                                    @else
                                                    <div class="card">
                                                            @endif
                                                    <div class="card-header  text-white"  style="background-color: #3059CE;" id="...">
                                                    <section class="mb-0 mt-0" style="padding: 0 !important">
                                                        <div 
                                                            role="menu" 
                                                            class="d-flex justify-content-between align-items-center" 
                                                            data-toggle="collapse"
                                                            data-target="#depositoAccordionTwo" 
                                                            aria-expanded="true"
                                                            aria-controls="depositoAccordionTwo"
                                                            style="cursor: pointer; padding: 1px;"
                                                        >
                                                            <span>Pembukaan Rekening</span>
                                                            <i class="fas fa-chevron-down"></i>
                                                        </div>
                                                        </section>
                                                    </div>

                                                    <div id="depositoAccordionTwo" class="collapse" aria-labelledby="..."
                                                        data-parent="#toggleAccordion">
                                                        <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Tujuan Buka Rekening</label>
                                                        <select class="form-control" id="tujuan_buka_rekening" name="tujuan_buka_rekening">
                                                        <option value="">Pilih</option>
                                                        <option value="">Tabungan</option>
                                                        <option value="">Lainnya</option>
                                                    </select>
                                                    @error('tujuan_buka_rekening')
                                                    <div class="text-danger">
                                                        Harus Diisi
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Tujuan Buka Rekening Lainnya</label>
                                                    <input type="text" class="form-control" id="tujuan_buka_rekening_lainnya" name="tujuan_buka_rekening_lainnya" value="" />
                                                    @error('tujuan_buka_rekening_lainnya')
                                                    <div class="text-danger">
                                                        Harus Diisi
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah Setoran (Nominal) <strong class="text-danger">*</strong></label>
                                                    <input type="text" class="form-control" id="jumlah_setoran_kredit" name="jumlah_setoran_kredit" />
                                                    <textarea class="form-control" id="terbilang_kredit" name="terbilang_kredit"></textarea>
                                                            @error('jumlah_setoran_kredit')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="card" style="margin-bottom: 15px;">
                                                    <div class="card-header  text-white"  style="background-color: #3059CE;" id="...">
                                                    <section class="mb-0 mt-0" style="padding: 0 !important">
                                                        <div 
                                                            role="menu" 
                                                            class="d-flex justify-content-between align-items-center" 
                                                            data-toggle="collapse"
                                                            data-target="#depositoAccordionFour" 
                                                            aria-expanded="true"
                                                            aria-controls="depositoAccordionFour"
                                                            style="cursor: pointer; padding: 1px;"
                                                        >
                                                            <span>Data Pekerjaan</span>
                                                            <i class="fas fa-chevron-down"></i>
                                                        </div>
                                                        </section>
                                                    </div>

                                                <div id="depositoAccordionFour" class="collapse" aria-labelledby="..."
                                                    data-parent="#toggleAccordion">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Jenis Pekerjaan</label>
                                                            <select class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan">
                                                                <option value="">Pilih</option>
                                                                <option value="">
                                                                    Karyawan</option>
                                                                <option value="pns" >PNS
                                                                </option>
                                                                <option value="wiraswasta">Wiraswasta</option>
                                                            </select>
                                                            @error('data_pekerjaan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Kantor <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="nama_kantor"
                                                                value="" name="nama_kantor" />
                                                            @error('nama_kantor')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Bidang Pekerjaan <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="bidang_pekerjaan"
                                                                value="" name="bidang_pekerjaan" />
                                                            @error('bidang_pekerjaan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jabatan <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                                                value="" />
                                                            @error('jabatan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Lama Bekerja</label>
                                                            <input type="text" class="form-control" id="lama_bekerja"
                                                                value="" name="lama_bekerja" />
                                                            @error('lama_bekerja')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NPWP Nasabah</label>
                                                            <input type="text" class="form-control" id="npwp_nasabah"
                                                                value="" name="npwp_nasabah" />
                                                            @error('npwp_nasabah')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kode POS <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                                                                value="" />
                                                            @error('kode_pos')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat Kantor <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="alamat_kantor"
                                                                value="" name="alamat_kantor" />
                                                            @error('alamat_kantor')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>RT/RW</label>
                                                            <input type="text" class="form-control" id="rtrw" name="rtrw"
                                                                value="" />
                                                            @error('rtrw')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kelurahan/Desa <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="kelurahan"
                                                                value="" name="kelurahan" />
                                                            @error('kelurahan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kecamatan <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="kecamatan"
                                                                value="" name="kecamatan" />
                                                            @error('kecamatan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kota/Kabupaten <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="kabupaten"
                                                                value="" name="kabupaten" />
                                                            @error('kabupaten')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Provinsi <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="provinsi" name="provinsi"
                                                                value="" />
                                                            @error('provinsi')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Telepon</label>
                                                            <input type="text" class="form-control" id="telepon" name="telepon"
                                                                value="" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Faksimili</label>
                                                            <input type="text" class="form-control" id="faksimili"
                                                                value="" name="faksimili" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat Surat Menyurat <strong class="text-danger">*</strong></label>
                                                            <select class="form-control" id="alamat_surat_menyurat"
                                                                name="alamat_surat_menyurat">
                                                                <option value="">Pilih</option>
                                                                <option value="identitas" >
                                                                    Alamat Identitas</option>
                                                                <option value="tempat_kerja"
                                                                >
                                                                    Alamat Tempat Kerja</option>
                                                            </select>
                                                            @error('alamat_surat_menyurat')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                    <div class="card-header  text-white"  style="background-color: #3059CE;" id="...">
                                                    <section class="mb-0 mt-0" style="padding: 0 !important">
                                                        <div 
                                                            role="menu" 
                                                            class="d-flex justify-content-between align-items-center" 
                                                            data-toggle="collapse"
                                                            data-target="#depositoAccordionThree" 
                                                            aria-expanded="true"
                                                            aria-controls="depositoAccordionThree"
                                                            style="cursor: pointer; padding: 1px;"
                                                        >
                                                            <span>Data Keuangan</span>
                                                            <i class="fas fa-chevron-down"></i>
                                                        </div>
                                                        </section>
                                                    </div>

                                                <div id="depositoAccordionThree" class="collapse" aria-labelledby="..."
                                                    data-parent="#toggleAccordion">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Penghasilan Perbulan <strong class="text-danger">*</strong></label>
                                                            <select class="form-control" name="penghasilan_perbulan">
                                                                <option value="">Pilih</option>
                                                                <option value="5000000"></option>
                                                                <option value="10000000" ></option>
                                                                <option value="15000000"></option>
                                                                <option value="20000000" ></option>
                                                            </select>
                                                            @error('penghasilan_perbulan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Transaksi Normal Harian <strong
                                                                    class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="transaksi_normal_harian"
                                                                name="transaksi_normal_harian"
                                                                value="}" />
                                                            <small class="text-secondary" id="transaksiNH"></small>
                                                            @error('transaksi_normal_harian')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sumber Utama Lainnya</label>
                                                            <input type="text" class="form-control" name="sumber_lainnya"
                                                                value="" />
                                                            @error('sumber_lainnya')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nominal Sumber Utama Lainnya</label>
                                                            <input type="text" class="form-control" id="nominal_sumber_lainnya"
                                                                name="nominal_sumber_lainnya"
                                                                value="" />
                                                            <small class="text-secondary" id="nominalSUL"></small>
                                                            @error('nominal_sumber_lainnya')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <div class="custom-file-container" data-upload-id="imgKredit">
                                                            <label>KTP <a href="javascript:void(0)"
                                                                    class="custom-file-container__image-clear" title="Clear Image">x</a>
                                                                <strong class="text-danger">*</strong></label>
                                                            <label class="custom-file-container__custom-file">
                                                                <input type="file"
                                                                    class="custom-file-container__custom-file__custom-file-input"
                                                                    accept="image/*" id="ktp_kredit" name="foto">
                                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                                <span
                                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>
                                                            <div class="custom-file-container__image-preview"></div>
                                                            @error('foto')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="n-chk" style="margin-top: 20px;">
                        <label class="new-control new-checkbox checkbox-primary">
                            <input type="checkbox" class="new-control-input" id="checkboxDeposito">
                            <span class="new-control-indicator"></span><span data-toggle="modal"
                                data-target="#syaratDeposito">Syarat
                                & Ketentuan Berlaku</span>
                        </label>
                    </div>
                    {{-- <button type="submit" class="btn btn-primary mt-3" id="simpanDeposito" disabled>Simpan</button> --}}
                </div>
                <!-- Modal -->
                <div class="modal fade" id="syaratDeposito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body" style="background-color: white;">
                                <div class="d-flex justify-content-center mt-4">
                                    <svg viewBox="0 0 24 24" width="100" height="100" stroke="currentColor" stroke-width="1.5"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                    </svg>
                                </div>
                                <div class="mt-4">
                                    <p class="text-justify">Dengan membaca syarat dan Ketentuan ini.</p>
                                    <p class="text-justify">
                                        Saya menyatakan memahami dan bersedia untuk dilakukan pengecekan data pribadi saya guna
                                        kepentingan pengajuan Kredit, Tabungan, dan atau Deposito yang saya ajukan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="tab-content hidden" id="form3">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="row layout-top-spacing">
                            <div class="col-md-6 mb-2">
                                <div class="form-group row" style="margin-bottom: 10px;">
                                    <div class="col-lg-4"><label>Produk</label></div>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="tabu_produk" id="tabu_produk">
                                            <option value="">Pilih</option>
                                            {{-- @foreach ($produkTabungan as $tabungan)
                                            <option value="{{$tabungan->id.'---'.$tabungan->image.'---'.$tabungan->minimal_setoran}}"
                                                {{old('tabu_produk')?'selected':''}}>
                                                {{$tabungan->nama}}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('tabu_produk')
                                        <div class="text-danger">
                                            Tabungan Belum Diisi
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom: 10px;">
                                    <div class="col-lg-4"><label>Setoran Awal</label></div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="number" class="form-control" name="tabu_nominal" id="tabu_nominal"
                                                value="{{old('tabu_nominal')}}" min="0">
                                        </div>
                                        <small class="text-secondary" id="setoran_awals"></small>

                                        @error('tabu_nominal')
                                        <div class="text-danger">
                                            Nominal Belum Diisi
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="layout-top-spacing justify-content-md-center">
                                        <div class="card-body" >
                                        
                                            <img class="m-1" style="border-radius: 5px;" id="imageTabunganProduk" width="520px;" height="200px">
                                        </div>
                                </div>
                            </div>
            
                                <div id="toggleAccordion">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card" style="margin-bottom: 15px;">
                                                    <div class="card-header  text-white"  style="background-color: #3059CE;" id="...">
                                                    <section class="mb-0 mt-0" style="padding: 0 !important">
                                                        <div 
                                                            role="menu" 
                                                            class="d-flex justify-content-between align-items-center" 
                                                            data-toggle="collapse"
                                                            data-target="#tabunganAccordionOne" 
                                                            aria-expanded="true"
                                                            aria-controls="tabunganAccordionOne"
                                                            style="cursor: pointer; padding: 1px;"
                                                        >
                                                            <span>Data Pribadi</span>
                                                            <i class="fas fa-chevron-down"></i>
                                                        </div>
                                                        </section>
                                                    </div>

                                                <div id="tabunganAccordionOne" class="collapse " aria-labelledby="..."
                                                    data-parent="#toggleAccordion">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Jenis Identitas <strong class="text-danger">*</strong></label>
                                                            <select class="form-control" name="jenis_identitas" id="jenis_identitas">
                                                                <option value="">Pilih</option>
                                                                
                                                            </select>
                                                            @error('nama')
                                                            <div class="text-danger">
                                                                Nama Belum Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No KTP <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" name="no_ktp"
                                                                value="" id="no_ktp" />@error('no_ktp')
                                                            <div class="text-danger">
                                                                No KTP Belum Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" name="nama" value=""
                                                                id="nama" />@error('nama')
                                                            <div class="text-danger">
                                                                Nama Belum Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Handphone/WA <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" name="no_hp"
                                                                value="" id="no_hp" />@error('no_hp')
                                                            <div class="text-danger">
                                                                Nomor HP Belum Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat <strong class="text-danger">*</strong></label>
                                                            <textarea class="form-control" name="alamat" id="alamat"
                                                                value="" style="height: 120px"'></textarea>
                                                                        @error(' alamat') <div class="text-danger">
                                                                            Alamat Belum Diisi
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                    <?php $addon_list = explode(',', env('ADDON_LIST', '')); ?>
                                                        @if (in_array('sederhana',$addon_list))
                                                    <div hidden>
                                                    @else
                                                    <div class="card">
                                                            @endif
                                                    <div class="card-header  text-white"  style="background-color: #3059CE;" id="...">
                                                    <section class="mb-0 mt-0" style="padding: 0 !important">
                                                        <div 
                                                            role="menu" 
                                                            class="d-flex justify-content-between align-items-center" 
                                                            data-toggle="collapse"
                                                            data-target="#tabunganAccordionTwo" 
                                                            aria-expanded="true"
                                                            aria-controls="tabunganAccordionTwo"
                                                            style="cursor: pointer; padding: 1px;"
                                                        >
                                                            <span>Pembukaan Rekening</span>
                                                            <i class="fas fa-chevron-down"></i>
                                                        </div>
                                                        </section>
                                                    </div>

                                                    <div id="tabunganAccordionTwo" class="collapse" aria-labelledby="..."
                                                        data-parent="#toggleAccordion">
                                                        <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Tujuan Buka Rekening</label>
                                                        <select class="form-control" id="tujuan_buka_rekening" name="tujuan_buka_rekening">
                                                        <option value="">Pilih</option>
                                                        <option value="">Tabungan</option>
                                                        <option value="">Lainnya</option>
                                                    </select>
                                                    @error('tujuan_buka_rekening')
                                                    <div class="text-danger">
                                                        Harus Diisi
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Tujuan Buka Rekening Lainnya</label>
                                                    <input type="text" class="form-control" id="tujuan_buka_rekening_lainnya" name="tujuan_buka_rekening_lainnya" value="" />
                                                    @error('tujuan_buka_rekening_lainnya')
                                                    <div class="text-danger">
                                                        Harus Diisi
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah Setoran (Nominal) <strong class="text-danger">*</strong></label>
                                                    <input type="text" class="form-control" id="jumlah_setoran_kredit" name="jumlah_setoran_kredit" />
                                                    <textarea class="form-control" id="terbilang_kredit" name="terbilang_kredit"></textarea>
                                                            @error('jumlah_setoran_kredit')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="card" style="margin-bottom: 15px;">
                                                    <div class="card-header  text-white"  style="background-color: #3059CE;" id="...">
                                                    <section class="mb-0 mt-0" style="padding: 0 !important">
                                                        <div 
                                                            role="menu" 
                                                            class="d-flex justify-content-between align-items-center" 
                                                            data-toggle="collapse"
                                                            data-target="#tabunganAccordionFour" 
                                                            aria-expanded="true"
                                                            aria-controls="tabunganAccordionFour"
                                                            style="cursor: pointer; padding: 1px;"
                                                        >
                                                            <span>Data Pekerjaan</span>
                                                            <i class="fas fa-chevron-down"></i>
                                                        </div>
                                                        </section>
                                                    </div>

                                                <div id="tabunganAccordionFour" class="collapse" aria-labelledby="..."
                                                    data-parent="#toggleAccordion">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Jenis Pekerjaan</label>
                                                            <select class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan">
                                                                <option value="">Pilih</option>
                                                                <option value="">
                                                                    Karyawan</option>
                                                                <option value="pns" >PNS
                                                                </option>
                                                                <option value="wiraswasta">Wiraswasta</option>
                                                            </select>
                                                            @error('data_pekerjaan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Kantor <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="nama_kantor"
                                                                value="" name="nama_kantor" />
                                                            @error('nama_kantor')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Bidang Pekerjaan <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="bidang_pekerjaan"
                                                                value="" name="bidang_pekerjaan" />
                                                            @error('bidang_pekerjaan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jabatan <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                                                value="" />
                                                            @error('jabatan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Lama Bekerja</label>
                                                            <input type="text" class="form-control" id="lama_bekerja"
                                                                value="" name="lama_bekerja" />
                                                            @error('lama_bekerja')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NPWP Nasabah</label>
                                                            <input type="text" class="form-control" id="npwp_nasabah"
                                                                value="" name="npwp_nasabah" />
                                                            @error('npwp_nasabah')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kode POS <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                                                                value="" />
                                                            @error('kode_pos')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat Kantor <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="alamat_kantor"
                                                                value="" name="alamat_kantor" />
                                                            @error('alamat_kantor')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>RT/RW</label>
                                                            <input type="text" class="form-control" id="rtrw" name="rtrw"
                                                                value="" />
                                                            @error('rtrw')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kelurahan/Desa <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="kelurahan"
                                                                value="" name="kelurahan" />
                                                            @error('kelurahan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kecamatan <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="kecamatan"
                                                                value="" name="kecamatan" />
                                                            @error('kecamatan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kota/Kabupaten <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="kabupaten"
                                                                value="" name="kabupaten" />
                                                            @error('kabupaten')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Provinsi <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="provinsi" name="provinsi"
                                                                value="" />
                                                            @error('provinsi')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Telepon</label>
                                                            <input type="text" class="form-control" id="telepon" name="telepon"
                                                                value="" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Faksimili</label>
                                                            <input type="text" class="form-control" id="faksimili"
                                                                value="" name="faksimili" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat Surat Menyurat <strong class="text-danger">*</strong></label>
                                                            <select class="form-control" id="alamat_surat_menyurat"
                                                                name="alamat_surat_menyurat">
                                                                <option value="">Pilih</option>
                                                                <option value="identitas" >
                                                                    Alamat Identitas</option>
                                                                <option value="tempat_kerja"
                                                                >
                                                                    Alamat Tempat Kerja</option>
                                                            </select>
                                                            @error('alamat_surat_menyurat')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                    <div class="card-header  text-white"  style="background-color: #3059CE;" id="...">
                                                    <section class="mb-0 mt-0" style="padding: 0 !important">
                                                        <div 
                                                            role="menu" 
                                                            class="d-flex justify-content-between align-items-center" 
                                                            data-toggle="collapse"
                                                            data-target="#tabunganAccordionThree" 
                                                            aria-expanded="true"
                                                            aria-controls="tabunganAccordionThree"
                                                            style="cursor: pointer; padding: 1px;"
                                                        >
                                                            <span>Data Keuangan</span>
                                                            <i class="fas fa-chevron-down"></i>
                                                        </div>
                                                        </section>
                                                    </div>

                                                <div id="tabunganAccordionThree" class="collapse" aria-labelledby="..."
                                                    data-parent="#toggleAccordion">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Penghasilan Perbulan <strong class="text-danger">*</strong></label>
                                                            <select class="form-control" name="penghasilan_perbulan">
                                                                <option value="">Pilih</option>
                                                                <option value="5000000"></option>
                                                                <option value="10000000" ></option>
                                                                <option value="15000000"></option>
                                                                <option value="20000000" ></option>
                                                            </select>
                                                            @error('penghasilan_perbulan')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Transaksi Normal Harian <strong
                                                                    class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id="transaksi_normal_harian"
                                                                name="transaksi_normal_harian"
                                                                value="}" />
                                                            <small class="text-secondary" id="transaksiNH"></small>
                                                            @error('transaksi_normal_harian')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sumber Utama Lainnya</label>
                                                            <input type="text" class="form-control" name="sumber_lainnya"
                                                                value="" />
                                                            @error('sumber_lainnya')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nominal Sumber Utama Lainnya</label>
                                                            <input type="text" class="form-control" id="nominal_sumber_lainnya"
                                                                name="nominal_sumber_lainnya"
                                                                value="" />
                                                            <small class="text-secondary" id="nominalSUL"></small>
                                                            @error('nominal_sumber_lainnya')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <div class="custom-file-container" data-upload-id="imgKredit">
                                                            <label>KTP <a href="javascript:void(0)"
                                                                    class="custom-file-container__image-clear" title="Clear Image">x</a>
                                                                <strong class="text-danger">*</strong></label>
                                                            <label class="custom-file-container__custom-file">
                                                                <input type="file"
                                                                    class="custom-file-container__custom-file__custom-file-input"
                                                                    accept="image/*" id="ktp_kredit" name="foto">
                                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                                <span
                                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>
                                                            <div class="custom-file-container__image-preview"></div>
                                                            @error('foto')
                                                            <div class="text-danger">
                                                                Harus Diisi
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                        </div>
                        <div class="n-chk" style="margin-top: 20px; ">
                            <label class="new-control new-checkbox checkbox-primary">
                                <input type="checkbox" class="new-control-input" id="checkboxTabungan">
                                <span class="new-control-indicator"></span><span data-toggle="modal"
                                    data-target="#syaratTabungan">Syarat
                                    & Ketentuan
                                    Berlaku</span>
                            </label>
                        </div>
                        {{-- <button type="submit" class="btn btn-primary mt-3" id="simpanTabungan" disabled>Simpan</button> --}}
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="syaratTabungan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body" style="background-color: white;">
                                    <div class="d-flex justify-content-center mt-4">
                                        <svg viewBox="0 0 24 24" width="100" height="100" stroke="currentColor" stroke-width="1.5"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="16" x2="12" y2="12"></line>
                                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                        </svg>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-justify">Dengan membaca syarat dan Ketentuan ini.</p>
                                        <p class="text-justify">
                                            Saya menyatakan memahami dan bersedia untuk dilakukan pengecekan data pribadi saya guna
                                            kepentingan pengajuan Kredit, Tabungan, dan atau Deposito yang saya ajukan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function openTab(evt, tabId) {
                const contents = document.querySelectorAll('.tab-content');
                const buttons = document.querySelectorAll('.tab-button');

                contents.forEach(content => content.classList.add('hidden'));
                buttons.forEach(button => button.classList.remove('active'));

                document.getElementById(tabId).classList.remove('hidden');
                evt.currentTarget.classList.add('active');
            }
        </script>
        <script>
            $('#depo_jangka_waktu').on('input',function () {
                let bulan = $('#depo_produk').val();
                let data = bulan.split('---');
                if (bulan || bulan!='') {
                    if (Number($('#depo_jangka_waktu').val()) > Number(data[1])) {
                        alert('Jangka Waktu Melebihi Ketentuan');
                        $('#depo_jangka_waktu').val(bulan[1]);
                    }
                }else{
                    $('#depo_jangka_waktu').val(null);
                    alert('Produk Deposito Masih Kosong');
                }
            })
        </script>

        <script>
            function openTab(evt, tabName) {
            // Sembunyikan semua tab content (jika ada)
            const tabContents = document.querySelectorAll(".tab-content");
            tabContents.forEach(tab => tab.style.display = "none");

            // Nonaktifkan semua tab button
            const tabButtons = document.querySelectorAll(".tab-button");
            tabButtons.forEach(btn => btn.classList.remove("active"));

            // Tampilkan tab yang diklik dan aktifkan tombolnya
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.classList.add("active");
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>



@endsection
