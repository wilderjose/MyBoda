// Guardamos la fecha del evento en localStorage
const fechaEventoKey = "fechaEventoBoda";

// Fecha del evento por defecto
const fechaPorDefecto = "2026-03-01T12:00:00";

// Revisamos si ya existe en localStorage
let fechaEvento = localStorage.getItem(fechaEventoKey);
if (!fechaEvento) {
    localStorage.setItem(fechaEventoKey, fechaPorDefecto);
    fechaEvento = fechaPorDefecto;
}

// Convertir a timestamp
const fechaEventoTimestamp = new Date(fechaEvento).getTime();

const cuenta = setInterval(function() {
    const ahora = new Date().getTime();
    const distancia = fechaEventoTimestamp - ahora;

    const dias = Math.floor(distancia / (1000 * 60 * 60 * 24));
    const horas = Math.floor((distancia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutos = Math.floor((distancia % (1000 * 60 * 60)) / (1000 * 60));
    const segundos = Math.floor((distancia % (1000 * 60)) / 1000);

    document.getElementById("dias").innerText = dias.toString().padStart(2, '0');
    document.getElementById("horas").innerText = horas.toString().padStart(2, '0');
    document.getElementById("minutos").innerText = minutos.toString().padStart(2, '0');
    document.getElementById("segundos").innerText = segundos.toString().padStart(2, '0');

    if (distancia < 0) {
        clearInterval(cuenta);
        document.getElementById("cuenta-regresiva").innerHTML = "¡Ya comenzó la boda! 💖";
    }
}, 1000);
