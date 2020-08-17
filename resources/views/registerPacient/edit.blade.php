@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Editar usuário</h3>
    </div>

    {!! Form::open(['url' => 'registerPacient/$pacient->id', 'method' => 'put', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">

            <input type="hidden" name="id" value="{{$pacient->id}}">

            <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Nome do Paciente') !!}
                        {!! Form::text('nomePaciente', $pacient->nomePaciente, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Nome da Mãe') !!}
                        {!! Form::text('nomeMaePaciente', $pacient->nomeMaePaciente, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Tratamento') !!}
                        {!! Form::text('tratamento', $pacient->tratamento, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('CPF') !!}
                        {!! Form::text('cpf', $pacient->cpf, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('CNS') !!}
                        {!! Form::text('cns', $pacient->cns, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Data de Nascimento') !!}
                        {!! Form::text('dataNasc', $pacient->dataNasc, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

            <div class="form-group text-right">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
            </div>
        </div>

    {!! Form::close() !!}

</div>

@endsection