  <!-- start: Footer Section -->
      <footer class="tj-footer-section footer-4 section-gap-x">
       
        <div class="footer-main-area" style="padding-top: 0;">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="footer-menu">
                  <h3>BPR Multi Arthanusa</h3>
                  <hr>
                </div>
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col-xl-3 col-md-6">
                    <div class="footer-widget footer-col-4 widget-nav-menu wow fadeInUp" data-wow-delay=".3s">
                        <h5 class="title mb-2">Jaringan Kantor</h5>
                        <select id="pilihKantor" class="form-select mb-3"
                            style="background-color:#ffffff; color:#000; text-transform:none;">
                            @foreach ($kantorglobal as $kantor)
                                <option value="{{ $kantor->id }}" data-nama="{{ $kantor->kantor }}"
                                    data-alamat="{{ $kantor->alamat }}" data-telp="{{ $kantor->no_telp }}"
                                    data-lat="{{ $kantor->latitude }}" data-lng="{{ $kantor->longitude }}"
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
              <div class="col-xl-3 col-md-6">
                <div class="footer-widget footer-col-2 widget-nav-menu wow fadeInUp" data-wow-delay=".3s">
                  <h5 class="title mb-2">Hubungi Kami</h5>
                    <ul style="display: flex; flex-direction: column; gap: 10px;">
                      <li>
                        <a href="">
                        <i class="fa-light fa-headset fa-2xl"></i>
                        <div style="margin-left: 10px">
                          <b>Call Center</b>
                          <p style="font-size: 12px; margin-bottom: 0;">(0293) 591067</p>
                        </div>
                      </a>
                      </li>
                      <li>
                        <a href=""><i class="fa-light fa-envelope fa-2xl"></i>
                        <div style="margin-left: 10px">
                          <b>Email</b>
                          <p style="font-size: 12px; margin-bottom: 0;">multiarthanusa@yahoo.co.id</p>
                        </div>
                      </a>
                      </li>
                      <li>
                        <a href="/pengaduan"><i class="fa-light fa-hands-holding-child fa-2xl"></i>
                        <div style="margin-left: 5px">
                          <b>Customer Care</b>
                          <p style="font-size: 12px; margin-bottom: 0;">Pengaduan Nasabah</p>
                        </div>
                      </a>
                      </li>
                    </ul>
                  
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="footer-widget footer-col-3 widget-nav-menu wow fadeInUp" data-wow-delay=".5s">
                  <h5 class="title mb-2">Menu Lainnya</h5>
                  <ul>
                    <li><a href="/rekrutmen">Karir</a></li>
                    <!-- <li><a href="#">Pengaduan Nasabah</a></li>
                    <li><a href="#">Laporan</a></li> -->
                  </ul>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="footer-widget widget-contact style-2 wow fadeInUp" data-wow-delay=".7s">
                  <div class="footer-contact-info">
                    <div class="contact-item">
                      <p style="color: #000;">PT. BPR Multi Arthanusa berizin dan diawasi oleh Otoritas Jasa Keuangan</p>
                    </div>
                    <div class="contact-item">
                      <p style="color: #000;">PT. BPR Multi Arthanusa merupakan peserta penjaminan Lembaga Penjamin Simpanan</p>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tj-copyright-area-4">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="copyright-content-area">
                  <div class="copyright-text">
                    <p>&copy; <span>BPR Multi Arthanusa By.</span><a href="https://antaruang.com"
                        target="_blank"> Antar Uang</a> </p>
                  </div>
                  <div class="social-links style-2">
                    <ul>
                      <li><a href="https://www.facebook.com/multiarthanusa/" target="_blank"><i
                            class="fa-brands fa-facebook-f"></i></a>
                      </li>
                      <li><a href="https://www.instagram.com/multiarthanusa/" target="_blank"><i
                            class="fa-brands fa-instagram"></i></a>
                      </li>
                      <!-- <li><a href="https://x.com/" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                      <li><a href="https://www.linkedin.com/" target="_blank"><i
                            class="fa-brands fa-linkedin-in"></i></a>
                      </li> -->
                    </ul>
                  </div>
                  <div class="copyright-menu">
                    <ul>
                      <li><a href="/privasipolicy">Kebijakan Privasi</a></li>
                      <li><a href="/term">Syarat dan Ketentuan</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-shape-1">
          <img src="assets/images/shape/pattern-2.svg" alt="">
        </div>
        <div class="bg-shape-2">
          <img src="assets/images/shape/pattern-3.svg" alt="">
        </div>
      </footer>
      <!-- end: Footer Section -->
<script>
        function tampilkanKantor() {
            let select = document.getElementById('pilihKantor');
            let selected = select.options[select.selectedIndex];
    
            let nama = selected.getAttribute('data-nama');
            let alamat = selected.getAttribute('data-alamat');
            let telp = selected.getAttribute('data-telp');
            let lat = selected.getAttribute('data-lat');
            let lng = selected.getAttribute('data-lng');
    
            document.getElementById('alamatKantor').innerHTML = `<span style="color:#000;">${alamat}</span>`;
            document.getElementById('telpKantor').innerHTML =
                `<strong style="color:#000;">Telp : </strong><a href="tel:${telp}" style="color:#000;">${telp}</a>`;
    
            let googleLink = `https://www.google.com/maps?q=${lat},${lng}`;
        }
    
        document.getElementById('pilihKantor').addEventListener('change', tampilkanKantor);
        window.addEventListener('DOMContentLoaded', tampilkanKantor);
      </script>