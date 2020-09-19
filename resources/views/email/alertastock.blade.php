@component('mail::message_alerta')
# Atención! Bajo stock de producto.

@component('mail::panel_alerta') <!-- A13228 -->
### Producto: 

##### {{ $data->nombre }}

### Cantidad: 

##### {{ $data->stock }}

@component('mail::button', ['url' => config('app.front_url')])
Ir a la app
@endcomponent
@endcomponent

Saluda,<br>
{{ config('app.name') }}
@endcomponent
