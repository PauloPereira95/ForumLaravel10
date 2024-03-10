<x-mail::message>
# Duvida Respondida

Assunto da Duvida : <b>{{ $reply->support_id }}</b> foi respondido com : <b>{{ $reply->content }}</b>.

<x-mail::button :url="route('replies.index' , $reply->support_id)">
Ver mais
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
