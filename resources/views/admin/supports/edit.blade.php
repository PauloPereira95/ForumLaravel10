<h1>Duvida #{{ $support->id }}</h1>
{{-- Render aleter.blade.php --}}
<x-alert/>

<form action="{{ route('supports.update', $support->id) }}" method="post">
    {{-- Token form error 419 @csrf --}}
    @csrf()
    {{-- specifies the form method for put --}}
    @method('put')
    @include('admin/supports/partials/form', [
        'support' => $support
    ])
</form>
