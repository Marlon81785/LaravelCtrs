@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Medicamento #{{$medicamentos->id}}</h3>
    </div>

    <div class="box-body">
    
    <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Categoria') !!}
                            {!! Form::text('categoria', $medicamentos->categoria, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text require">
                            {!! Form::label('medicamento') !!}
                            {!! Form::text('medicamento', $medicamentos->medicamento, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text require">
                            {!! Form::label('aplicacao1') !!}
                            {!! Form::text('aplicacao1', $medicamentos->aplicacao1, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text require">
                            {!! Form::label('aplicacao2') !!}
                            {!! Form::text('aplicacao2', $medicamentos->aplicacao2, ['class' => 'form-control']) !!}
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