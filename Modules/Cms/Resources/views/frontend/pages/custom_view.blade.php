@extends('cms::frontend.layouts.app')
@section('title', $page->title)
@php
    $navbar_btn['text'] = 'Try For Free';
    $navbar_btn['link'] = route('business.getRegister');
    if(isset($__site_details['btns']) && isset($__site_details['btns']['navbar']) && !empty($__site_details['btns']['navbar']['text'])) {
        $navbar_btn['text'] = $__site_details['btns']['navbar']['text'] ?? 'Try For Free';
    }
    if(isset($__site_details['btns']) && isset($__site_details['btns']['navbar']) && !empty($__site_details['btns']['navbar']['link'])) {
        $navbar_btn['link'] = $__site_details['btns']['navbar']['link'] ?? route('business.getRegister');
    }
@endphp
@includeIf('cms::frontend.layouts.header')
@section('meta')
    <meta name="description" content="{{$page->meta_description}}">
@endsection
@section('content')
<div class="article-block space-between-blocks">
    <div class="container col-xxl-10 px-xxl-0">
        <div class="article col-xl-10 mx-auto">
            <div class="px-4 mb-4 text-center">
                <h1 class="article-block__title">
                    {{$page->title}}
                </h1>
            </div>
            @if(!empty($page->feature_image))
                <div class="article-block__header mb-5 py-4 px-xxl-5">
                    <img src="{{$page->feature_image_url ?? asset('modules/cms/img/default.png')}}" 
                    class="article-block__header-img w-100">
                </div>
            @endif
            {!!$page->content!!}
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    new Sticky("[sticky]");
</script>
@endsection