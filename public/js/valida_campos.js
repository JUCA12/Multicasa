function valida_form_index(){
    var v_nombre= document.getElementById("txtnombre_casa").value.trim();
    var v_cyn= document.getElementById("txtcalle_num").value.trim();
    var v_col= document.getElementById("txtcolonia").value.trim();
    var v_ciudad= document.getElementById("txtciudad").value.trim();
    var v_estado= document.getElementById("txtestado").value.trim();
    var v_cp= document.getElementById("txtcp").value.trim();
    var v_precio= document.getElementById("txtprecio").value.trim();
    var v_rec= document.getElementById("txtrec").value.trim();
    var v_baños= document.getElementById("txtbaños").value.trim();


    if (v_nombre.length==0){
        alert("El campo de nombre no puede ir vacio");
        return false;
    }
    else if (v_cyn.length==0){
        alert("El campo de dirección no puede ir vacio");
        return false;
    }
    else if (v_col.length==0){
        alert("El campo de colonia no puede ir vacio");
        return false;
    }
    else if (v_ciudad.length==0){
        alert("El campo de ciudad no puede ir vacio");
        return false;
    }
    else if (v_estado.length==0){
        alert("El campo de estado no puede ir vacio");
        return false;
    }
    else if (v_cp.length==0){
        alert("El campo de cp no puede ir vacio");
        return false;
    }
    else if (v_precio.length==0){
        alert("El campo de precio no puede ir vacio");
        return false;
    }
    else if (v_rec.length==0){
        alert("El campo de recamaras no puede ir vacio");
        return false;
    }
    else if (v_baños.length==0){
        alert("El campo de baños no puede ir vacio");
        return false;
    }
    else if(!valida_curp){
        alert("Error: CURP esta mal formado");
    }

}