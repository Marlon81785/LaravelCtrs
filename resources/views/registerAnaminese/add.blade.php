@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Cadastrar Anaminase</h3>
    </div>

    {!! Form::open(['url' => 'registerAnaminese', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Tratamento') !!}
                            {!! Form::text('tratamento', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('tratamento') !!}
                            {!! Form::text('anaminese', null, ['class' => 'form-control']) !!}
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