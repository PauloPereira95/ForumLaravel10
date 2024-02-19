<h1>Lista dos Pedidos de Suportes</h1>
{{-- Inside e link is the name of the route . view on web.php  --}}
<a href="{{ route('supports.create') }}">Fazer Pedido de Supporte</a>
<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descricao</th>
    </thead>
</table>
<tbody>

    @foreach ($supports as $support)
        <tr>
            <td>{{ $support->subject }}</td>
            <td>{{ $support->status }}</td>
            <td>{{ $support->body }}</td>
            <td> > </td>
        </tr>
    @endforeach
</tbody>
