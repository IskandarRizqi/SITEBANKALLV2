@extends('frontend.bpremas.layout.main')
@section('content')
<div id="sc-page-wrapper" class="uk-ef_newsletter">
	<div id="sc-page-content" data-uk-lightbox="animation: fade;toggle:a.lightbox-link">
		@php
		$headerImage = asset('frontend/bpremas/ofc1.png');
		$imgstrukturorganisasi1 = asset('frontend/bpremas/sto1.png');
		$imgstrukturorganisasi2= asset('frontend/bpremas/sto2.png');
		@endphp
		<section class="uk-hidden@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>

		</section>
		<section class="uk-hidden@l uk-visible@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>

		</section>
		<section class="uk-visible@l uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>

		</section>
		<section class=uk-section>
                    <div class=uk-container>
                        <div class=uk-grid data-uk-grid>
                            <div class="uk-width-1-3@m uk-visible@m uk-first-column">
                                <div class="uk-sticky-placeholder sf-hidden" style=height:0px;width:0px;margin:0px
                                    hidden></div>
                                <div class="active-sticky-zero-z-index uk-sticky"
                                    uk-sticky="end: !.uk-grid;offset:100;media:@m" style=position:sticky;top:100px>
                                    <ul class="single-post-subnav uk-nav uk-nav-default"
                                        uk-switcher="connect:#main-content-single-page;toggle:> li a.ef-content-switch"
                                        role=tablist aria-orientation=vertical>

                                        <li class=uk-active role=presentation>
                                            <a class="single-post-subnav-link ef-content-switch"
                                                href=https://www.bankbjb.co.id/# target aria-selected=true role=tab
                                                id=uk-switcher-113-tab-0 aria-controls=uk-switcher-113-tabpanel-0>
                                                <span class="single-post-subnav-link-icon uk-margin-right"></span>
                                                FAQ - Kartu Debit/ATM
                                            </a>
                                            <hr>
                                        </li>

                                        <li role=presentation>
                                            <a class="single-post-subnav-link ef-content-switch"
                                                href=https://www.bankbjb.co.id/# target aria-selected=false tabindex=-1
                                                role=tab id=uk-switcher-113-tab-1
                                                aria-controls=uk-switcher-113-tabpanel-1>
                                                <span class="single-post-subnav-link-icon uk-margin-right"></span>
                                                FAQ - Aplikasi DIGI Mobile
                                            </a>
                                            <hr>
                                        </li>

                                        <li role=presentation>
                                            <a class="single-post-subnav-link ef-content-switch"
                                                href=https://www.bankbjb.co.id/# target aria-selected=false tabindex=-1
                                                role=tab id=uk-switcher-113-tab-2
                                                aria-controls=uk-switcher-113-tabpanel-2>
                                                <span class="single-post-subnav-link-icon uk-margin-right"></span>
                                                FAQ - Gagal Transaksi
                                            </a>
                                            <hr>
                                        </li>

                                        <li role=presentation>
                                            <a class="single-post-subnav-link ef-content-switch"
                                                href=https://www.bankbjb.co.id/# target aria-selected=false tabindex=-1
                                                role=tab id=uk-switcher-113-tab-3
                                                aria-controls=uk-switcher-113-tabpanel-3>
                                                <span class="single-post-subnav-link-icon uk-margin-right"></span>
                                                FAQ - Informasi Penyesuaian Status Rekening Giro dan Tabungan
                                            </a>
                                            <hr>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-hidden@m sf-hidden">


                            </div>
                            <div class=uk-width-2-3@m>
                                <ul class=uk-switcher id=main-content-single-page role=presentation
                                    style="touch-action:pan-y pinch-zoom">

                                    <li class=uk-active id=uk-switcher-113-tabpanel-0 role=tabpanel
                                        aria-labelledby=uk-switcher-117-tab-0>
                                        <div data-subnav-id=bdc4ea9a-72dd-4927-d310-08dadd5e8e03
                                            class="data-uk-content_builder_render blog-subnav-content content_builder_render"
                                            data-uk-content_builder_render data-ef-uid=ef-uid-1784981099787-27>
                                            <div class="uk-section-default uk-section uk-padding-remove-top">




                                                <div class=uk-container>



                                                    <div class="uk-grid uk-grid-stack" data-uk-grid
                                                        data-uk-scrollspy-class>
                                                        <div class="uk-width-1-1@m uk-width-1-1@s uk-first-column">
                                                            <ul uk-accordion class=uk-accordion>

                                                                <li class=uk-open>
                                                                    <a class=uk-accordion-title
                                                                        href=https://www.bankbjb.co.id/#
                                                                        id=uk-accordion-123-title-0 role=button
                                                                        aria-controls=uk-accordion-123-content-0
                                                                        aria-expanded=true aria-disabled=false>Kartu
                                                                        Debit/ATM Tertelan</a>
                                                                    <div class=uk-accordion-content
                                                                        id=uk-accordion-123-content-0 role=region
                                                                        aria-labelledby=uk-accordion-123-title-0>
                                                                        <ul>
                                                                            <li><strong>Apa langkah pertama yang harus
                                                                                    diakukan ketika Kartu Debit/ATM
                                                                                    tertelan?</strong>
                                                                                <ul>
                                                                                    <li>Hal pertama yang harus segera
                                                                                        dilakukan adalah dengan
                                                                                        melakukan pemblokiran Kartu ATM
                                                                                        melalui <strong>bjb</strong>
                                                                                        <em>call</em> 14049 atau melalui
                                                                                        petugas <em>Customer
                                                                                            Service</em> pada jaringan
                                                                                        kantor bank <strong>bjb</strong>
                                                                                        terdekat.
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><strong>Bagaimana cara blokir Debit/ATM
                                                                                    melalui bjb <em>call</em> 14049
                                                                                    ?</strong>
                                                                                <ul>
                                                                                    <li>Hubungi <strong>bjb</strong>
                                                                                        <em>call </em>dinomor 14049
                                                                                    </li>
                                                                                    <li>Hubungi <strong>bjb</strong>
                                                                                        <em>call</em> dinomor
                                                                                        +622180631232 (jika nasabah
                                                                                        berada di luar negeri)
                                                                                    </li>
                                                                                    <li>Tekan 1 (satu) untuk layanan
                                                                                        dalam bahasa Indonesia</li>
                                                                                    <li>Tekan 0 untuk berbicara dengan
                                                                                        petugas <strong>bjb</strong>
                                                                                    </li>
                                                                                    <li>Petugas <strong>bjb</strong>
                                                                                        <em>call</em> akan melakukan
                                                                                        verifikasi data dan pemblokiran
                                                                                        pada Kartu ATM yang tertelan
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><strong>Bagaimana cara blokir Kartu
                                                                                    Debit/ATM melalui petugas
                                                                                    <em>Customer Service</em> pada
                                                                                    jaringan kantor bank bjb
                                                                                    terdekat?</strong>
                                                                                <ul>
                                                                                    <li>Pemilik rekening membawa dokumen
                                                                                        seperti Buku Tabungan dan E-KTP
                                                                                    </li>
                                                                                    <li>Petugas <em>Customer
                                                                                            Service</em> akan melakukan
                                                                                        verifikasi data dan pemblokiran
                                                                                        pada Kartu ATM yang tertelan
                                                                                    </li>
                                                                                    <li>Petugas <em>Customer
                                                                                            Service</em> akan membuatkan
                                                                                        Kartu ATM baru</li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><strong>Apakah ada biaya penggantian
                                                                                    Kartu Debit/ATM yang tertelan?
                                                                                </strong>
                                                                                <ul>
                                                                                    <li>BIaya penggantian Kartu ATM
                                                                                        tertelan sebesar Rp. 30.000,-
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>

                                                                <li>
                                                                    <a class=uk-accordion-title
                                                                        href=https://www.bankbjb.co.id/#
                                                                        id=uk-accordion-123-title-1 role=button
                                                                        aria-controls=uk-accordion-123-content-1
                                                                        aria-expanded=false aria-disabled=false>Kartu
                                                                        Debit/ATM Hilang</a>
                                                                     <div class=uk-accordion-content
                                                                        id=uk-accordion-134-content-2 role=region
                                                                        aria-labelledby=uk-accordion-134-title-2>
                                                                        <ul>
                                                                            <li><strong>Apa yang menyebabkan Kartu
                                                                                    Debit/ATM terblokir?</strong>
                                                                                <ul>
                                                                                    <li>Kartu ATM/Debit akan terblokir
                                                                                        jika salah memasukan PIN
                                                                                        sebanyak 3 (tiga) kali secara
                                                                                        berturut-turut pada saat
                                                                                        melakukan transaksi melalui
                                                                                        Mesin ATM</li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><strong>Bagaimana cara mengaktifkan
                                                                                    kembali Kartu Debit/ATM yang
                                                                                    terblokir?</strong>
                                                                                <ul>
                                                                                    <li>Pemilik rekening dapat
                                                                                        mengunjungi jaringan kantor bank
                                                                                        <strong>bjb</strong> terdekat
                                                                                        dengan membawa dokumen seperti
                                                                                        Buku Tabungan, Kartu ATM dan
                                                                                        E-KTP</li>
                                                                                    <li>Petugas <em>Customer
                                                                                            Service</em> akan melakukan
                                                                                        verifikasi data dan mengaktifkan
                                                                                        kembali Kartu ATM/Debit</li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><strong>Apakah ada biaya untuk
                                                                                    mengaktifkan kembali Kartu Debit/ATM
                                                                                    yang terblokir?</strong>
                                                                                <ul>
                                                                                    <li>Untuk mengaktifkan kembali Kartu
                                                                                        ATM/Debit yang terblokir tidak
                                                                                        dikenakan biaya</li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
																					

                                                              

                                                            </ul>





                                                        </div>

                                                    </div>


                                                </div>



                                            </div>
                                        </div>
                                    </li>
												

                                    <li class=sf-hidden id=uk-switcher-113-tabpanel-1 role=tabpanel
                                        aria-labelledby=uk-switcher-117-tab-1>
													 <div class="uk-width-1-1@m uk-width-1-1@s uk-first-column">

                                                            <ul uk-accordion class=uk-accordion>

                                                                <li class=uk-open>
                                                                    <a class=uk-accordion-title
                                                                        href=https://www.bankbjb.co.id/#
                                                                        id=uk-accordion-127-title-0 role=button
                                                                        aria-controls=uk-accordion-127-content-0
                                                                        aria-expanded=true aria-disabled=false>Daftar
                                                                        DIGI Mobile</a>
                                                                    <div class=uk-accordion-content
                                                                        id=uk-accordion-127-content-0 role=region
                                                                        aria-labelledby=uk-accordion-127-title-0>
                                                                        <ul>
                                                                            <li><strong>Dimana saja nasabah bisa
                                                                                    mendaftarkan aplikasi DIGI
                                                                                    Mobile?</strong>
                                                                                <ul>
                                                                                    <li>Nasabah dapat mendaftarkan
                                                                                        layanan DIGI <em>Mobile</em>
                                                                                        yang terdapat pada aplikasi DIGI
                                                                                        by bank
                                                                                        <strong>bjb</strong><em>&nbsp;</em>melalui
                                                                                        Mesin ATM
                                                                                        bank&nbsp;<strong>bjb</strong>&nbsp;atau
                                                                                        melalui petugas <em>Customer
                                                                                            Service</em> di jaringan
                                                                                        kantor bank <strong>bjb</strong>
                                                                                        terdekat</li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><strong>Bagaimana cara mendaftarkan DIGI
                                                                                    Mobile melalui Mesin ATM bank
                                                                                    bjb?</strong>
                                                                                <ul>
                                                                                    <li>Masukan Kartu ATM dan Nomor PIN
                                                                                    </li>
                                                                                    <li>Pilih Transaksi Lainnya</li>
                                                                                    <li>Pilih
                                                                                        Daftar&nbsp;<em>E-Banking</em>
                                                                                    </li>
                                                                                    <li>Pilih&nbsp;<em>Mobile
                                                                                            Banking</em>(<strong>bjb</strong>&nbsp;<em>Mobile</em>)
                                                                                    </li>
                                                                                    <li>Pilih Tabungan dan tekan setuju
                                                                                    </li>
                                                                                    <li>Masukan nomor handphone yang
                                                                                        sesuai dengan nomor handphone
                                                                                        pada saat pembukaan rekening
                                                                                    </li>
                                                                                    <li>Masukan kembali nomor handphone
                                                                                        sebelumnya</li>
                                                                                    <li>Pastikan ketersediaan pulsa
                                                                                        untuk menerima Kode Aktivasi
                                                                                        pada
                                                                                        saat&nbsp;<em>login</em>pada
                                                                                        aplikasi&nbsp;DIGI by
                                                                                        bank<strong> bjb</strong></li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><strong>Bagaimana cara mendaftarkan DIGI
                                                                                    Mobile melalui petugas Customer
                                                                                    Service di jaringan kantor bank
                                                                                    bjb?</strong>
                                                                                <ul>
                                                                                    <li>Pemilik rekening membawa dokumen
                                                                                        seperti Buku Tabungan, Kartu ATM
                                                                                        dan E-KTP</li>
                                                                                    <li>Petugas <em>Customer
                                                                                            Service</em> akan melakukan
                                                                                        verifikasi data dan memandu
                                                                                        nasabah untuk mendaftarkan
                                                                                        aplikasi DIGI <em>Mobile</em>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>

                                                                <li>
                                                                    <a class=uk-accordion-title
                                                                        href=https://www.bankbjb.co.id/#
                                                                        id=uk-accordion-127-title-1 role=button
                                                                        aria-controls=uk-accordion-127-content-1
                                                                        aria-expanded=false aria-disabled=false>Aktivasi
                                                                        DIGI Mobile</a>
                                                                    <div class="uk-accordion-content sf-hidden" hidden
                                                                        id=uk-accordion-127-content-1 role=region
                                                                        aria-labelledby=uk-accordion-127-title-1>

                                                                    </div>
                                                                </li>

                                                               

                                                            </ul>





                                                        </div>

                                    </li>

                                   <li class=uk-active id=uk-switcher-115-tabpanel-1 role=tabpanel
                                        aria-labelledby=uk-switcher-119-tab-1>
                                        <div data-subnav-id=90836e81-b85f-4bb6-d311-08dadd5e8e03
                                            class="data-uk-content_builder_render blog-subnav-content content_builder_render"
                                            data-uk-content_builder_render data-ef-uid=ef-uid-1784987607741-28>
                                            <div class="uk-section-default uk-section uk-padding-remove-top">




                                                <div class=uk-container>



                                                    <div class="uk-grid uk-grid-stack" data-uk-grid
                                                        data-uk-scrollspy-class>


                                                        <div class="uk-width-1-1@m uk-width-1-1@s uk-first-column">

                                                            <ul uk-accordion class=uk-accordion>

                                                                <li class=uk-open>
                                                                    <a class=uk-accordion-title
                                                                        href=https://www.bankbjb.co.id/#
                                                                        id=uk-accordion-127-title-0 role=button
                                                                        aria-controls=uk-accordion-127-content-0
                                                                        aria-expanded=true aria-disabled=false>Daftar
                                                                        DIGI Mobile</a>
                                                                    <div class=uk-accordion-content
                                                                        id=uk-accordion-127-content-0 role=region
                                                                        aria-labelledby=uk-accordion-127-title-0>
                                                                        <ul>
                                                                            <li><strong>Dimana saja nasabah bisa
                                                                                    mendaftarkan aplikasi DIGI
                                                                                    Mobile?</strong>
                                                                                <ul>
                                                                                    <li>Nasabah dapat mendaftarkan
                                                                                        layanan DIGI <em>Mobile</em>
                                                                                        yang terdapat pada aplikasi DIGI
                                                                                        by bank
                                                                                        <strong>bjb</strong><em>&nbsp;</em>melalui
                                                                                        Mesin ATM
                                                                                        bank&nbsp;<strong>bjb</strong>&nbsp;atau
                                                                                        melalui petugas <em>Customer
                                                                                            Service</em> di jaringan
                                                                                        kantor bank <strong>bjb</strong>
                                                                                        terdekat</li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><strong>Bagaimana cara mendaftarkan DIGI
                                                                                    Mobile melalui Mesin ATM bank
                                                                                    bjb?</strong>
                                                                                <ul>
                                                                                    <li>Masukan Kartu ATM dan Nomor PIN
                                                                                    </li>
                                                                                    <li>Pilih Transaksi Lainnya</li>
                                                                                    <li>Pilih
                                                                                        Daftar&nbsp;<em>E-Banking</em>
                                                                                    </li>
                                                                                    <li>Pilih&nbsp;<em>Mobile
                                                                                            Banking</em>(<strong>bjb</strong>&nbsp;<em>Mobile</em>)
                                                                                    </li>
                                                                                    <li>Pilih Tabungan dan tekan setuju
                                                                                    </li>
                                                                                    <li>Masukan nomor handphone yang
                                                                                        sesuai dengan nomor handphone
                                                                                        pada saat pembukaan rekening
                                                                                    </li>
                                                                                    <li>Masukan kembali nomor handphone
                                                                                        sebelumnya</li>
                                                                                    <li>Pastikan ketersediaan pulsa
                                                                                        untuk menerima Kode Aktivasi
                                                                                        pada
                                                                                        saat&nbsp;<em>login</em>pada
                                                                                        aplikasi&nbsp;DIGI by
                                                                                        bank<strong> bjb</strong></li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><strong>Bagaimana cara mendaftarkan DIGI
                                                                                    Mobile melalui petugas Customer
                                                                                    Service di jaringan kantor bank
                                                                                    bjb?</strong>
                                                                                <ul>
                                                                                    <li>Pemilik rekening membawa dokumen
                                                                                        seperti Buku Tabungan, Kartu ATM
                                                                                        dan E-KTP</li>
                                                                                    <li>Petugas <em>Customer
                                                                                            Service</em> akan melakukan
                                                                                        verifikasi data dan memandu
                                                                                        nasabah untuk mendaftarkan
                                                                                        aplikasi DIGI <em>Mobile</em>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>

                                                                <li>
                                                                    <a class=uk-accordion-title
                                                                        href=https://www.bankbjb.co.id/#
                                                                        id=uk-accordion-127-title-1 role=button
                                                                        aria-controls=uk-accordion-127-content-1
                                                                        aria-expanded=false aria-disabled=false>Aktivasi
                                                                        DIGI Mobile</a>
                                                                    <div class="uk-accordion-content sf-hidden" hidden
                                                                        id=uk-accordion-127-content-1 role=region
                                                                        aria-labelledby=uk-accordion-127-title-1>

                                                                    </div>
                                                                </li>

                                                               
                                                            </ul>





                                                        </div>

                                                    </div>


                                                </div>



                                            </div>
                                        </div>
                                    </li>

                                    <li class=uk-active id=uk-switcher-115-tabpanel-2 role=tabpanel
                                        aria-labelledby=uk-switcher-119-tab-2>
                                        <div data-subnav-id=7f5ca23a-7ad4-44ab-d312-08dadd5e8e03
                                            class="data-uk-content_builder_render blog-subnav-content content_builder_render"
                                            data-uk-content_builder_render data-ef-uid=ef-uid-1784987607742-29>
                                            <div class="uk-section-default uk-section uk-padding-remove-top">




                                                <div class=uk-container>



                                                    <div class="uk-grid uk-grid-stack" data-uk-grid
                                                        data-uk-scrollspy-class>


                                                        <div class="uk-width-1-1@m uk-width-1-1@s uk-first-column">








                                                            <ul uk-accordion class=uk-accordion>

                                                                <li class=uk-open>
                                                                    <a class=uk-accordion-title
                                                                        href=https://www.bankbjb.co.id/#
                                                                        id=uk-accordion-129-title-0 role=button
                                                                        aria-controls=uk-accordion-129-content-0
                                                                        aria-expanded=true aria-disabled=false>Gagal
                                                                        Tarik Tunai</a>
                                                                    <div class=uk-accordion-content
                                                                        id=uk-accordion-129-content-0 role=region
                                                                        aria-labelledby=uk-accordion-129-title-0>
                                                                        <ul>
                                                                            <li><strong>Bagaimana jika uang tidak keluar
                                                                                    tapi saldo rekening terdebet ketika
                                                                                    tarik tunai di Mesin ATM?</strong>
                                                                                <ul>
                                                                                    <li>Nasabah dapat melakukan klaim
                                                                                        Gagal Tarik Tunai &nbsp;dengan
                                                                                        menghubungi <strong>bjb</strong>
                                                                                        <em>call</em> di nomor 14049
                                                                                        atau melalui petugas
                                                                                        <em>Customer Service</em> pada
                                                                                        jaringan kantor bank
                                                                                        <strong>bjb</strong> terdekat
                                                                                        dengan membawa Buku Tabungan,
                                                                                        Kartu ATM dan E-KTP</li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><strong>Bagaimana cara Klaim Gagal Tarik
                                                                                    Tunai melalui bjb <em>call</em>
                                                                                    14049 ?</strong>
                                                                                <ul>
                                                                                    <li>Hubungi <strong>bjb</strong>
                                                                                        <em>call </em>dinomor 14049</li>
                                                                                    <li>Hubungi <strong>bjb</strong>
                                                                                        <em>call</em> dinomor
                                                                                        +622180631232 (jika nasabah
                                                                                        berada di luar negeri)</li>
                                                                                    <li>Tekan 1 (satu) untuk layanan
                                                                                        dalam bahasa Indonesia</li>
                                                                                    <li>Tekan 0 untuk berbicara dengan
                                                                                        petugas <strong>bjb</strong>
                                                                                    </li>
                                                                                    <li>Petugas <strong>bjb</strong>
                                                                                        <em>call</em> akan melakukan
                                                                                        verifikasi data terkait klaim
                                                                                        Gagal Tarik Tunai</li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><strong>Bagaimana cara Klaim Gagal Tarik
                                                                                    Tunai melalui melalui petugas
                                                                                    <em>Customer Service</em> pada
                                                                                    jaringan kantor bank bjb
                                                                                    terdekat?</strong>
                                                                                <ul>
                                                                                    <li>Pemilik rekening membawa dokumen
                                                                                        seperti Buku Tabungan, Kartu ATM
                                                                                        dan E-KTP</li>
                                                                                    <li>Petugas <em>Customer
                                                                                            Service</em> akan melakukan
                                                                                        verifikasi data terkait klaim
                                                                                        Gagal Tarik Tunai</li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><strong>Berapa lama SLA penyelesaian
                                                                                    Klaim Gagal Tarik Tunai?</strong>
                                                                                <ul>
                                                                                    <li>Untuk proses klaim Gagal Tarik
                                                                                        Tunai membutuhkan waktu maksimal
                                                                                        <strong><u>14 hari kerja (tidak
                                                                                                termasuk hari
                                                                                                libur</u>)</strong> dari
                                                                                        tanggal pelaporan namun proses
                                                                                        klaim dapat selesai sebelum
                                                                                        tanggal maksimal yang ditentukan
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>

                                                                <li>
                                                                    <a class=uk-accordion-title
                                                                        href=https://www.bankbjb.co.id/#
                                                                        id=uk-accordion-129-title-1 role=button
                                                                        aria-controls=uk-accordion-129-content-1
                                                                        aria-expanded=false aria-disabled=false>Gagal
                                                                        Transfer</a>
                                                                    <div class="uk-accordion-content sf-hidden" hidden
                                                                        id=uk-accordion-129-content-1 role=region
                                                                        aria-labelledby=uk-accordion-129-title-1>

                                                                    </div>
                                                                </li>

                                                              

                                                            </ul>





                                                        </div>

                                                    </div>


                                                </div>



                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
	</div>
</div>
@endsection