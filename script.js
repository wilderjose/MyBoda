const carta = document.getElementById("carta");
const contenido = document.getElementById("contenido");
const fecha = document.getElementById("fecha");
const musica = document.getElementById("musica");

carta.addEventListener("click", () => {
  musica.play();
  carta.classList.add("abierta");
   

  setTimeout(() => {
    carta.style.display = "none";
    contenido.style.display = "block";
    
   
  }, 1200);
});



