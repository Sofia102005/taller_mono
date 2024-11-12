function validarFecha() {
    const inputFecha = document.getElementById('fechaIngreso');
    const fechaSeleccionada = new Date(inputFecha.value);
    const diaSemana = fechaSeleccionada.getDay(); 

    if (diaSemana === 6) {
        alert("Por favor selecciona una fecha entre lunes y sábado.");
        inputFecha.value = ""; 
    }
}
function validarHorarioIngresoSalida(horaIngreso, horaSalida) {

    const horaInicioSemana = "07:00";
    const horaFinSemana = "20:50";
    const horaFinSabado = "16:30";

    if (horaIngreso < horaInicioSemana || horaIngreso > horaFinSemana) {
        if (horaIngreso > horaFinSabado) {
            alert("El horario de ingreso es inválido. Debe estar entre las 7:00 am y las 8:50 pm de lunes a viernes o entre las 7:00 am y las 4:30 pm los sábados.");
            return false;
        }
    }

    if (horaSalida && (horaSalida < horaIngreso || horaSalida > horaFinSemana)) {
        if (horaSalida > horaFinSabado) {
            alert("El horario de salida es inválido. Debe estar después del horario de ingreso y dentro del rango permitido.");
            return false;
        }
    }

    return true; 
}

const horaIngreso = "08:00"; 
const horaSalida = "15:00"; 
if (validarHorarioIngresoSalida(horaIngreso, horaSalida)) {
    console.log("Horarios válidos.");
} else {
    console.log("Hay un error en los horarios.");
}
