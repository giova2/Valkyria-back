@component('mail::message')
## Bienvenido a *productos Valkyria*

Hola **{{ $data['nombre'] }}**,

### Tu número de producto es {{ $data['numproducto'] }}:

{{ $data['descripcion'] }} **{{ $data['producto'] }}**

{{ $data['msgcosto'] }} **${{ $data['precio'] }}**

{{ $data['msgok'] }}

@component('mail::button', ['url' => config('app.url')."/confirmarproducto/".$data['numproducto']."/".$data['codigo'] ])
Confirmar producto
@endcomponent

Gracias, <br>
{{ config('app.name') }}
@endcomponent
