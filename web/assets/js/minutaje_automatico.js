if ($.session.get("esperandoSalida") != 1) {
    $("#panelSalir").hide();
    $("#panelEntrar").show();
} else {
    $("#panelEntrar").hide();
    $("#panelSalir").show();
}


$("#entrar").click(function () {
    $.session.set("cliente_minutaje", $("#cliente").val());
    $.session.set("sede_minutaje", $("#sede").val());
    $.session.set("servicio_minutaje", $("#servicio").val());
    $.session.set("fecha_minutaje", $("#fecha").val());
    $.session.set("hora_entrada_minutaje", $("#hora_entrada").val());
    $.session.set("esperandoSalida", 1);
    $("#panelEntrar").hide();
    $("#panelSalir").show();
    $("#entrar").text("Hello world!");
    var n = 0;
    var l = document.getElementById("entrar");
    window.setInterval(function () {
        l.innerHTML = n;
        n++;
    }, 1000);
});

$("#salir").click(function () {
    $("input:hidden[name=cliente_minutaje]").val($.session.get("cliente_minutaje"));
    $("input:hidden[name=sede_minutaje]").val($.session.get("sede_minutaje"));
    $("input:hidden[name=servicio_minutaje]").val($.session.get("servicio_minutaje"));
    $("input:hidden[name=fecha_minutaje]").val($.session.get("fecha_minutaje"));
    $("input:hidden[name=hora_entrada_minutaje]").val($.session.get("hora_entrada_minutaje"));
    $.session.set("esperandoSalida", 0);
});


function myFunction1() {
    var d = new Date(); // for now
    //obtener hora actual
    var horas = d.getHours(); // => 9
    var minutos = d.getMinutes(); // =>  30
    d.getSeconds(); // => 51
    var tiempo = horas + ":" + minutos;
    //obtener fecha
    var day = d.getDate();
    var month = d.getMonth() + 1;
    var year = d.getFullYear();
    var fecha = year + "-" + month + "-" + day;

    //passar hora de inicio
    document.getElementById("hora_entrada_print").innerHTML = tiempo;
    document.getElementById('hora_entrada').value = tiempo;

    //passar fecha
    document.getElementById("fecha_print").innerHTML = fecha;
    document.getElementById('fecha').value = fecha;

}

function myFunction2() {
    var d = new Date(); // for now
    var horas = d.getHours(); // => 9
    var minutos = d.getMinutes(); // =>  30
    d.getSeconds(); // => 51
    var tiempo = horas + ":" + minutos;

    document.getElementById("hora_salida_print").innerHTML = tiempo;
    document.getElementById('hora_salida').value = tiempo;
}

/*
 var centesimas = 0;
 var segundos = 0;
 var minutos = 0;
 var horas = 0;
 function inicio () {
 control = setInterval(cronometro,10);
 document.getElementById("inicio").disabled = true;
 document.getElementById("parar").disabled = false;
 document.getElementById("continuar").disabled = true;
 document.getElementById("reinicio").disabled = false;
 }
 function parar () {
 clearInterval(control);
 document.getElementById("parar").disabled = true;
 document.getElementById("continuar").disabled = false;
 }
 function reinicio () {
 clearInterval(control);
 centesimas = 0;
 segundos = 0;
 minutos = 0;
 horas = 0;
 Centesimas.innerHTML = ":00";
 Segundos.innerHTML = ":00";
 Minutos.innerHTML = ":00";
 Horas.innerHTML = "00";
 document.getElementById("inicio").disabled = false;
 document.getElementById("parar").disabled = true;
 document.getElementById("continuar").disabled = true;
 document.getElementById("reinicio").disabled = true;
 }
 function cronometro () {
 if (centesimas < 99) {
 centesimas++;
 if (centesimas < 10) { centesimas = "0"+centesimas }
 Centesimas.innerHTML = ":"+centesimas;
 }
 if (centesimas == 99) {
 centesimas = -1;
 }
 if (centesimas == 0) {
 segundos ++;
 if (segundos < 10) { segundos = "0"+segundos }
 Segundos.innerHTML = ":"+segundos;
 }
 if (segundos == 59) {
 segundos = -1;
 }
 if ( (centesimas == 0)&&(segundos == 0) ) {
 minutos++;
 if (minutos < 10) { minutos = "0"+minutos }
 Minutos.innerHTML = ":"+minutos;
 }
 if (minutos == 59) {
 minutos = -1;
 }
 if ( (centesimas == 0)&&(segundos == 0)&&(minutos == 0) ) {
 horas ++;
 if (horas < 10) { horas = "0"+horas }
 Horas.innerHTML = horas;
 }
 }*/
