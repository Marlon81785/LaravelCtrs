@extends('layouts.app')

@section('content')

<script src="{{ asset('js/lmeScripts/logica.js') }}"></script>
<script src="{{ asset('js/lmeScripts/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/lmeScripts/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/lmeScripts/data.js') }}"></script>
<script src="{{ asset('js/lmeScripts/lme.js') }}"></script>




<div class="box">
    
    <div class="box-header">
        <h3 class="box-title">LME</h3>
    </div>

    <div class="box-body table-responsive">
        
        Criar nova LME para o paciente {{ $paciente['nomePaciente'] }}
    
        <br><br>


        <div hidden>
            <h3>Informações do paciente</h3>
            <input id="nomePaciente" type="text" placeholder="Nome completo do paciente" value="{{ $paciente['nomePaciente'] }}">
            <input id="nomeMae" type="text" placeholder="Nome da mae do paciente" value="{{ $paciente['nomeMaePaciente'] }}">
            <input id="peso" type="text" placeholder="Peso" value="{{ $paciente['peso'] }}">
            <input id="altura" type="text" placeholder="Altura" value="{{ $paciente['altura'] }}">
            <input id="cpf" type="text" placeholder="CPF" value="{{ $paciente['cpf'] }}">
            <input id="telefone" type="text" placeholder="telefone" value="{{ $paciente['telefone'] }}">
        </div>

    <div>
        <h3>Medicamentos -> LME</h3>
        <select name="" id="medicamento">
            <option value="ALFAEPOETINA 2000UI (INJETAVEL)">ALFAEPOETINA 2000UI</option>
            <option value="ALFAEPOETINA 3000UI (INJETAVEL)">ALFAEPOETINA 3000UI</option>
            <option value="ALFAEPOETINA 4000UI (INJETAVEL)">ALFAEPOETINA 4000UI</option>
            <option value="SACARATO DE HIDROXIDO FERRICO">SACARATO DE HIDROXIDO FERRICO</option>
        </select>
    
        <select name="" id="dosagem">
            <option value="AA">ALFAEPOETINA ATAQUE</option>
            <option value="AM">ALFAEPOETINA MANUTENÇÃO</option>
            <option value="SA">SACARATO ATAQUE</option>
            <option value="SM">SACARATO MANUTENÇÃO</option>
            <option value="CALCITRIOL 30 CP">CALCITRIOL 30 CP</option>
            <option value="CALCITRIOL 60 CP">CALCITRIOL 60 CP</option>
            <option value="CINACALCETE 30 CP">CINACALCETE 30 CP</option>
            <option value="CINACALCETE 60 CP">CINACALCETE 60 CP</option>
    
        </select>
    
        <button onclick="adicionarNaTabela()">Adicionar</button>
    
        <div>
            <div>
                <table class="table">
                    <th>Medicamento</th>
                    <th>Quantidade</th>
                    <th>Opções</th>
                    <tbody id="tabela-medicamento">
                    
                    </tbody>
                    
                </table>
            </div>
        </div>
    
        <hr>
    </div>

    <div style="display: block;">
        <h3>Configurações -> LME</h3>
        <select id="cid" name="" id="" hidden>
            <option value="N18.0">N18.0 - DOENÇA RENAL EM ESTADIO FINAL</option>
            <option value="N25.0">N25.0 - OSTEODISTROFIA RENAL</option>
        </select>

        <div>
            <label for="anaminese">Anamnese</label>
            <select name="" id="anaminese">
                <option value="Paciente portador de IRC em programa hemodialitico convencional">Paciente portador de IRC em programa hemodialitico convencional</option>
                <option value="Paciente portador de IRC em programa de Dialise Peritoneal Ambulatorial Continua (CAPD).">Paciente portador de IRC em programa de Dialise Peritoneal Ambulatorial Continua (CAPD).</option>
                <option value="Paciente portador de IRC em tratamento conservador.">Paciente portador de IRC em tratamento conservador.</option>
            </select>
        </div>

        <div>
            <label for="emUso">Realizou tratamento previo ou esta em tratamento</label>
            <select name="" id="emUso">
                <option value="s">SIM - Em uso</option>
                <option value="n">NÃO</option>
            </select>
        </div>
        
        <div>
            <label for="medico">Responsável</label>
            <select name="" id="medico">
                <option value="Eberaldo Severiano Domingos">Eberaldo Severiano Domingos</option>
            </select>
        </div>
    
    
        <div>
            <label for="tratamento">Tipo de tratamento</label>
            <select name="" id="tratamento">
                <option value="c">Conservador</option>
                <option value="dp">Dialise Peritoneal</option>
                <option value="hd">Hemodialise</option>
            </select>

        </div>
        <div>
            <label for="primeiroTratamentoA">formulario Alfaepoetina</label>
            <select name="" id="primeiroTratamentoA">
                <option value="s">Primeiro tratamento com Alfaepoetina</option>
                <option value="n">Não é o primeiro tratamento</option>
            </select>

        </div>

        <div>
            <label for="primeiroTratamentoS">formulario Sacarato</label>
            <select name="" id="primeiroTratamentoS">
                <option value="s">Primeiro tratamento com Sacarato</option>
                <option value="n">Não é o primeiro tratamento</option>
            </select>
        </div>
            <select name="" id="usouMedicamento" hidden>
                <option value="s">SIM - Usou medicamento fornecido pelo SUS</option>
                <option value="n">NÂO - Não usou medicamento fornecido pelo sus</option>
            </select>
        <div>
            <label for="">Estagio da DRC</label>
            <select name="" id="estagioDrc">
                <option value="V">V</option>
                <option value="IV">IV</option>
                <option value="III">III</option>
                <option value="II">II</option>
            </select>
        </div>
    </div>
    
    <br><br><br>

    <button onclick="anemiaCombinado()">Gerar Alfaepoetina + sacarato</button>
    <button onclick="alfaepoetina()">Gerar Alfaepoetina</button>
    <button onclick="noripurum()">Gerar Sacarato</button>



        <br><br>   


        <div class="form-group text-right">
            <button onclick="submitForm()" class="btn btn-primary bgpersonalizado">Gravar</button>
            <a href="{{ URL('/') }}/lme/{{$paciente['id']}}" class="btn btn-primary bgpersonalizado">Voltar</a>
        </div>

    </div>








    <form name="formOcult" id="formOcult" method="POST" action="{{ URL('/') }}/lme/save">
    {{ csrf_field() }}
        <input type="hidden" name="pacient" id="pacient" value="{{ $paciente['id'] }}">
        <input id="resp2" name="resp" type="hidden" value="">
        <input id="cid2" name="cid" type="hidden">
        <input id="inicio2" name="inicio" type="hidden">
        <input id="fim2" name="fim" type="hidden">
        <input id="med1" name="med1" type="hidden" value="">
        <input id="dose1" name="dose1" type="hidden" value="">
        <input id="med2" name="med2" type="hidden" value="">
        <input id="dose2" name="dose2" type="hidden" value="">
        

    </form> 

