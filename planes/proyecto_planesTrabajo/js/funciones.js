
function mostarAlerta() {

    alert("Se editó correctamente la petición");
}

function alerta() {

    alert("Se ingresó correctamente el Plan de Trabajo");
}

function rescate(){
    
    alert("Se realizó correctamente el rescate");
}

function archivo(){
    
   alert("Se subió el archivo correctamente");
   
}

function confirmarEliminacion(idPeticion) {
    var x = confirm("Desea eliminar el registro?");

    if (x) {
        window.location.href = "https://d.pcspucv.cl/planes/proyecto_planesTrabajo/funciones/eliminar_plan.php?id=" + idPeticion;
    }else{
        return false;
    }
}

function confirmarEliminacion2(idPeticion) {
    var x = confirm("Desea eliminar el registro?");

    if (x) {
        window.location.href = "https://d.pcspucv.cl/planes/proyecto_planesTrabajo/funcionesDirect/eliminar_plan.php?id=" + idPeticion;
    }else{
        return false;
    }
}

function Aceptar(idEstado) {
    var x = confirm("¿Desea Aceptar este Plan de Acción?");

    if (x) {
        window.location.href = "../funcionesAdmin/aceptar.php?id=" + idEstado;
    }
}

function Rechazar(idEstado) {
    var x = confirm("Desea Rechazar Esta Solicitud?");

    if (x) {
        window.location.href = "../usuario_autorizador/update_estado_rechazar.php?id=" + idEstado;
    }
}





