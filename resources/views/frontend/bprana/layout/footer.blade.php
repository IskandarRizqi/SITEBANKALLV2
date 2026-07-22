<!-- start: Footer -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<footer class="pxn-footer pxn-footer-3 overflow-hidden" style="background-color: #0a1c92">

    <div class="footer_widgets">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer_widgets_wrap">
                        <div class="pxn_footer_widget footer_info_widget">
                            <div class="footer_logo">
                                <a class="pxn_site_logo" href="index.html">
                                    <img src="{{ asset('frontend/bprana/assets/images/logo/logo.png') }}" alt="Logo"
                                        style="width:230px !important; max-width:none !important; height:auto; background-color: white; padding: 5px 10px; border-radius: 5px;">
                                </a>
                            </div>
                            <div class="footer_desc">Kami merupakan salah satu BPR yang berkembang dengan kondisi
                                sehat, berdiri sejak 1990. Kami melayani
                                UMKM untuk membantu meningkatkan ekonomi dan kebutuhan masyarakat.
                            </div>


                        </div>

                        <div class="footer_widgets_inner">
                            <div class="pxn_footer_widget widget-nav-menu">
                                <h2 class="footer_title">Tautan Terkait</h2>

                                <ul>
                                    <li><a href="/rekrutmen">Karir</a></li>
                                    <li><a href="/pengaduan">Pengaduan Nasabah</a></li>
                                    {{-- <li><a href="/contact">Kontak</a></li> --}}
                                    <li><a href="/jaringankantor">Jaringan Kantor</a></li>

                                </ul>
                            </div>

                            <div class="pxn_footer_widget widget-nav-menu">
                                <h2 class="footer_title">Jaringan Kantor</h2>
                                <select id="pilihKantor" class="form-select mb-3"
                                    style="background-color:#ffffff; color:#462ced; text-transform:none;">

                                    @foreach ($kantorglobal as $kantor)
                                        <option value="{{ $kantor->id }}" data-nama="{{ $kantor->kantor }}"
                                            data-alamat="{{ $kantor->alamat }}" data-telp="{{ $kantor->no_telp }}"
                                            data-lat="{{ $kantor->latitude }}" data-lng="{{ $kantor->longitude }}"
                                            data-thumb="/recfil?display=true&rf={{ $kantor->thumbnail }}"
                                            {{ strtolower($kantor->kantor) == 'kantor pusat' ? 'selected' : '' }}>
                                            {{ $kantor->kantor }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="detailKantor">
                                    <p id="namaKantor" style="font-weight:600; margin-bottom:4px;"></p>
                                    <p id="alamatKantor" style="font-size:14px; margin-bottom:4px;"></p>
                                    <p id="telpKantor" style="font-size:14px; margin-bottom:10px;"></p>

                                    <div id="thumbnailContainer"></div>
                                </div>
                            </div>
                            <div class="pxn_footer_widget footer_contact_info">
                                <h2 class="footer_title">Media Sosial</h2>
                                <ul class="pxn_socials_2"
                                    style="display:flex;
                                    align-items:center;
                                    gap:12px;
                                    list-style:none;
                                    padding:0;
                                    margin:0;">

                                    <li style="margin:0; padding:0; display:flex;">
                                        <a class="social"
                                            href="https://api.whatsapp.com/send/?phone=082223755562&text&type=phone_number&app_absent=0"
                                            target="_blank"
                                            style="display:flex;
                                            align-items:center;
                                            justify-content:center;
                                            width:50px;
                                            height:50px;
                                            border-radius:50%;
                                            background:#25D366;
                                            color:#fff;
                                            font-size:22px;
                                            line-height:1;">

                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                    </li>

                                    <li style="margin:0; padding:0; display:flex;">
                                        <a class="social" href="https://www.instagram.com/bpr_ana/?hl=id"
                                            target="_blank"
                                            style="display:flex;
                                            align-items:center;
                                            justify-content:center;
                                            width:50px;
                                            height:50px;
                                            border-radius:50%;
                                            background:#E1306C;
                                            color:#fff;
                                            font-size:22px;
                                            line-height:1;">

                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="footer_bottom_inner">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div
                                        class="footer_bottom_wrap d-flex column-gap-4 row-gap-3 flex-wrap align-items-center justify-content-center justify-content-md-between">
                                        <div class="pxn_copyright_text">&copy; <span>Bpr Artha Nusantara Abadi</span>
                                            Support By
                                            <a href="https://antaruang.com/" style="color: #db0b0b"> Antar uang.</a>
                                        </div>

                                        <ul class="pxn_socials_2" style="display:flex; flex-wrap: nowrap; align-items:center; gap:12px; list-style:none; padding:0; margin:0;">
                                            <li>
                                                <a class="social" href="https://www.ojk.go.id/Default.aspx"
                                                    target="_blank">
                                                    <img src="{{ asset('frontend/bprana/assets/images/profil/ojk.jpeg') }}"
                                                        alt="OJK"
                                                        style="width:150px; height:72px; object-fit:fill; border-radius: 10px;">
                                                </a>
                                            </li>

                                            <li>
                                                <a class="social" href="https://lps.go.id/" target="_blank">
                                                    <img src="{{ asset('frontend/bprana/assets/images/profil/lps.jpg') }}"
                                                        alt="LPS"
                                                        style="width:150px; height:72px; object-fit:fill; border-radius: 10px;">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="social" href="#" target="_blank">
                                                    <img src="{{ asset('frontend/bprana/assets/images/profil/laps.png') }}"
                                                        alt="LAPS"
                                                        style="width:150px; height:72px; object-fit:fill; border-radius: 10px;">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="social" href="https://www.bi.go.id/id/default.aspx"
                                                    target="_blank"
                                                    style="background:#fff; padding:10px; border-radius:8px; display:flex; align-items:center; justify-content:center;">

                                                    <img src="{{ asset('frontend/bprana/assets/images/profil/bi.png') }}"
                                                        alt="BI"
                                                        style="width:130px; height:50px; object-fit:fill;">
                                                </a>
                                            </li>

                                            <li>
                                                <a class="social" href="https://www.ppatk.go.id/" target="_blank"
                                                    style="background:#fff; padding:10px; border-radius:8px; display:flex; align-items:center; justify-content:center;">

                                                    <img src="{{ asset('frontend/bprana/assets/images/profil/ppatk.png') }}"
                                                        alt="PPATK"
                                                        style="width:130px; height:50px; object-fit:fill;">
                                                </a>
                                            </li>
                                        </ul>

                                        <ul class="pxn_footer_bottom_menu">
                                            {{-- <li><a href="#">Career</a></li>
                                             <li><a href="#">Privacy & Policy</a></li>
                                             <li><a href="#">FAQS</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    function tampilkanKantor() {

        let select = document.getElementById('pilihKantor');
        let selected = select.options[select.selectedIndex];

        let nama = selected.getAttribute('data-nama');
        let alamat = selected.getAttribute('data-alamat');
        let telp = selected.getAttribute('data-telp');
        let lat = selected.getAttribute('data-lat');
        let lng = selected.getAttribute('data-lng');
        let thumb = selected.getAttribute('data-thumb');

        //    document.getElementById('namaKantor').innerText = nama;
        document.getElementById('alamatKantor').innerText = alamat;
        document.getElementById('alamatKantor').style.color = '#fff';

        document.getElementById('telpKantor').innerHTML =
            `<span style="color:#fff;">
        <strong>Telp : </strong> 
        <a href="tel:${telp}" style="color:#fff; text-decoration:none;">${telp}</a>
    </span>`;

        let googleLink = `https://www.google.com/maps?q=${lat},${lng}`;

        let thumbnailHTML = `
        <a href="${googleLink}" target="_blank">
            <img src="${thumb}" 
                 style="width:100%; height:70px; object-fit:cover; border-radius:8px; cursor:pointer; text-align:center"
                 alt="Lokasi Kantor">
        </a>
    `;

        document.getElementById('thumbnailContainer').innerHTML = thumbnailHTML;
    }

    // Ketika dropdown berubah
    document.getElementById('pilihKantor')
        .addEventListener('change', tampilkanKantor);

    // Saat pertama kali halaman dibuka (default Kantor Pusat langsung tampil)
    window.addEventListener('DOMContentLoaded', tampilkanKantor);
</script>

<!-- end: Footer -->