</div>

<script>

    
    var cont = 0;
    var medicamento1 = "";
    var medicamento2 = "";
    var dosagem1 = "";
    var dosagem2 = "";

    function getData(){
        try{
            medicamento1 = document.querySelectorAll("td")[0].textContent;
            dosagem1 = medicamento2 = document.querySelectorAll("td")[1].textContent;
        }catch{
            console.log("medicamento1 nao localizado");
            return 0;
        }
        try{
            medicamento2 = document.querySelectorAll("td")[3].textContent;
            dosagem2 = document.querySelectorAll("td")[4].textContent;
        }catch{
            console.log("medicamento2 nao localizado");
            return 0;
        }
        
    }


    function submitForm(){
        getData();
        try{
            document.getElementById("med1").value = medicamento1;
            document.getElementById("dose1").value = dosagem1;

            
            document.getElementById("med2").value = medicamento2;
            document.getElementById("dose2").value = dosagem2;

            document.getElementById("resp2").value = document.getElementById('medico').value;
            document.getElementById("cid2").value = document.getElementById('cid').value;
            document.getElementById("inicio2").value = ano+"-"+mes+"-"+dia;

        }catch{
            console.log("Parece que temos falha no formulario");
            
        }
        
        var mesFinal = mes+3;
        if(mesFinal > 12){
            mesFinal = mesFinal - 12;
            ano = ano+1;
        }
        document.getElementById("fim2").value = ano+"-"+mesFinal+"-"+dia;

        if(medicamento1 !== ""){
            document.getElementById("formOcult").submit();
        }
        


        
    }

    
</script>

@endsection