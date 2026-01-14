<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Invitación</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
</head>
<body>
  <audio id="musica" loop>
  <source src="Perfect.mp3" type="audio/mpeg">
</audio>


<div class="fondo">

  
  <!-- CARTA -->
  <div class="carta" id="carta">
    <div class="tapa"></div>
    <div class="mensaje">
      <h2>💌 Esta invitación es para ti</h2>
      <p>Toca para abrir</p>
    </div>
  </div>

  <!-- CONTENIDO -->
  <div class="contenido" id="contenido">

    <h1>Eragnolis & Sara ❤️</h1>
    <p class="sub">Te invitamos a celebrar nuestro amor</p>

    <div class="fecha">
      <div>
        <span>12</span>
        <small>Marzo</small>
      </div>
      <div>
        <span>2026</span>
      </div>
    </div>

    <p>📍 León, Nicaragua</p>

    <!-- TEXTO -->
    <div class="ll">
      <p>Con mucha alegría queremos que formes parte de este día tan especial.</p>
    </div>

    <!-- FORMULARIO -->
    <div class="formulario">
      <h3>Confirma tu asistencia</h3>
      <form action="guardar.php" method="POST" enctype="multipart/form-data"  id="formInvitado">
        <input type="text" name="nombre" placeholder="Tu nombre" required>
        <input type="number" name="edad" placeholder="Ingresa tu edad" required>

        <label class="check">
          <input type="checkbox" name="asistira"> Asistiré a la boda
        </label>

        <label class="upload-box">
          <input type="file" name="imagen" accept="image/*" hidden onchange="previewImage(this)">
          
          <div class="upload-content">
            <img id="preview" src="https://cdn-icons-png.flaticon.com/512/685/685655.png" class="icono">
          
          </div>
        </label>



        <button type="submit">Enviar</button>
      </form>
        
    </div>

  </div>

</div>
<script>
  function previewImage(input){
      const file = input.files[0];
      if(file){
          const reader = new FileReader();
          reader.onload = function(e){
              const img = document.getElementById("preview");
              img.src = e.target.result;
              img.classList.remove("icono"); // ahora es foto real grande
          }
          reader.readAsDataURL(file);
      }
  }

</script>


<script src="script.js"></script>
</body>
</html>
