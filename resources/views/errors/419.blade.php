{{--@extends('errors::minimal')--}}

{{--@section('title', __('Page Expired'))--}}
{{--@section('code', '419')--}}
{{--@section('message', __('Page Expired'))--}}


@extends('layouts.error')
@section('title-error')
    {{__('Page Expired')}}
@endsection

@section('content-error')
    <div class="col-md-8 mb-5">
        <div class="pe-5 pb-5 title-login text-end me-3">
            <h2>{{__('Excuse me ..')}}</h2>
            <h1 class="text-success">
                {{__('Error 419')}}
            </h1>
            <p class="h3">{{__('Page Expired')}}</p>
        </div>
    </div>
@endsection
