@extends('app')

@section('content')
  <h1>Editar {{$base['singular']}}</h1>
  <hr/>
  @include('errors._check')

    {!! Form::model ( $data,[ 'route' => [ $base['base'].'.update', $data->id ], 'method' => 'PUT' ,'class' => 'form-horizontal' ] ) !!}
      @include($base['base'].'._form')

      <div class="form-group">
        {!! Form::submit('Salvar', [ 'class' => 'btn btn-primary pull-right' ]) !!}
      </div>
    {!! Form::close() !!}

@endsection
