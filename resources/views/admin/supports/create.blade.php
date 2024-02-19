<h1>Novo Pedido de Supporte</h1>
<form action="{{ route('supports.store') }}" method="post">
    {{-- Token form error 419 @csrf --}}
    @csrf
    <input type="text" name="subject" placeholder="Assunto" id="">
    <textarea name="body" id="" cols="30" rows="10" placeholder="Descricao"></textarea>
    <button type="submit">Enviar</button>
</form>