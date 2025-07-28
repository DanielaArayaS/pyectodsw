<h1>Listado de Proyectos</h1>

<p>Valor UF del día: ${{ number_format($valorUF, 2, ',', '.') }}</p>

<a href="/proyectos/crear">Crear nuevo</a>

<ul>
@foreach($proyectos as $proyecto)
    <li>
        {{ $proyecto->nombre }} - {{ $proyecto->estado }}
        <a href="/proyectos/{{ $proyecto->id }}">Ver</a>
        <a href="/proyectos/{{ $proyecto->id }}/editar">Editar</a>
        <form action="/proyectos/{{ $proyecto->id }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </li>
@endforeach
</ul>
