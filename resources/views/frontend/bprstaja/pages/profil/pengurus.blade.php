@extends('frontend.bprstaja.layout.main')

@section('content')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Pengurus</h2>
                </div>

            </div>
        </div>
    </div>



    <div class="team">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-3 col-md-6 wow fadeInUp d-flex" data-wow-delay="0.1s">
                    <div class="team-item" style="width:100%; display:flex; flex-direction:column;">
                        <div class="team-img">
                            <img src="frontend/bprstaja/img/laki.jpg" alt="Team Image"
                                style="filter: blur(5px); width:100%; height:280px; object-fit:fill;">
                        </div>
                        <div class="team-text">
                            <h2>Wayan Sudharma IR MM</h2>
                            <p>Komisaris Utama</p>
                        </div>
                        <div class="team-social">
                            <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                            <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp d-flex" data-wow-delay="0.2s">
                    <div class="team-item" style="width:100%; display:flex; flex-direction:column;">
                        <div class="team-img">
                            <img src="frontend/bprstaja/img/pl.jpg" alt="Team Image"
                                style="filter: blur(5px); width:100%; height:280px; object-fit:fill;">
                        </div>
                        <div class="team-text">
                            <h2>Trias Nur Zain, SE., MM</h2>
                            <p>Direktur Utama</p>
                        </div>
                        <div class="team-social">
                            <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                            <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team End -->
    </body>
@endsection
