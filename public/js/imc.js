var total = 0;

function calcularImc() {

    talla = document.getElementById("talla").value;
    peso = document.getElementById("peso").value;
    total = (total == null || total == undefined || total == "") ? 0 : total;
    talla_cm = parseInt(talla)/100 * parseInt(talla)/100;
    total = peso/talla_cm;	
    document.getElementById('imc').innerHTML = total.toFixed(2);
    total = document.getElementById('imc').value;
    
    if(total<18.5){ diagnutricion.innerHTML = "BAJO PESO"; }
	else if(total>=18.5 && total<=24.9){ diagnutricion.innerHTML = "NORMOPESO"; }
	else if(total>=25 && total<=29.9){ diagnutricion.innerHTML = "SOBREPESO"; }
    else if(total>=30 && total<= 34.99){ diagnutricion.innerHTML = "OBESIDAD";}
    else if(total>=35 && total<= 39.99){ diagnutricion.innerHTML = "OBESIDAD TIPO 2";}
    else if(total>40){ diagnutricion.innerHTML = "OBESIDAD MORBIDA";}
};