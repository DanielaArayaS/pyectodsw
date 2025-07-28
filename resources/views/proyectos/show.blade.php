<h1>Detalle del Proyecto</h1>
<p>Nombre: {{ $proyecto->nombre }}</p>
<p>Inicio: {{ $proyecto->fecha_inicio }}</p>
<p>Estado: {{ $proyecto->estado }}</p>
<p>Responsable: {{ $proyecto->responsable }}</p>
<p>Monto: ${{ $proyecto->monto }}</p>
<a href="/proyectos">Volver</a>
