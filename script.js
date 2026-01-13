const carta = document.getElementById("carta");
const contenido = document.getElementById("contenido");
const fecha = document.getElementById("fecha");
const musica = document.getElementById("musica");

carta.addEventListener("click", () => {
  carta.classList.add("abierta");
   musica.play();

  setTimeout(() => {
    carta.style.display = "none";
    contenido.style.display = "block";
    
   
  }, 1200);
});
