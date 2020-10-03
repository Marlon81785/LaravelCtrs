@extends('layouts.app')

@section('content')

<div class="box">
    
    <div class="box-header">
        <h3 class="box-title">LME</h3>
    </div>

    <div class="box-body table-responsive">
        
        Criar nova LME para o paciente {{ $paciente['nomePaciente'] }}
    
        <br><br>


        <div>
            <div class="form-group">
              <label for="">Responsável</label>
              <select class="form-control" name="resp" id="resp">
              @foreach($medicos as $value)
                <option value="{{ $value->nome }}">{{ $value->nome }}</option>
              @endforeach
                
              </select>
            </div>

            <div class="form-group">
              <label for="">CID</label>
              <select class="form-control" name="cid" id="cid">
                @foreach($cid as $value)
                    <option value="{{ $value->cid }}">{{ $value->cid." - ".$value->desc }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
                <label for="example-date-input" class="col-2 col-form-label">Data Inicial</label>
                <div class="col-10">
                    <input class="form-control" type="date" value="" id="inicio">
                </div>
            </div>

            <div class="form-group">
                <label for="example-date-input" class="col-2 col-form-label">Data Final</label>
                <div class="">
                    <input class="form-control" type="date" value="" id="fim">
                </div>
            </div>

            <div class="box body" id='areaMedicamentos'>
                
                <select name="medicamentos" id="medicamentos">
                    @foreach($medicamentos as $value)
                        <option value="{{ $value->medicamento }}">{{ $value->medicamento }}</option>
                    @endforeach
                </select>

                <select name="aplicacao" id="aplicacao">
                    <option value="ATAQUE">ATAQUE</option>
                    <option value="MANUTENCAO">MANUTENÇÃO</option>
                </select>

                <button onclick="medicamentosNaLME()">Adicionar</button><br><br>

                <div>
                    <span>Medicamentos na LME</span>
                </div>

                <table id="table" class="table">
                    <tr>
                        <th>Medicamento</th>
                        <th>Aplicação</th>
                        <th>Opção</th>

                    </tr>

                    <tr id="medicamentoReceita" class="list-group">
                        
                        
                    </tr>
                        

                </table>
                



                
            
            </div>


            
            
        </div>



        <br><br>   


        <div class="form-group text-right">
            <button onclick="submitForm()" class="btn btn-primary bgpersonalizado">Gravar</button>
            <a href="{{ URL('/') }}/lme/{{$paciente['id']}}" class="btn btn-primary bgpersonalizado">Cancelar</a>
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
        medicamento1 = document.getElementById("md0").innerHTML;
        dosagem1 = document.getElementById("dos0").innerHTML;
        if ($("td#md1").length) {
            console.log("existe");
            medicamento2 = document.getElementById("md1").innerHTML;
            dosagem2 = document.getElementById("dos1").innerHTML;
            console.log(medicamento2);
            console.log(dosagem2);

        }
        
        console.log(medicamento1);
        console.log(dosagem1);
        
    }


    function submitForm(){
        getData();
        document.getElementById("med1").value = medicamento1;
        document.getElementById("dose1").value = dosagem1;

        
        document.getElementById("med2").value = medicamento2;
        document.getElementById("dose2").value = dosagem2;

        document.getElementById("resp2").value = document.getElementById('resp').value;
        document.getElementById("cid2").value = document.getElementById('cid').value;
        document.getElementById("inicio2").value = document.getElementById('inicio').value;
        document.getElementById("fim2").value = document.getElementById('fim').value;

        document.getElementById("formOcult").submit();


        
    }

    
    
    function remove(id)
    {
        document.getElementById(id).remove();
        cont = cont-1;
    }
    function medicamentosNaLME()
    {
        if(cont == 2){
            alert("No caso da anemia só disponibilizei 2 medicamentos por lme");
            return 0;
        }
        var medicamentoSelecionado = document.getElementById('medicamentos').value;
        var aplicacao = document.getElementById('aplicacao').value;
        document.getElementById('table').innerHTML += "<tr id="+cont+"><td id='md"+cont+"'>" +medicamentoSelecionado+ "</td><td id='dos"+cont+"'>" +aplicacao+ "</td><td><button onclick='remove("+cont+")'>Remover</button></td></tr>";
        cont++;
        
    }
</script>

@endsection