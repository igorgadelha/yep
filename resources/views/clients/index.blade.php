@extends('app')

@section('content')
  <h1>{{$base['plural']}}</h1>
  <hr/>
  <div class="row">
    <div class="col-md-12">
      <ul class="nav">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
        <li class="nav-item ml-auto">
          <a class="nav-link btn-outline-info" href="{{ route( $base['base'].'.create' ) }}">Cadastrar</a>
        </li>
      </ul>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <table class="table table-striped">
        <thead>
          <tr>
            <td>id</td>
            <td>Nome</td>
            <td>Telefone</td>
            <td>Logradouro</td>
            <td>Cidade</td>
          </tr>
        </thead>
        <tbody>
            @foreach ( $categories as $cat )
            <tr>
              <td>{{ $cat->id }}</td>
              <td>{{ $cat->user->name }}</td>
              <td>{{ $cat->phone }}</td>
              <td>{{ $cat->address }}</td>
              <td>{{ $cat->city }}</td>
              <td>
                  <a href="{{ route( $base['base'].'.show',['id' => $cat->id ]) }}" class="btn btn-sm btn-success"><i class="fa-eye" aria-hidden="true"></i></a>
                  <a href="{{ route( $base['base'].'.edit',['id' => $cat->id ]) }}" class="btn btn-sm btn-info"><i class="fa-pencil" aria-hidden="true"></i></a>
                  {{ Form::open(array('route' => array($base['base'].'.destroy', $cat->id), 'method' => 'delete', 'style'=> 'display: inline')) }}
                      <button type="submit" class="btn btn-sm btn-danger"><i class="fa-trash-o" aria-hidden="true"></i></button>
                  {{ Form::close() }}
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>

    </div>
  </div>

  {!! $categories->render() !!}

@endsection
