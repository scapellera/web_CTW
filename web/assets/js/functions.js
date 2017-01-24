function cambia_sede(){ 
    //tomo el valor del select del cliente elegido 
    var cliente 
    cliente = document.f_cliente_sede.select_box_nif_empresa[document.f_cliente_sede.select_box_nif_empresa.selectedIndex].value 
    //miro a ver si el cliente está definido 
    if (cliente != "") { 
        //si estaba definido, entonces coloco las opciones de la provincia correspondiente. 
        //selecciono el array de sedes adecuado 
        sedes=eval("cliente_" + cliente) 
        //calculo el numero de sedes 
        num_sedes = sedes.length 
        //marco el número de sedes en el select 
        document.f_cliente_sede.select_box_sede_cliente.length = num_sedes 
        //para cada sede del array, la introduzco en el select 
        for(i=0;i<num_sedes;i++){ 
            document.f_cliente_sede.select_box_sede_cliente.options[i].value=sedes[i] 
            document.f_cliente_sede.select_box_sede_cliente.options[i].text=sedes[i] 
        }   
    }else{ 
        //si no había sede seleccionada, elimino las provincias del select 
        document.f_cliente_sede.select_box_sede_cliente.length = 1 
        //coloco un guión en la única opción que he dejado 
        document.f_cliente_sede.select_box_sede_cliente.options[0].value = "-" 
        document.f_cliente_sede.select_box_sede_cliente.options[0].text = "-" 
    } 
    //marco como seleccionada la opción primera de sede 
    document.f_cliente_sede.select_box_sede_cliente.options[0].selected = true 
}