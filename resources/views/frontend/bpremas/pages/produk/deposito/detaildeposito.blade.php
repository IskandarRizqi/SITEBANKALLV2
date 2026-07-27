@extends('frontend.bpremas.layout.main')

@section('content')
@include('frontend.bpremas.components.product-detail', [
'product' => $deposito,
'otherProducts' => $other_deposito,
'productType' => 'deposito',
'detailBaseUrl' => '/detdeposito',
'applicationUrl' => '/pengajuanonline',
])
@endsection