@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Editar perfil</h3>
    </div>

    {!! Form::open(['url' => 'profiles/$profiles->id', 'method' => 'put', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">
    
            {!! Form::hidden('id', $profiles->id) !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Nome') !!}
                            {!! Form::text('name', $profiles->name, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::Label('admin', 'O usuário com este perfil tem acesso de administrador neste sistema?') !!}
                            {!! Form::select('administrator', [ 0 => 'Não', 1 => 'Sim' ], $profiles->administrator, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::Label('master', 'O usuário com este perfil pode ver registros de outros usuários?') !!}
                            {!! Form::select('moderator', [ 0 => 'Não', 1 => 'Sim' ], $profiles->moderator, ['class' => 'form-control']) !!}
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