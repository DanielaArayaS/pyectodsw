<h1>Crear Proyecto</h1>
<form action="/proyectos" method="POST">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre"><br>
    <input type="date" name="fecha_inicio"><br>
    <input type="text" name="estado" placeholder="Estado"><br>
    <input type="text" name="responsable" placeholder="Responsable"><br>
    <input type="number" name="monto" step="0.01" placeholder="Monto"><br>
    <button type="submit">Guardar</button>
</form>
