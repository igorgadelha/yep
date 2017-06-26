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
            <td>Pedido</td>
            <td>Cliente</td>
            <td>Itens</td>
            <td>Entregador</td>
            <td>Total</td>
            <td>Status</td>
          </tr>
        </thead>
        <tbody>
            @foreach ( $data as $cat )
            <tr>
              <td>#{{ $cat->id }}</td>
              <td>{{ $cat->client->name }}</td>
              <td>
                @foreach ( $cat->items as $c )
                    <span class="badge badge-pill badge-default">{{ $c->qtd }} {{ $c->product->name }} - R$: {{ $c->price }}</span>
                @endforeach
              </td>
              <td>
                @if( $cat->deliveryman )
                  {{ $cat->deliveryman->name }}
                @else
                ---
                @endif
              </td>
              <td>{{ $cat->total }}</td>
              <td>
                  <span class="badge badge-{{ $status[$cat->status]['class'] }}">{{ $status[$cat->status]['status'] }}</span>
              </td>
              <td>
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

  {!! $data->render() !!}

@endsection
