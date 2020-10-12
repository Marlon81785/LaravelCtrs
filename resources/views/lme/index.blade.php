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
                    <th>Data</th>
                    <th>Medico</th>
                    <th>Periodo inicial</th>
                    <th>Periodo final</th>
                    <th>Status</th>
                </thead>
                
                <tbody>
                    @foreach($lme as $value)
                    <tr>
                        <td>{{ $value->created_at }}</td>
                        <td>{{ $value->medico }}</td>
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
            <a href="{{ URL('/') }}/registerPacient/" class="btn btn-primary bgpersonalizado">Voltar</a>
            <a href="{{ URL('/') }}/lme/create/{{ $paciente->id}}" class="btn btn-primary bgpersonalizado">Incluir</a>

        </div>

    </div>

</div>

@endsection