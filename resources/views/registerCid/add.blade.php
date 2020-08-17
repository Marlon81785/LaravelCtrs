@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Cadastrar CID</h3>
    </div>

    {!! Form::open(['url' => 'registerCid', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('CID') !!}
                            {!! Form::text('cid', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text require">
                            {!! Form::label('Descrição') !!}
                            {!! Form::text('desc', null, ['class' => 'form-control']) !!}
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