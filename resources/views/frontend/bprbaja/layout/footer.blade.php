  <style>
      /* Mobile Bottom Navigation */
      .mobile-bottom-nav {
          position: fixed;
          bottom: 0;
          left: 0;
          width: 100%;
          background: #ee6b25;
          /* warna hijau menyesuaikan website */
          z-index: 9999;
          border-top: 1px solid rgba(255, 255, 255, 0.2);
          padding: 10px 0;
      }

      .mobile-bottom-nav ul {
          display: flex;
          margin: 0;
          padding: 5px 0;
          list-style: none;
      }

      .mobile-bottom-nav ul li {
          flex: 1;
          text-align: center;
      }

      .mobile-bottom-nav ul li a {
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          color: #ffffff;
          font-size: 12px;
          text-decoration: none;
      }

      .mobile-bottom-nav ul li a i {
          font-size: 18px;
          margin-bottom: 2px;
      }

      .mobile-bottom-nav ul li a:hover {
          color: #2c0cbc;
      }
  </style>
  <footer class="footer-wrapper footer-layout2 space-top" style="background-color: #ee6b25">
      <div class="widget-area">
          <div class="container">

              <div class="row justify-content-between">
                  <div class="col-lg-4 col-xl-3">
                      <div class="widget footer-widget">
                          <div class="th-widget-about">
                              <div class="about-logo"><a href="index.html"><img
                                          src="{{ asset('frontend/bprbaja/assets/img/logo/logo.png') }}"
                                          style="width: 180px" alt="Atek"></a></div>
                              <p class="about-text" style="color: #fff">
                                  BPR Baja Mitra Sejahtera merupakan lembaga keuangan yang berkomitmen
                                  memberikan layanan perbankan terpercaya dengan produk tabungan, deposito,
                                  dan kredit untuk mendukung pertumbuhan ekonomi masyarakat.
                              </p>
                              <div class="th-social">
                                  {{-- <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>  --}}
                                  <a
                                      href="https://web.facebook.com/people/Bpr-Bahtera-Artha-Jaya/pfbid0svM89fCKTxw1ELRfPvVamaHswQBUo4phfmwVUnbbC1wKv1UVeEbwBhBFHZHZzL5vl/"><i
                                          class="fab fa-facebook-f"></i></a>
                                  {{-- <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>  --}}
                                  <a href="#"><i class="fab fa-whatsapp"></i></a>
                                  <a href="https://www.instagram.com/bank.baja/"><i class="fab fa-instagram"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-xl-auto">
                      <div class="widget widget_nav_menu footer-widget">
                          <h3 class="widget_title">Tautan Terkait</h3>
                          <div class="menu-all-pages-container">
                              <ul class="menu">
                                  <li style="color: #fff"><a href="/pengaduan" style="color: #fff">Pengaduan Nasabah</a>
                                  </li>
                                  <li style="color: #fff"><a href="/rekrutmen" style="color: #fff">Karir</a></li>
                                  {{-- <li style="color: #fff"><a href="/contact" style="color: #fff">Kontak</a></li> --}}
                                  <li style="color: #fff"><a href="/jaringankantor" style="color: #fff">Jaringan
                                          Kantor</a>
                                  </li>

                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-xl-auto">
                      <div class="widget footer-widget">
                          <h3 class="widget_title">Kontak Kami</h3>
                          <div class="th-widget-contact">
                              <div class="info-box_text" style="display:flex; align-items:center; gap:10px;">
                                  <div class="icon">
                                      <img src="{{ asset('frontend/bprbaja/assets/img/icon/phone.svg') }}"
                                          alt="img" style="width:20px;">
                                  </div>
                                  <div class="details">
                                      <p style="margin:0;">
                                          <a href="tel:+01234567890" class="info-box_link" style="color:#fff;">
                                              +0725529151
                                          </a>
                                      </p>
                                  </div>
                              </div>
                              <div class="info-box_text" style="display:flex; align-items:center; gap:10px;">
                                  <div class="icon">
                                      <img src="{{ asset('frontend/bprbaja/assets/img/icon/envelope.svg') }}"
                                          alt="img" style="width:20px;">
                                  </div>
                                  <div class="details">
                                      <p style="margin:0;">
                                          <a href="mailto:mailinfo00@atek.com" class="info-box_link"
                                              style="color:#fff;">
                                              bprbaja@gmail.com
                                          </a>
                                      </p>
                                  </div>
                              </div>
                              <div class="info-box_text" style="display:flex; align-items:flex-start; gap:10px;">
                                  <div class="icon">
                                      <img src="{{ asset('frontend/bprbaja/assets/img/icon/location-dot.svg') }}"
                                          alt="img" style="width:20px; margin-top:3px;">
                                  </div>
                                  <div class="details">
                                      <p style="margin:0;">
                                          <a href="https://maps.app.goo.gl/QyH2fFoJ9fii93mt7" target="_blank"
                                              style="color:#fff;">
                                              Jl. Proklamator Raya No.170 A, Bandar jaya Kec. Terbanggi Besar,
                                              Kabupaten Lampung
                                          </a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-xl-auto">
                      <div class="widget footer-widget">
                          <h3 class="widget_title">Jaringan Kantor</h3>
                          <!-- Nav -->
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
                  </div>
              </div>
          </div>
      </div>
      <div class="copyright-wrap">
          <div class="container">
              <div class="row justify-content-between align-items-center">
                  <div class="col-lg-6">
                      <p class="copyright-text">Copyright © <a href="index.html">BPR Baja</a>. Support By <a
                              href="" style="color: blue">Antar Uang</a>
                      </p>
                  </div>
                  <div class="col-lg-6 text-lg-end text-center">
                      <div class="footer-links">

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <nav class="mobile-bottom-nav d-block d-lg-none">
      <ul>
          <li><a href="/"><i class="fas fa-home"></i><span>Beranda</span></a></li>
          <li><a href="/kredit"><i class="fas fa-credit-card"></i><span>Kredit</span></a></li>
          <li><a href="/deposito"><i class="fas fa-coins"></i><span>Deposito</span></a></li>
          <li><a href="/tabungan"><i class="fas fa-piggy-bank"></i><span>Tabungan</span></a></li>
          <li><a href="/jaringankantor"><i class="fas fa-phone"></i><span>Kontak</span></a></li>
      </ul>
  </nav>


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
          document.getElementById('alamatKantor').innerHTML =
              `<span style="color:#fff;">${alamat}</span>`;

          document.getElementById('telpKantor').innerHTML =
              `<strong style="color:#fff;">Telp : </strong> 
         <a href="tel:${telp}" style="color:#fff;">${telp}</a>`;

          let googleLink = `https://www.google.com/maps?q=${lat},${lng}`;

          let thumbnailHTML = `
        <a href="${googleLink}" target="_blank">
            <img src="${thumb}" 
                 style="width:80%; height:70px; object-fit:cover; border-radius:8px; cursor:pointer; text-align:center"
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
