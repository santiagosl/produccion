// FUNCION PARA BORRAR UN REGISTRO DE LA BASE DE DATOS

function borrarRegistro()
        {
        
        var opcion = confirm("¿ Seguro que desea borrar el registro ?");

        if (opcion == true) {
            return true;
        } else {
           return false;
        }
    }
