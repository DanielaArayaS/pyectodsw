<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        form { max-width: 400px; margin: auto; }
        input { display: block; width: 100%; padding: 10px; margin: 10px 0; }
        button { padding: 10px 20px; cursor: pointer; }
        .message { color: red; }
    </style>
</head>
<body>
    <h2>Inicio de Sesión</h2>
    <div class="message" id="message"></div>
    <form id="loginForm">
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="password" name="clave" placeholder="Contraseña" required>
        <button type="submit">Iniciar Sesión</button>
    </form>

    <script>
        const form = document.getElementById('loginForm');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const data = {
                correo: form.correo.value,
                clave: form.clave.value
            };

            try {
                const res = await fetch('/api/login', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });

                const json = await res.json();
                if (res.ok) {
                    alert(json.mensaje + '\nToken: ' + json.token);
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
