@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Paciente #{{$pacient->id}}</h3>
    </div>

    <div class="box-body">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Nome do Paciente') !!}
                        {!! Form::text('namePaciente', $pacient->nomePaciente, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Nome da Mãe') !!}
                        {!! Form::text('nomeMaePacient', $pacient->nomeMaePaciente, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Tratamento') !!}
                        {!! Form::text('tratamento', $pacient->tratamento, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Peso') !!}
                        {!! Form::text('peso', $pacient->peso, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Altura') !!}
                        {!! Form::text('altura', $pacient->altura, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Telefone') !!}
                        {!! Form::text('telefone', $pacient->telefone, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('CPF') !!}
                        {!! Form::text('cpf', $pacient->cpf, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('CNS') !!}
                        {!! Form::text('cns', $pacient->cns, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Data de Nascimento') !!}
                        {!! Form::text('dataNasc', $pacient->dataNasc, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>



        <div class="form-group text-left">
            <a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
            <a href="javascript::void(0);" onclick="print();" class="btn btn-primary">Imprimir</a>
        </div>

    </div>

</div>

@endsection