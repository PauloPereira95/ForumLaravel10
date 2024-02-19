<h1>Duvida #{{ $support->id }}</h1>
<form action="{{ route('supports.update',$support->id) }}" method="post">
    {{-- Token form error 419 @csrf --}}
    @csrf()
    {{-- specifies the form method for put --}}
    @method('put')
    <input type="text" name="subject" placeholder="Assunto" id="" value="{{ $support->subject }}">
    <textarea name="body" id="" cols="30" rows="10" placeholder="Descricao">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>
</form>