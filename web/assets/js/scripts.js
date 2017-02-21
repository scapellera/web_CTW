function preguntar(nif_empresa){
    if(nif_empresa!="0"){
   eliminar=confirm("¿Deseas eliminar este cliente?");
   if (eliminar)
   //Redireccionamos si das a aceptar
     window.location.href="../assets/php/delete/delete_cliente.php?id="+nif_empresa; //página web a la que te redirecciona si confirmas la eliminación
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el cliente...')
    }else{
        alert ('Error, solo se puede eliminar en local siendo el admin');
    }
}
