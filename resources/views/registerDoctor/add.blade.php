@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Cadastrar Medico</h3>
    </div>

    {!! Form::open(['url' => 'registerDoctor', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Nome') !!}
                            {!! Form::text('nome', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text require">
                            {!! Form::label('CRM') !!}
                            {!! Form::text('crm', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text require">
                            {!! Form::label('CNS') !!}
                            {!! Form::text('cns', null, ['class' => 'form-control']) !!}
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