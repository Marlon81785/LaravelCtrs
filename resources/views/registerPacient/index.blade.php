@extends('layouts.app')

@section('content')

<div class="box">
    
    <div class="box-header">
        <h3 class="box-title">Pacientes</h3>
    </div>

    <div class="box-body table-responsive">

        <table id="datatable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome Paciente</th>
                    <th>Nome da Mae</th>
                    <th>Tratamento</th>
                    <th>Peso</th>
                    <th>Altura</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>CNS</th>
                    <th>Data de Nascimento</th>
                    
                    <th></th>
                </tr>
            </thead>

            <tbody>
                
                @foreach($pacient as $value)

                <tr>
                    <td> {{$value->id}} </td>

                    <td><a href="{{ URL('/') }}/lme/{{$value->id}}"> {{ucwords(strtolower($value->nomePaciente))}}</a> </td>

                    <td> {{ucwords(strtolower($value->nomeMaePaciente))}} </td>

                    <td> {{$value->tratamento}} </td>

                    <td> {{$value->peso}} </td>

                    <td> {{$value->altura}} </td>

                    <td> {{$value->telefone}} </td>

                    <td> {{$value->cpf}} </td>

                    <td> {{$value->cns}} </td>

                    <td> {{$value->dataNasc}} </td>


                    <td>
                        

                        <a href="{{ URL('/') }}/registerPacient/{{$value->id}}/edit" alt="Editar" title="Editar" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>

                        <a href="{{ URL('/') }}/lme/{{$value->id}}" alt="Editar" title="Editar" class="btn btn-default">
                            <span class="glyphicon">LME</span>
                        </a>

                        <a href="{{ URL('/') }}/registerPacient/{{$value->id}}" alt="Visualizar" title="Visualizar" class="btn btn-default">
                            <span class="glyphicon glyphicon-share-alt"></span>
                        </a>

                        <form method="POST" action="{{ route('registerPacient.destroy', $value->id) }}" accept-charset="UTF-8">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" onclick="return confirm('Tem certeza que quer deletar?')" class="btn btn-danger glyphicon glyphicon-trash">
                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <br><br>

        <div class="form-group text-right">
            <a href="{{ URL('/') }}/registerPacient/create" class="btn btn-primary bgpersonalizado">Cadastrar</a>
        </div>

    </div>

</div>

@endsection