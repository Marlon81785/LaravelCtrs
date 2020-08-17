@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Cadastrar Medicamento</h3>
    </div>

    {!! Form::open(['url' => 'registerDrugs', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Categoria') !!}
                            {!! Form::text('categoria', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text require">
                            {!! Form::label('medicamento') !!}
                            {!! Form::text('medicamento', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text require">
                            {!! Form::label('aplicacao1') !!}
                            {!! Form::text('aplicacao1', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text require">
                            {!! Form::label('aplicacao2') !!}
                            {!! Form::text('aplicacao2', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

        
            

            <div class="form-group text-right">
                {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
            </div>
        </div>

    {!! Form::close() !!}

</div>

@endsection