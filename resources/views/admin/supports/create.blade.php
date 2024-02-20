<h1>Novo Pedido de Supporte</h1>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form action="{{ route('supports.store') }}" method="post">
    {{-- Token form error 419 @csrf --}}
    @csrf
    <input type="text" name="subject" placeholder="Assunto" value="{{ old('subject') }}" id="">
    <textarea name="body" id="" cols="30" rows="10" placeholder="Descricao">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>
