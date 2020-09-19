@component('mail::message')
# Hola

### Se ha registrado el producto número {{ $data['numproducto'] }}:

{{ $data['descripcion'] }} **{{ $data['producto'] }}**

{{ $data['msgcosto'] }} **${{ $data['precio'] }}**

Responder a : **{{ $data['contacto'] }}**

@component('mail::button', ['url' => config('app.url')])
Ir al Admin
@endcomponent

{{ $data['saludo'] }}

Gracias,<br>
{{ config('app.name') }}
@endcomponent
