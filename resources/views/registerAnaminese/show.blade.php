@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Anaminese #{{$anaminese->id}}</h3>
    </div>

    <div class="box-body">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Tratamento') !!}
                        {!! Form::text('tratamento', $anaminese->tratamento, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input email required">
                        {!! Form::label('Anaminese') !!}
                        {!! Form::text('anaminese', $anaminese->anaminese, ['class' => 'form-control', 'disabled' => true]) !!}
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