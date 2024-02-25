@extends('admin/layouts/app')

@section('content')

{{--  Name of the page  --}}
@section('title' , 'Forum')

@section('header')
@include('admin/supports/partials/header' ,compact('supports'))
@endsection
{{-- Inside e link is the name of the route . view on web.php  --}}

@section('content')
    @include('admin/supports/partials/content')
<x-pagination :paginator="$supports" :appends="$filters"/>
@endsection
