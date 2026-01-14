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

<!-- CARTA -->
<div class="fondo">
  
  <div class="carta" id="carta">
    <div class="tapa"></div>
    <div class="mensaje">
      <h2>💌 Esta invitación es para ti</h2>
      <p>Toca para abrir</p>
    </div>
  </div>

  <!-- CONTENIDO -->
  <div class="contenido" id="contenido">



    <div class="imagen">
    <div class="texto-centrado">
        <h3>Eragnoli</h3>
        <h3>Sarita</h3>
       
       
    </div>
</div>


   

    <div class="fecha">
      <div>
        <span>12</span>
        <small>Marzo</small>
      </div>
      <div>
        <span>2026</span>
      </div>
    </div>

    <p>📍 Managua, Nicaragua</p>

    <!-- TEXTO -->
    <div class="ll">
      <p>Con mucha alegría queremos que formes parte de este día tan especial.</p>
    </div>


    <!-- Lugar --->

    <div class="ubicacion">


    </div>
    <!--   Cronometro --->
      
      <div class="cuenta-contenedor">
          <div id="cuenta-regresiva">
              <span id="dias">00</span> días 
              <span id="horas">00</span> h 
              <span id="minutos">00</span> m 
              <span id="segundos">00</span> s
          </div>
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

            // Animación: ícono se hace pequeño y transparente
            img.style.transform = "scale(0.3)";
            img.style.opacity = "0";

            setTimeout(() => {
                img.src = e.target.result;  // cambia la imagen
                img.classList.remove("icono"); // quita la clase icono

                // Animación de aparición de la foto
                img.style.transform = "scale(1)";
                img.style.opacity = "1";
            }, 300); // 300ms para suavidad
        }
        reader.readAsDataURL(file);
    }
}


</script>


<script src="script.js"></script>
<script src="time.js"></script>

</body>
</html>
