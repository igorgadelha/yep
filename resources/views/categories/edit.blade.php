@extends('app')

@section('content')
<div class="container">
  <h1>Editar categoria {{ $data->name }}</h1>
  <hr/>
  {!! Breadcrumbs::render('categories.edit', $data) !!}
  @include('errors._check')
  <div class="row">
    <div class="col">
      {!! Form::model ( $data,[ 'route' => [ 'categories.update', $data->id ], 'class' => 'form-inline' ] ) !!}
        @include('categories._form')

        {!! Form::submit('Salvar', [ 'class' => 'btn btn-primary' ]) !!}
      {!! Form::close() !!}
  </div>
  </div>
</div>
@endsection
