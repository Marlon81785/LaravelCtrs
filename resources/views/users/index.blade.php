@extends('layouts.app')

@section('content')

<div class="box">
    
    <div class="box-header">
        <h3 class="box-title">Usuários</h3>
    </div>

    <div class="box-body table-responsive">

        <table id="datatable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Cargo</th>
                    <th>Usuário</th>
                    <th>Senha</th>
                    <th>Perfil</th>
                    <th>Imagem</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                
                @foreach($users as $value)

                <tr>
                    <td> {{$value->id}} </td>

                    <td> {{ucwords(strtolower($value->name))}} </td>

                    <td> {{$value->email}} </td>
                    
                    <td> {{$value->profession}} </td>
                        
                    <td> {{$value->username}} </td>
                
                    <td> ****** </td>

                    <td> {{ (isset($value->perfil) ? $value->perfil->name : '') }} </td>

                    <td> 
                        @if($value->image)
                            <a class="fancybox" rel="gallery1" target="_blank" href="images/{{$value->image}}">
                                <img src="images/{{$value->image}}" width="30">
                            </a>
                        @endif
                    </td>

                    <td>

                        <a href="{{ URL('/') }}/users/{{$value->id}}/edit" alt="Editar" title="Editar" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>

                        <a href="{{ URL('/') }}/users/{{$value->id}}" alt="Visualizar" title="Visualizar" class="btn btn-default">
                            <span class="glyphicon glyphicon-share-alt"></span>
                        </a>

                        <form method="POST" action="{{ route('users.destroy', $value->id) }}" accept-charset="UTF-8">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" onclick="return confirm('Tem certeza que quer deletar?')" class="btn btn-danger glyphicon glyphicon-trash">
                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <br><br>

        <div class="form-group text-right">
            <a href="{{ URL('/') }}/users/create" class="btn btn-primary bgpersonalizado">Cadastrar</a>
        </div>

    </div>

</div>

@endsection