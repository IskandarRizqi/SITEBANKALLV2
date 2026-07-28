@extends('frontend.bpremas.layout.main')

@section('content')
@include('frontend.bpremas.components.product-detail', [
'product' => $tabungan,
'otherProducts' => $other_tabungan,
'productType' => 'tabungan',
'detailBaseUrl' => '/dettabungan',
'applicationUrl' => '/pengajuanonline',
])
@endsection