@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Medico #{{$medicos->id}}</h3>
    </div>

    <div class="box-body">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Nome') !!}
                        {!! Form::text('nome', $medicos->nome, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('CRM') !!}
                        {!! Form::text('crm', $medicos->crm, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('CNS') !!}
                        {!! Form::text('cns', $medicos->cns, ['class' => 'form-control', 'disabled' => true]) !!}
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