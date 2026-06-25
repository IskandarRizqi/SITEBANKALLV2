<footer class="footer">
    <div class="container footer-top">
      <div class="row gy-3">
        <div class="col-lg-5 col-md-6 footer-about">
          <img src="frontend/bprkotamagelang/assets/img/logo/logo1.png" alt="" style="width: 75%">

          <div class="pxn_footer_widget widget-nav-menu mt-3">
            <h6 class="footer_title" style="font-weight:600;">Jaringan Kantor</h6>
            <select id="pilihKantor" class="form-select mb-3" style="background-color:#ffffff; color:#462ced; text-transform:none;">
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
                  <p id="telpKantor" style="font-size:14px; margin-bottom:4px;"></p>
                  <div id="thumbnailContainer"></div>
              </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-3 footer-links">
          <h4>Hubungi Kami</h4>
          <ul>
            <li><i class="bi bi-phone" style="margin-right: 10px;"></i> <a href="tel:(0293) 314737">(0293) 314737</a></li>
            <li><i class="bi bi-envelope" style="margin-right: 10px;"></i> <a href="mailto:bpr_kota_magelang@yahoo.co.id">bpr_kota_magelang@yahoo.co.id</a></li>
            <li><i class="bi bi-people" style="margin-right: 10px;"></i> <a href="/pengaduan">Pengaduan Nasabah</a></li>
            <li><i class="bi bi-briefcase" style="margin-right: 10px;"></i> <a href="/rekrutmen">E-Recruitment</a></li>
            <li><i class="bi bi-whatsapp" style="margin-right: 10px;"></i> <a href="#">0823-1489-7649</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12">
          <p>BPR BKK Kota Magelang berizin dan diawasi oleh Otoritas Jasa Keuangan (OJK) serta merupakan peserta penjaminan LPS</p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">PT. BPR BKK Kota Magelang</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Supported by<a href=""> Antaruang</a>
      </div>
    </div>

  </footer>
