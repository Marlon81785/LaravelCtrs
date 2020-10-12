//
var contador = 0;//conta quantos medicamentos foram adicionados na tabela

function adicionarNaTabela(){
    var medicamentoSelecionado = document.getElementById('medicamento').value
    var dosagemSelecionada = document.getElementById('dosagem').value
    console.log(medicamentoSelecionado+dosagemSelecionada)
    document.getElementById('tabela-medicamento').innerHTML += "<tr id="+contador+"><td>"+medicamentoSelecionado+"</td><td>"+dosagemSelecionada+"</td><td><button onclick='removerNaTabela("+contador+")'>Remover</button></td></tr>";
    contador++;
    console.log(contador)
}

function removerNaTabela(data){
    document.getElementById(data).remove();
    contador = contador - 1;
}
