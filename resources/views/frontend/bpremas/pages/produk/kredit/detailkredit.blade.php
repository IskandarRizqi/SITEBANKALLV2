@extends('frontend.bpremas.layout.main')

@section('content')
@include('frontend.bpremas.components.product-detail', [
'product' => $kredit,
'otherProducts' => $other_kredit,
'productType' => 'kredit',
'detailBaseUrl' => '/detkredit',
'applicationUrl' => '/pengajuanonline',
])
@endsection