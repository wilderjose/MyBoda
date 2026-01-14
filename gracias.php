<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gracias por asistir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff7e6;
            text-align: center;
            padding-top: 100px;
        }
        h1 {
            color: #ff477e;
            font-size: 3em;
        }
        p {
            font-size: 1.5em;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>🎉 ¡Gracias por confirmar tu asistencia!</h1>
    <p>Estamos muy felices de que nos acompañes en este día tan especial.</p>

    <script>
        document.getElementById("formInvitado").addEventListener("submit", function(e){
    e.preventDefault();
    const form = this;
    const data = new FormData(form);

    fetch("guardar.php", { method: "POST", body: data })
    .then(res => res.text())
    .then(respuesta => {
        respuesta = respuesta.trim().toUpperCase();
        if(respuesta === "GUARDADO OK"){
            // Mostrar un mensaje rápido (opcional)
            alert("✅ Tus datos fueron enviados correctamente!");

            // Redirigir a la página de gracias después de 1 segundo
            setTimeout(() => {
                window.location.href = "gracias.php";
            }, 1000); // 1 segundo de espera
        } else {
            alert("❌ Error al enviar: " + respuesta);
        }
    })
    .catch(err => {
        alert("❌ Error de conexión");
        console.error(err);
    });
});

    </script>
</body>
</html>
