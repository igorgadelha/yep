<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests\OrderRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;


class OrdersController extends Controller
{

    private $repository;
    private $user;

    private $base = ['singular' => 'pedido', 'plural' => 'pedidos', 'base' => 'orders' ];


    public function __construct( OrderRepository $repository, UserRepository $user )
    {
      $this->repository = $repository;
      $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = $this->repository->paginate(10);
        $base = $this->base;
        $status = [
          0 => [ 'status' => 'aguardando', 'class' => 'default' ],
          1 => [ 'status' => 'saiu para entrega', 'class' => 'warning' ],
          2 => [ 'status' => 'entregue', 'class' => 'success' ],
          3 => [ 'status' => 'cancelado', 'class' => 'danger' ]
        ];

        return view( $this->base['base'].'.index', compact ( 'data','base','status' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $base = $this->base;
      return view( $this->base['base'].'.create', compact('base') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        //
        $data = $request->all();
        // dd($data);
        $this->client->create( $data );

        flash()->overlay( 'Produto Salvo com sucesso', 'Sucesso!' );

        return redirect()->route( $this->base['base'].'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idpluck
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = $this->repository->find($id);

        $status = $this->repository->find($id);
        $deliverymen = $this->user->findWhere([ 'role' => 'deliveryman' ])->pluck( 'name', 'id' );
        $status = [ 0 => 'aguardando', 1 => 'saiu para entrega', 2 => 'entregue', 3 => 'cancelado' ];

        $base = $this->base;
        return view( $this->base['base'].'.edit', compact( 'data', 'base', 'deliverymen', 'status' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = $this->repository->update($request->all(), $id);

      if($data)
      {
        flash('Registro atualizado com sucesso','success');
      } else {
        flash('Não foi possível atualizar o registro','danger');

      }
      return redirect()->route( $this->base['base'].'.index' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

          if($this->repository->delete($id))
          {
            flash('Registro removido com sucesso','success');
          } else {
            flash('Não foi possível remover o registro','danger');

          }
          return redirect()->route( $this->base['base'].'.index' );
    }
}
