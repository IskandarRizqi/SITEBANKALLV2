@extends('frontend.bprsms.layout.main')

@section('content')
    <div class="breadcumb-area style2 bg-smoke4">
        <div class="breadcumb-wrapper" data-bg-src="frontend/bprsms/assets/img/bg/breadcumb-bg.jpg">
            <div class="container">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">Kontak</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Beranda</a></li>
                        <li>Kontak</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Start -->
    <div class="contact wow fadeInUp">
        <div class="container">
         
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="flaticon-address"></i>
                            <div class="contact-text">
                                <h2>Location</h2>
                                <p>Jl. Soekarno-Hatta No. 25 Kediri</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="flaticon-call"></i>
                            <div class="contact-text">
                                <h2>Phone</h2>
                                <p>(0354) 681755</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="flaticon-send-mail"></i>
                            <div class="contact-text">
                                <h2>Email</h2>
                                <p>bprstaja@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Your Name"
                                    required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="Your Email"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject"
                                    required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="message" placeholder="Message" required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
