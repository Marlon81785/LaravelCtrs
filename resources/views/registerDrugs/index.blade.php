@extends('layouts.app')

@section('content')

<div class="box">
    
    <div class="box-header">
        <h3 class="box-title">Medicamentos</h3>
    </div>

    <div class="box-body table-responsive">

        <table id="datatable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Categoria</th>
                    <th>Medicamento</th>
                    <th>Aplicação1</th>
                    <th>Aplicação2</th>
                    
                    <th></th>
                </tr>
            </thead>

            <tbody>
                
                @foreach($medicamentos as $value)

                <tr>
                    <td> {{$value->id}} </td>

                    <td> {{ucwords(strtolower($value->categoria))}} </td>

                    <td> {{$value->medicamento}} </td>

                    <td> {{$value->aplicacao1}} </td>

                    <td> {{$value->aplicacao2}} </td>

                    

                    <td>

                        <a href="{{ URL('/') }}/registerDrugs/{{$value->id}}/edit" alt="Editar" title="Editar" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>

                        <a href="{{ URL('/') }}/registerDrugs/{{$value->id}}" alt="Visualizar" title="Visualizar" class="btn btn-default">
                            <span class="glyphicon glyphicon-share-alt"></span>
                        </a>

                        <form method="POST" action="{{ route('registerDrugs.destroy', $value->id) }}" accept-charset="UTF-8">
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
            <a href="{{ URL('/') }}/registerDrugs/create" class="btn btn-primary bgpersonalizado">Cadastrar</a>
        </div>

    </div>

</div>

@endsection