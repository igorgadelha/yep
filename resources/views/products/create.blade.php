@extends('app')

@section('content')
  <h1>Cadastro de {{$base['singular']}}</h1>
  <hr/>
  @include('errors._check')


  {!! Form::open ( [ 'route' => $base['base'].'.store','class'=>'form-horizontal' ] ) !!}
    @include('products._form')
    <div class="form-group">
      {!! Form::submit('Salvar', [ 'class' => 'btn btn-primary pull-right' ]) !!}
    </div>
  {!! Form::close() !!}

@endsection
