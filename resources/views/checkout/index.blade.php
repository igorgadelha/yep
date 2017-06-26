@extends('app')

@section('content')
  <h1>{{$base['plural']}}</h1>
  <hr/>
  <div class="row">
    <div class="col-md-12">
      <ul class="nav">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </ul>
    </div>
  </div>
  <br>
  <div class="row">
            @foreach ( $data as $cat )
            <div class=" col-md-4">
                <div class="card mb-3">
                  <div class="card-block">
                    <h4 class="card-title">{{$cat->name}}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">{{$cat->price}}</h6>
                    <p class="card-text">{{$cat->description}}</p>
                    <a href="{{route('cart.add',['id' => $cat->id ])}}" class="card-link">Adicionar ao carrinho</a>
                  </div>
                </div>
            </div>
            @endforeach
  </div>

  {!! $data->render() !!}

@endsection
