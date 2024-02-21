<h1>Lista dos Pedidos de Suportes</h1>
{{-- Inside e link is the name of the route . view on web.php  --}}
<a href="{{ route('supports.create') }}">Fazer Pedido de Supporte</a>
<table style="text-align:right;">
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descricao</th>
        <th>Acoes</th>
    </thead>
    <tbody>
        
        @foreach ($supports as $support)
        <tr>
            <td>{{ $support['subject'] }}</td>
            <td>{{ $support['status'] }}</td>
            <td>{{ $support['body'] }}</td>
            <td> <a href="{{ route('supports.show',$support['id']) }}"> ></a></td>
            <td><a href="{{ route('supports.edit',$support['id']) }}">Editar</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
    