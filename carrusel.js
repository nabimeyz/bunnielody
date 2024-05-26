//Metztli Huertero Granada
//Proyecto para la materia: Desarrollo de Sitios web con transacciones en linea

//Creación de constantes
const carrusel = document.querySelector(".carrusel"); //recupera el elemento que pertenece a la clase "carrusel"
const botones = document.querySelectorAll(".wrapper i"); //Selecciona y almacena todos los elementos de la clase "wrapper"
const firstCardWidth = carrusel.querySelector(".tarjeta").offsetWidth; //Almacena el valor del ancho de la primera tarjeta del carrusel

//Creación de variables
let isDragging = false, startX, startScrollLeft; //valor variable que controla el agarre del cursor cuando se quiere arrastrar algun elemento; falsa por defecto

//Método que hará que se mueva el carrusel cada que se clickee un botón 
botones.forEach(btn => {
    btn.addEventListener ("click", () => { //addEventListener recibe la acción del click
        carrusel.scrollLeft += btn.id === "derecha" ? -firstCardWidth : firstCardWidth; 
        //linea que controla si el carrusel se mueve a la izquierda o a la derecha según el id y ajusta el movimiento al ancho de las tarjetas
    })
})

//Una constante que tiene asignada una función que detecta cuando se empieza a arrastrar el carrusel con el mouse
const dragStart = (e) => {
    isDragging = true; //la constante isDragging cambia a verdadero
    carrusel.classList.add("dragging"); //cambio en la hoja de estilos para agregar la clase "dragging"
    startX = e.pageX; //guarda la posición inicial del cursor
    startScrollLeft = carrusel.scrollLeft; //guarda cuantos pixeles se ha desplazado el cursor del momento inicial
}

//Constante que se ejecuta cuando el mouse se está moviendo mientras se mantiene el arrastre
const dragging = (e) => {
    if (!isDragging) return; //Si no se detecta un arrastre, no se hace nada y se interrumpe su ejecución con return
    carrusel.scrollLeft = startScrollLeft - (e.pageX - startX); //mueve el carrusel segun el movimiento del ratón, cuando está arrastrando
}

//Constante que permite detener el arrastre; arraste == falso
const dragStop = () => {
    isDragging = false; //se cambia el estado de la variable isDragging a falso
    carrusel.classList.remove("dragging"); //Elimina la clase de la hoja de estilos
}

//Ejecución de las funciones
carrusel.addEventListener("mousedown", dragStart); //llamará a la constante para empezar a ejecutar el arrastre cuando se detecte un clic sostenido sobre el carrusel
carrusel.addEventListener("mousemove", dragging); //Se moverá el carrusel cuando se detecte movmiento del mouse; llama a la función de movimiento
carrusel.addEventListener("mouseup", dragStop); //se invoca a la constante para detener el movimiento cuando se detiene el arrastre