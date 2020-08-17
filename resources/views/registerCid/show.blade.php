@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">CID #{{$cid->id}}</h3>
    </div>

    <div class="box-body">
    
        @if(isset($cid->perfil) && $cid->perfil->administrator != 0)
            <div class="text-right">
                <a href="{{ URL('/') }}/{{$cid->id}}/permissions" class="btn btn-warning">Permissões</a>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('CID') !!}
                        {!! Form::text('name', $cid->cid, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Descrição') !!}
                        {!! Form::text('desc', $cid->desc, ['class' => 'form-control', 'disabled' => true]) !!}
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