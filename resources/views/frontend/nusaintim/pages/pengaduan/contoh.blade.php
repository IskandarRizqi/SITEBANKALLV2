<section class="slide" role="listitem" aria-label="Kantor Cabang" style="padding: 25px 60px">
                    <div class="row">
                        <div class="col-left">
                            <h3 style="color:#A62C3D; font-size:22px; margin:6px 0 18px;">{{ $cabang->kantor }}</h3>

                            <div class="info-row">
                                <img src="{{ asset('frontend/bprrudo/assets/img/profil/map.png') }}" alt="icon alamat">
                                <div>
                                    <strong style="font-size:16px;">Alamat</strong><br>
                                    <span style="color:#444;">{{ $cabang->alamat }}
                                        </span>
                                </div>
                            </div>

                            <div class="info-row">
                                <img src="{{ asset('frontend/bprrudo/assets/img/profil/telp.png') }}" alt="icon telepon">
                                <div>
                                    <strong style="font-size:16px;">No. Telepon + Fax</strong><br>
                                    <span style="color:#444;">{{ $cabang->no_telp }}</span>
                                </div>
                            </div>

                            <div style="display:flex; gap:134px; flex-wrap:wrap;">
                                <div class="info-row" style="gap:12px;">
                                    <img src="{{ asset('frontend/bprrudo/assets/img/profil/wa.png') }}" alt="icon wa">
                                    <div>
                                        <strong style="font-size:16px;">WhatsApp (Kredit)</strong><br>
                                        <span style="color:#444;">0281334084545</span>
                                    </div>
                                </div>

                                <div class="info-row" style="gap:2px;">

                                    <div>
                                        <strong style="font-size:16px;">WhatsApp (Tabungan & Deposito)</strong><br>
                                        <span style="color:#444;">0281334084545</span>
                                    </div>
                                </div>
                            </div>

                            <div style="display:flex; gap:24px; margin-top:18px; flex-wrap:wrap;">
                                <div class="info-row" style="gap:12px;">
                                    <img src="{{ asset('frontend/bprrudo/assets/img/profil/jam.png') }}" alt="icon jam">
                                    <div>
                                        <strong style="font-size:16px;">Jam Operasional Transaksi</strong><br>
                                        <span style="color:#444;">Senin s/d Jumat 08:00 - 15:00 WIB</span>
                                    </div>
                                </div>

                                <div class="info-row" style="gap:12px;">

                                    <div>
                                        <strong style="font-size:16px;">Jam Operasional Kantor</strong><br>
                                        <span style="color:#444;">Senin s/d Jumat 08:00 - 17:00 WIB</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-right">
                            <a href="https://www.google.com/maps?q={{ $cabang->latitude }},{{ $cabang->longitude }}" target="_blank" >
                            <img src="/recfil?display=true&rf={{ $cabang->thumbnail }}" alt="peta kantor cabang"
                                style="width:100%; border-radius:10px;">
                            </a>
                        </div>
                    </div>
                </section>