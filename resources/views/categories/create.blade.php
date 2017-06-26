@extends('app')

@section('content')
  <h1>Nova Categoria</h1>
  <hr/>
  {!! Breadcrumbs::render('categories.create') !!}
  @include('errors._check')

  <div class="row">
    <div class="col">
      {!! Form::open ( [ 'route' => 'categories.store','class'=>'form-inline' ] ) !!}
      @include('categories._form')

      {!! Form::submit('Salvar', [ 'class' => 'btn btn-primary' ]) !!}
      {!! Form::close() !!}
    </div>
  </div>
@endsection
