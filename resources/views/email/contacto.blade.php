@component('mail::message')
# Nuevo contacto

**Mensaje de:**

# {{$data['nombre']}}

## Asunto: 

*{{ $data['asunto'] }}*

### Mensaje:

@component('mail::panel')

{{ $data['cuerpo'] }}

@endcomponent

### Responder a: {{ $data['email'] }}

Adios,<br>
{{ config('app.name') }}
@endcomponent
