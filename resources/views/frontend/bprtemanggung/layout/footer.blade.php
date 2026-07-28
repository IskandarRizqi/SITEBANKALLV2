<footer class="footer">
  <div style="text-align: center;">
    <h3><b>Informasi Penjaminan LPS</b></h3>
    <p>
      PT.BPR BKK TEMANGGUNG merupakan peserta penjaminan LPS.<br>
      Maksimum nilai simpanan yang dijamin oleh LPS adalah Rp.2 Miliar per nasabah per bank.<br>
      Untuk informasi tingkat suku bunga penjamin LPS dapat diakses di www.lps.go.id
    </p>
  </div>
  <div class="container footer-top">
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="/" class="d-flex align-items-center">
          <span class="sitename">PT. BPR BKK Temanggung (Perseroda)</span>
        </a>
        <div class="footer-contact pt-3">
          <p>Jl. Suyoto No.3A, Rolikuran, Kertosari, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56212</p>
        </div>

        <div class="pxn_footer_widget widget-nav-menu mt-3">
          <h6 class="footer_title" style="font-weight:600;">Jaringan Kantor</h6>
          <select id="pilihKantor" class="form-select mb-3"
            style="background-color:#ffffff; color:#462ced; text-transform:none;">
            @foreach ($kantorglobal as $kantor)
            <option value="{{ $kantor->id }}" data-nama="{{ $kantor->kantor }}" data-alamat="{{ $kantor->alamat }}"
              data-telp="{{ $kantor->no_telp }}" data-lat="{{ $kantor->latitude }}" data-lng="{{ $kantor->longitude }}"
              data-thumb="/recfil?display=true&rf={{ $kantor->thumbnail }}" {{ strtolower($kantor->kantor) == 'kantor
              pusat' ? 'selected' : '' }}>
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

      <div class="col-lg-3 col-md-3 footer-links">
        <h4>Hubungi Kami</h4>
        <ul>
          <li><i class="bi bi-phone" style="margin-right: 10px;"></i> <a href="tel:(0293) 492821">(0293) 492821</a></li>
          <li><i class="bi bi-envelope" style="margin-right: 10px;"></i> <a
              href="mailto:kpotemanggung@yahoo.com">kpotemanggung@yahoo.com</a></li>
          <li><i class="bi bi-people" style="margin-right: 10px;"></i> <a href="/pengaduan">Pengaduan Nasabah</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-12">
        <h4>Ikuti Kami</h4>
        <div class="social-links d-flex">
          <a href="https://twitter.com/bprbkktmg"><i class="bi bi-twitter-x"></i></a>
          <a href="https://www.facebook.com/bprbkktmg.perseroda.7""><i class=" bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/ptbprbkktemanggung/?hl=id"><i class="bi bi-instagram"></i></a>
          <a href="https://wa.me/6285842843708"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-md-12">
        <p>BPR BKK Temanggung berizin dan diawasi oleh Otoritas Jasa Keuangan (OJK) serta merupakan peserta penjaminan
          LPS</p>
      </div>

    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p>© <span>Copyright</span> <strong class="px-1 sitename">PT. BPR BKK Temanggung (Perseroda)</strong> <span>All
        Rights Reserved</span></p>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you've purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
      Supported by<a href=""> Antaruang</a>
    </div>
  </div>

</footer>