<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

use CodeDelivery\Http\Requests\ProductRequest;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\CategoryRepository;


class ProductsController extends Controller
{

    private $repository;
    private $category;
    private $base = ['singular' => 'produto', 'plural' => 'produtos', 'base' => 'products' ];


    public function __construct( ProductRepository $repository, CategoryRepository $category )
    {
      $this->repository = $repository;
      $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = $this->repository->paginate(15);
        $base = $this->base;
        return view( $this->base['base'].'.index', compact('categories','base'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $categories = $this->category->pluck( 'name','id' );
      $base = $this->base;
      return view( 'products.create', compact('categories','base') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $data = $request->all();
        $this->repository->create( $data );

        flash()->overlay( 'Produto Salvo com sucesso', 'Sucesso!' );

        return redirect()->route('products.index');
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
        $categories = $this->category->pluck( 'name','id' );
        $base = $this->base;
        return view( $this->base['base'].'.edit', compact( 'data', 'categories', 'base' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
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
