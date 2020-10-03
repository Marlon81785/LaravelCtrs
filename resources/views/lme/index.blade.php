@extends('layouts.app')

@section('content')

<div class="box">
    
    <div class="box-header">
        <h3 class="box-title">LME</h3>
    </div>

    <div class="box-body table-responsive">
        
        LME do paciente {{ $paciente['nomePaciente'] }}
    
        <br><br>

        <div>
            <table class="table">
                <thead>
                    <th>Medicamento</th>
                    <th>Medico</th>
                    <th>Dosagem</th>
                    <th>Periodo inicial</th>
                    <th>Periodo final</th>
                    <th>Status</th>
                </thead>
                
                <tbody>
                    @foreach($lme as $value)
                    <tr>
                        <td>{{ $value->medicamento }}</td>
                        <td>{{ $value->medico }}</td>
                        <td>{{ $value->dosagem }}</td>
                        <td>{{ $value->inicial }}</td>
                        <td>{{ $value->final }}</td>
                        <td>{{ $value->status }}</td>
                    
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>

        <br><br>   


        <div class="form-group text-right">
            <a href="{{ URL('/') }}/registerPacient/create" class="btn btn-primary bgpersonalizado">Cadastrar</a>
        </div>

    </div>

</div>

@endsection