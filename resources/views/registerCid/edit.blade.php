@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Editar usuário</h3>
    </div>

    {!! Form::open(['url' => 'registerCid/$cid->id', 'method' => 'put', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">
        
            @if(isset($user->perfil) && $user->perfil->administrator != 1)
                <div class="text-right">
                    <a href="{{ URL('/') }}/{{$user->id}}/permissions" class="btn btn-warning">Permissões</a>
                </div>
            @endif

            <input type="hidden" name="id" value="{{$cid->id}}">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('CID') !!}
                            {!! Form::text('cid', $cid->cid, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Descrição') !!}
                            {!! Form::text('desc', $cid->desc, ['class' => 'form-control']) !!}
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