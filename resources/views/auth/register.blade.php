<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        form { max-width: 400px; margin: auto; }
        input { display: block; width: 100%; padding: 10px; margin: 10px 0; }
        button { padding: 10px 20px; cursor: pointer; }
        .message { color: red; }
    </style>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <div class="message" id="message"></div>
    <form id="registerForm">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="password" name="clave" placeholder="Contraseña" required>
        <button type="submit">Registrar</button>
    </form>

    <script>
        const form = document.getElementById('registerForm');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const data = {
                nombre: form.nombre.value,
                correo: form.correo.value,
                clave: form.clave.value
            };

            try {
                const res = await fetch('/api/register', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });

                const json = await res.json();
                if (res.ok) {
                    alert(json.mensaje);
                    form.reset();
                } else {
                    document.getElementById('message').innerText = JSON.stringify(json);
                }
            } catch (err) {
                console.error(err);
                document.getElementById('message').innerText = 'Error al conectar con el servidor';
            }
        });
    </script>
</body>
</html>
