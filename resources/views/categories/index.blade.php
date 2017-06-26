@extends('app')

@section('content')
  <h1>Categorias</h1>

  <hr/>
  {!! Breadcrumbs::render('categories') !!}
  <div class="row">
    <div class="col-md-12">
      <ul class="nav">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
        <li class="nav-item ml-auto">
          <a class="nav-link btn-outline-info" href="{{ route( 'categories.create' ) }}">Cadastrar</a>
        </li>
      </ul>
    </div>
  </div>
  <br>

    <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead  class="thead-inverse">
          <tr>
            <td>id</td>
            <td>Nome</td>
            <td>Ações</td>
          </tr>
        </thead>
        <tbody>
            @foreach ( $categories as $cat )
            <tr>
              <td>{{ $cat->id }}</td>
              <td>{{ $cat->name }}</td>
              <td>
                  <a href="{{ route( 'categories.edit',['id'=> $cat->id ]) }}" class="btn btn-sm btn-success"><i class="fa-eye" aria-hidden="true"></i></a>
                  <a href="{{ route( 'categories.edit',['id'=> $cat->id ]) }}" class="btn btn-sm btn-info"><i class="fa-pencil" aria-hidden="true"></i></a>
                  <a href="{{ route( 'categories.delete',['id'=> $cat->id ]) }}" class="btn btn-sm btn-danger"><i class="fa-trash-o" aria-hidden="true"></i></a>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>

    </div>
  </div>
  <div class="mr-auto">
    {!! $categories->render() !!}
  </div>
@endsection
