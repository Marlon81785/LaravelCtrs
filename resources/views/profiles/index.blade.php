@extends('layouts.app')

@section('content')

<div class="box">
    
    <div class="box-header">
        <h3 class="box-title">Perfis de acesso</h3>
    </div>

    <div class="box-body table-responsive">
    
        <div class="form-group">
            <div class="col-md-12"> 
                <div class="col-md-12">
                    <label for="">Informe um perfil padrão</label>
                    <p> Este perfil será usado para os cadastros através do formulário público (se estiver habilitado). </p>
    

                        {!! Form::open(['url' => 'profiles/default', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

                        <select name="default">
                            <?php  foreach ($profiles as $key => $value) {  ?>
                                <option value="<?php echo $value->id; ?>" <?php echo ($value->default) ? 'selected="selected"': ''; ?> ><?php  echo $value->name; ?></option>
                            <?php } ?>
                        </select>

                        <input type="submit" value="Salvar">
                        <br>
                        <br>

                        <hr>

                        {!! Form::close() !!}

                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <br>
        <br>

        <table id="datatable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>O usuário com este perfil tem acesso completo ao sistema?</th>
                    <th>O usuário com este perfil pode ver dados de outros usuários?</th>
                    <th>Padrão</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                
                @foreach($profiles as $value)

                <tr>
                    <td> {{$value->id}} </td>

                    <td> {{$value->name}} </td>
                    <td> {{ ( $value->administrator ? 'Sim' : 'Não') }} </td>
                    <td> {{ ( $value->moderator ? 'Sim' : 'Não') }} </td>
                    <td> {{ ( $value->default ? 'Sim' : 'Não') }} </td>
                    
                    <td>

                        <a href="{{ URL('/') }}/profiles/{{$value->id}}/edit" alt="Editar" title="Editar" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>

                        <a href="{{ URL('/') }}/profiles/{{$value->id}}" alt="Visualizar" title="Visualizar" class="btn btn-default">
                            <span class="glyphicon glyphicon-share-alt"></span>
                        </a>

                        <form method="POST" action="{{ route('profiles.destroy', $value->id) }}" accept-charset="UTF-8">
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
            <a href="{{ URL('/') }}/profiles/create" class="btn btn-primary bgpersonalizado">Cadastrar</a>
        </div>

    </div>

</div>

@endsection