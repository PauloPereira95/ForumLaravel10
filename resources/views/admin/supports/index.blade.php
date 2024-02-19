<h1>Lista dos Pedidos de Suportes</h1>
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
