<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests\RestaurantsRequest;
use CodeDelivery\Repositories\RestaurantRepository;
use CodeDelivery\Repositories\ProductRepository;

use Yajra\Datatables\Facades\Datatables;

class RestaurantsController extends Controller
{

    private $repository;
    private $products;

    private $base = ['singular' => 'restaurante', 'plural' => 'restaurantes', 'base' => 'restaurants' ];


    public function __construct( RestaurantRepository $repository, ProductRepository $products )
    {
      $this->repository = $repository;
      $this->products = $products;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index ( )
    {
        $base = $this->base;
        $categories = $this->repository->paginate(15);

        return view( $this->base['base'].'.index', compact('base','categories') );
    }
    public function produtos ( $id )
    {
      $products = $this->products->findWhere( ['restaurant_id' => $id ]);
      $base = $this->base;
      return view( $this->base['base'].'.products', compact('base','products') );

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
        $base = $this->base;
        return view( $this->base['base'].'.edit', compact( 'data', 'base' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
      $data = $this->client->update($request->all(), $id);

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
