 <style>
     .visitor-stats {
         background-color: #ef5a10;
         padding: 20px;
         border-radius: 8px;
         box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
         text-align: left;

         max-width: 200px;
         /* batas lebar */
         margin: 15 auto;
         
     }

     .visitor-stats h2 {
         font-size: 16px;
         /* Diperkecil dari 24px */
         font-weight: 700;
         color: #333;
         margin-bottom: 10px;
     }

     .visitor-stats p {
         font-size: 12px;
         /* Diperkecil dari 14px */
         color: #666;
         margin-bottom: 20px;
     }

     .stats-container {
         display: flex;
         justify-content: space-evenly;
         /* Distribusi yang lebih merata untuk 2 item */
         gap: 10px;
     }

     .stat-item {
         display: flex;
         flex-direction: column;
         align-items: center;
         text-align: center;
     }

     .stat-item i {
         font-size: 22px;
         /* Diperkecil dari 28px */
         color: #cb201d;
         margin-bottom: 8px;
     }

     .stat-info .stat-number {
         display: block;
         font-size: 18px;
         /* Diperkecil dari 28px */
         font-weight: 700;
         color: #333;
         line-height: 1;
     }

     .stat-info p {
         font-size: 10px;
         /* Diperkecil dari 12px */
         color: #888;
         margin: 5px 0 0;
     }
 </style>
 <!-- start: Footer -->
 <footer class="pxn-footer pxn-footer-3 overflow-hidden" style="background-color: #009541">

     <div class="footer_widgets">
         <div class="container">
             <div class="row">
                 <div class="col">
                     <div class="footer_widgets_wrap">
                         <div class="pxn_footer_widget footer_info_widget">
                             <div class="footer_logo">
                                 <a href="index.html" class="logo"><img
                                         src="frontend/bprsuryakencana/assets/images/logo/logo.png" alt="LOGO"
                                         style="width: 80px"></a>
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
                                     <li><a href="https://wa.me/6281336782553" target="_blank">Kontak</a></li>
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
                                 <h2 class="footer_title">Statistik Pengunjung</h2>

                                 <div class="visitor-stats">

                                     <div class="stats-container">
                                         <div class="stat-item">
                                             <i class="fas fa-users"></i>
                                             <div class="stat-info">
                                                 <span class="stat-number" data-target="{{ $total_visitor }}"
                                                     style="color: #fff">0</span>
                                                 <p style="color: #fff">Total Pengunjung</p>
                                             </div>
                                         </div>
                                         <div class="stat-item">
                                             <i class="fas fa-user-check"></i>
                                             <div class="stat-info">
                                                 <span class="stat-number" data-target="{{ $today_visitor }}"
                                                     style="color: #fff">0</span>
                                                 <p style="color: #fff">Pengunjung Hari Ini</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
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
                                         class="footer_bottom_wrap d-flex column-gap-4 row-gap-3 flex-wrap align-items-center justify-content-center justify-content-md-center">
                                         <div class="pxn_copyright_text">&copy; <span>Bpr Surya Kencana Jaya</span>
                                             Support By
                                             <a href="https://antaruang.com/" style="color: #f6630e"> Antar uang.</a>
                                         </div>

                                         <!-- <ul class="pxn_footer_bottom_menu">
                                             {{-- <li><a href="#">Career</a></li>
                                             <li><a href="#">Privacy & Policy</a></li>
                                             <li><a href="#">FAQS</a></li> --}}
                                         </ul> -->
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
     document.addEventListener('DOMContentLoaded', () => {
         const animateCounter = (element) => {
             const target = +element.getAttribute('data-target');
             const increment = target / 200;
             let current = 0;
             const updateCounter = () => {
                 current += increment;
                 if (current < target) {
                     element.innerText = Math.ceil(current);
                     requestAnimationFrame(updateCounter);
                 } else {
                     element.innerText = target.toLocaleString('id-ID');
                 }
             };
             updateCounter();
         };

         const statsSection = document.querySelector('.visitor-stats');
         const observer = new IntersectionObserver((entries) => {
             entries.forEach(entry => {
                 if (entry.isIntersecting) {
                     const counters = document.querySelectorAll('.stat-number');
                     counters.forEach(counter => animateCounter(counter));
                     observer.unobserve(statsSection);
                 }
             });
         }, {
             threshold: 0.5
         });

         if (statsSection) {
             observer.observe(statsSection);
         }
     });
 </script>
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
