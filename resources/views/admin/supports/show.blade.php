<h1>Detalhes do Pedido de Support </h1>
<ul>
    <li>
        Assunto : {{ $support->subject }}
    </li>
    <li>
        Status : {{ $support->status }}
    </li>
    <li>
        Descricao : {{ $support->body }}
    </li>
    <form action="{{ route('supports.destroy', $support->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type='submit'>Apagar</button>
    </form>
</ul>