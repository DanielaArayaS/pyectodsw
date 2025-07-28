<h1>Editar Proyecto</h1>
<form action="/proyectos/{{ $proyecto->id }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" value="{{ $proyecto->nombre }}"><br>
    <input type="date" name="fecha_inicio" value="{{ $proyecto->fecha_inicio }}"><br>
    <input type="text" name="estado" value="{{ $proyecto->estado }}"><br>
    <input type="text" name="responsable" value="{{ $proyecto->responsable }}"><br>
    <input type="number" name="monto" step="0.01" value="{{ $proyecto->monto }}"><br>
    <button type="submit">Actualizar</button>
</form>
