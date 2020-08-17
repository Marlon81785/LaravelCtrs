@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Editar Anaminese</h3>
    </div>

    {!! Form::open(['url' => 'registerAnaminese/$anaminese->id', 'method' => 'put', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">

            <input type="hidden" name="id" value="{{$anaminese->id}}">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Tratamento') !!}
                            {!! Form::text('tratamento', $anaminese->tratamento, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input email required">
                            {!! Form::label('Anaminese') !!}
                            {!! Form::text('anaminese', $anaminese->anaminese, ['class' => 'form-control']) !!}
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