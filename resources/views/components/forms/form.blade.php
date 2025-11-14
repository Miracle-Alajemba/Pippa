@props(['method' => 'POST', 'action' => '', 'enctype' => 'multipart/form-data'])

<form method="{{ strtoupper($method) === 'GET' ? 'GET' : 'POST' }}" action="{{ $action }}" enctype="{{ $enctype }}" {{ $attributes->merge(['class' => 'max-w-2xl mx-auto space-y-6']) }}>

  @if (strtoupper($method) !== 'GET')
    @csrf
  @endif

  @if (in_array(strtoupper($method), ['PUT', 'PATCH', 'DELETE']))
    @method($method)
  @endif

  {{ $slot }}
</form>
