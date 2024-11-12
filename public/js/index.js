// Simulación de horarios ocupados de las salas
const horariosOcupados = {
    'Lunes': ['09:00-10:00', '14:00-15:00'],
    'Martes': ['11:00-12:00', '16:00-17:00'],
    'Miércoles': ['10:00-11:00', '15:00-16:00'],
    'Jueves': ['08:00-09:00', '13:00-14:00'],
    'Viernes': ['09:00-10:00', '15:00-16:00'],
    'Sábado': ['10:00-11:00']
};

function esHorarioOcupado(dia, horaIngreso) {
    const hora = horaIngreso.split(':').map(Number);
    const horaFormateada = `${hora[0].toString().padStart(2, '0')}:${hora[1].toString().padStart(2, '0')}`;

    if (!horariosOcupados[dia]) return false; 

    return horariosOcupados[dia].some(horario => {
        const [inicio, fin] = horario.split('-');
        return horaFormateada >= inicio && horaFormateada < fin;
    });
}

function validarFechaYHorario() {
    const inputFecha = document.getElementById('fechaIngreso');
    const fechaSeleccionada = new Date(inputFecha.value);

    if (isNaN(fechaSeleccionada.getTime())) {
        alert("Por favor, selecciona una fecha válida.");
        inputFecha.value = "";
        return false;
    }

    const diaSemana = fechaSeleccionada.getDay();
    const diasLaborales = [1, 2, 3, 4, 5];
    const dia = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'][diaSemana];

    if (diaSemana === 0 || (diaSemana === 6 && fechaSeleccionada.getHours() > 16)) {
        alert("La sala solo está disponible de lunes a sábado.");
        inputFecha.value = "";
        return false;
    }

    return dia;
}

function validarHorarioIngresoSalida(horaIngreso, horaSalida, dia) {
    const horaInicioSemana = "07:00";
    const horaFinSemana = "20:50";
    const horaFinSabado = "16:30";

    const [horaIng, horaSal] = [horaIngreso, horaSalida].map(h => new Date(`1970-01-01T${h}:00`));
    const [inicio, fin] = dia === 'Sábado' ? [new Date(`1970-01-01T${horaInicioSemana}:00`), new Date(`1970-01-01T${horaFinSabado}:00`)] :
        [new Date(`1970-01-01T${horaInicioSemana}:00`), new Date(`1970-01-01T${horaFinSemana}:00`)];

    if (horaIng < inicio || horaIng > fin) {
        alert("El horario de ingreso es inválido. Debe estar dentro del rango permitido.");
        return false;
    }

    if (horaSal && (horaSal < horaIng || horaSal > fin)) {
        alert("El horario de salida es inválido. Debe estar después del horario de ingreso y dentro del rango permitido.");
        return false;
    }

    return true;
}

const inputFecha = document.getElementById('fechaIngreso');
const horaIngreso = "08:00";
const horaSalida = "15:00";

const dia = validarFechaYHorario();
if (dia && !esHorarioOcupado(dia, horaIngreso)) {
    if (validarHorarioIngresoSalida(horaIngreso, horaSalida, dia)) {
        console.log("Horarios válidos y sala disponible.");

    } else {
        console.log("Hay un error en los horarios.");
    }
} else {
    console.log("La sala está ocupada o la fecha no es válida.");
}