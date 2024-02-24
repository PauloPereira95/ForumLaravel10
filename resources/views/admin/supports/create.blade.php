<h1>Novo Pedido de Supporte</h1>
{{-- Render aleter.blade.php --}}
<x-alert/>
<form action="{{ route('supports.store') }}" method="post">
    {{-- Include partial form --}}
    @include('admin/supports/partials/form')
</form>
