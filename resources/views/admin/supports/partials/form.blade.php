{{-- Token form error 419 @csrf --}}
@csrf
                                                            {{-- if have value inserte value of support   if not set old value --}}
<input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject ?? old('subject') }}" id="">
<textarea name="body" id="" cols="30" rows="10" placeholder="Descricao">{{ $support->body ?? old('body') }}</textarea>
<button type="submit">Enviar</button>
