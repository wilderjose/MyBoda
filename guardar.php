<?php
include "conexion.php";

$nombre   = $_POST["nombre"] ?? '';
$edad     = $_POST["edad"] ?? '';
$asistira = isset($_POST["asistira"]) ? 1 : 0;

$imagen = "";

if (isset($_FILES["imagen"]) && $_FILES["imagen"]["name"] != "") {
    $carpeta = "imagenes/";
    if (!is_dir($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    $imagen = time() . "_" . $_FILES["imagen"]["name"];
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta . $imagen);
}

/* ======================================
   VERIFICAR SI YA EXISTE
====================================== */
$verificar = "SELECT id FROM invitados WHERE nombre = '$nombre' LIMIT 1";
$resultado = $conn->query($verificar);

$yaExiste = false;

if ($resultado->num_rows > 0) {
    $yaExiste = true; // Ya estaba registrado
}

/* ======================================
   SOLO INSERTA SI NO EXISTE
====================================== */
if (!$yaExiste) {
    $sql = "INSERT INTO invitados (nombre, edad, asistira, imagen)
            VALUES ('$nombre', '$edad', '$asistira', '$imagen')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Confirmación</title>
<style>
body {
    font-family: 'Arial', sans-serif;
    text-align: center;
    padding-top: 100px;
    background: linear-gradient(#ffe6f0, #fff7e6);
    overflow: hidden;
}
h1 { color: #ff477e; font-size: 3em; }
p { font-size: 1.8em; color: #555; }
</style>
</head>
<body>

<?php if ($yaExiste) { ?>
    <h1>💖 ¡Hola <?php echo htmlspecialchars($nombre); ?>! 💖</h1>
    <p>Ya habías confirmado tu asistencia.</p>
    <p>¡Nos alegra volver a verte! 🥰</p>
<?php } else { ?>
    <h1>💖 ¡Gracias por confirmar, <?php echo htmlspecialchars($nombre); ?>! 💖</h1>
    <p>Tu asistencia fue registrada con éxito.</p>
<?php } ?>

<audio id="musica" autoplay loop>
    <source src="Perfect.mp3" type="audio/mpeg">
</audio>

<canvas id="corazones-canvas" style="position:fixed; top:0; left:0; width:100%; height:100%; pointer-events:none;"></canvas>

<script>
const canvas = document.getElementById("corazones-canvas");
const ctx = canvas.getContext("2d");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const colors = ["#ff0a54","#ff477e","#ff85a1","#fbb1b8","#ffd700"];
const corazones = [];

for(let i=0;i<80;i++){
    corazones.push({
        x: Math.random()*canvas.width,
        y: Math.random()*canvas.height,
        size: Math.random()*20+10,
        speed: Math.random()*2+1,
        color: colors[Math.floor(Math.random()*colors.length)],
        angle: Math.random()*Math.PI
    });
}

function draw(){
    ctx.clearRect(0,0,canvas.width,canvas.height);
    corazones.forEach(c=>{
        ctx.fillStyle = c.color;
        ctx.beginPath();
        ctx.arc(c.x,c.y,c.size/2,0,Math.PI*2);
        ctx.fill();
        c.y += c.speed;
        if(c.y > canvas.height) c.y = -20;
    });
    requestAnimationFrame(draw);
}
draw();
</script>

</body>
</html>
