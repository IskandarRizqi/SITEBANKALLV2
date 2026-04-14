@extends('frontend.bprphm.layout.main')

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

            <div class="col-lg-12 col-md-12 col-12 ">
                <div class="service-details-post">
                    @if ($pengurus)
                        <article>
                            <div class="details-post-area">
                                <div class="image" style="text-align:center;">
                                    <img src="/recfil?display=true&rf={{ $pengurus->banner }}" alt="{{ $pengurus->title }}"
                                        style="border-radius:8px; height: 800px; width: 900px;">
                                </div>
                                <div class="space30"></div>
                                <div class="heading1">
                                    <div class="event-content">
                                        {!! $pengurus->content !!}
                                    </div>
                                </div>
                            </div>
                        </article>
                    @else
                        <div class="alert alert-warning text-center">
                            Data tidak ditemukan.
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
    </body>
@endsection
