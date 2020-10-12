dayName = new Array ("domingo", "segunda", "terça", "quarta", "quinta", "sexta", "sábado")
monName = new Array ("janeiro", "fevereiro", "março", "abril", "maio", "junho","julho", "agosto","setembro", "outubro", "novembro", "dezembro")
now = new Date


//como usar no frontend
document.write ("<h1> Hoje  " + dayName[now.getDay() ] + ", " + now.getDate () + " de " + monName [now.getMonth() ]   +  " de "  +     now.getFullYear () + ". </h1>")


//data na receita
var dia = null;
var mes = null;
var ano = now.getFullYear();

if(now.getDate() < 10){ dia = "0"+now.getDate(); }else{ dia = now.getDate(); }
if(now.getMonth() < 10){ mes = "0"+now.getMonth(); mes++; }else{ dia = now.getMonth(); }

var dataReceita = dia+"/"+mes+"/"+ano;
