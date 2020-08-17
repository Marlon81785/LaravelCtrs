@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Editar Medicamento</h3>
    </div>

    {!! Form::open(['url' => 'registerDrugs/$medicamentos->id', 'method' => 'put', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">

            <input type="hidden" name="id" value="{{$medicamentos->id}}">

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

            <div class="form-group text-right">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
            </div>
        </div>

    {!! Form::close() !!}

</div>

@endsection