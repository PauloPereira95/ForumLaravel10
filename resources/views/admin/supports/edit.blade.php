@extends('admin/layouts/app')
@section('title', "Duvida # {$support->id}")
@section('header')
<h1 class="text-lg text-black-500 mb-3">Novo Pedido de Suporte</h1>
@endsection
@section('content')
<form action="{{ route('supports.update', $support->id) }}" method="post">
    {{-- Include partial form --}}
    @method('PUT')
    @include('admin/supports/partials/form' , ['support' => $support])
</form>
@endsection
