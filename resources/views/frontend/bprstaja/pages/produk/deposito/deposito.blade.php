@extends('frontend.bprtaruna.layout.main')

@section('content')

<style>


/* Card Produk */
.team-box{
    margin-bottom:30px;
}

.tabungan-img{
    width:100%;
    height:400px;
    object-fit:fill;
    border-radius:15px;
    transition:0.3s;
}

.tabungan-img:hover{
    transform:scale(1.03);
}

/* Mobile */
@media(max-width:768px){
    .tabungan-img{
        height:auto;
    }
}

</style>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Produk Tabungan</h2>
            </div>
        </div>
    </div>
</div>

<div class="team2 team-page sp" style="padding-top:50px; padding-bottom:60px;">
    <div class="container">

```
    <div class="row">

        @foreach ($tabungan as $item)
        <div class="col-lg-4 col-md-6 col-12">

            <div class="team-box">

                <a href="{{ route('dettabungan', $item->id) }}">

                    <img 
                    src="/recfil?display=true&rf={{ $item->thumbnail }}"
                    alt="{{ $item->title ?? 'tabungan' }}"
                    class="tabungan-img">

                </a>

            </div>

        </div>
        @endforeach

    </div>

</div>
```

</div>

@endsection
