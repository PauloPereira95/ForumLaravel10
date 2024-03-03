@extends('admin/layouts/app')
@section('title', 'Criar Novo Topico ')
@section('header')
<h1 class="text-lg text-black-500">Novo Pedido de Suporte</h1>
@endsection
@section('content')
<form action="{{ route('supports.store') }}" method="post">
    {{-- Include partial form --}}
    @include('admin/supports/partials/form')
</form>
@endsection
