@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Indicador #{{$indicators->id}}</h3>
    </div>

    <div class="box-body">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Query') !!}
                        {!! Form::text('query', $indicators->query, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('name', 'Nome do indicador') !!}
                        {!! Form::text('name', $indicators->name, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Cor') !!}
                        {!! Form::select('color', [
                            'aqua' => 'Azul',
                            'red' => 'Vermelho',
                            'green' => 'Verde',
                            'warning' => 'Laranja'
                        ], $indicators->color, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Link') !!}
                        {!! Form::text('link', $indicators->link, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Tamanho') !!}
                        {!! Form::select('size', [
                            1 => 1,
                            2 => 2,
                            3 => 3,
                            4 => 4,
                            5 => 5,
                            6 => 6,
                            7 => 7,
                            8 => 8,
                            9 => 9,
                            10 => 10,
                            11 => 11,
                            12 => 12
                        ], $indicators->size, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Icon') !!}
                        {!! Form::text('glyphicon', $indicators->glyphicon, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Descrição') !!}
                        {!! Form::text('description', $indicators->description, ['class' => 'form-control', 'disabled' => true]) !!}
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