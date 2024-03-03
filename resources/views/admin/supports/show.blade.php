@extends('admin/layouts/app')
@section('title', "Editar a Pedido de Support {$support->id} | {$support->subject}")
@section('header')
    <h1 class="text-lg text-black-500">Editar a Pedido de Support {{ $support->id }} | {{ $support->subject }}</h1>
@endsection
@section('content')

<dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700 my-3">
    <div class="flex flex-col pb-3">
        mb-1 text-gray-500 md:text-lg dark:text-gray-400
        <dt class="text-lg font-semibold text-black">Assunto</dt>
        <dd class=" mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{ $support->subject }}</dd>
    </div>
    <div class="flex flex-col py-3">
        <dt class="text-lg font-semibold text-black">Status</dt>
        <dd class=" mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{ $support->status }}</dd>
    </div>
    <div class="flex flex-col pt-3">
        <dt class="text-lg font-semibold text-black">Descricao</dt>
        <dd class=" mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{ $support->body }}</dd>
    </div>
</dl>
<form action="{{ route('supports.destroy', $support->id) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Apagar</button>
</form>

@endsection
