<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests\ClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;
use CodeDelivery\DataTables\ClientServiceDataTable as ClientsDataTable;
use CodeDelivery\Models\Client;

use Yajra\Datatables\Facades\Datatables;

class ClientsController extends Controller
{

    private $repository;
    private $client;

    private $base = ['singular' => 'cliente', 'plural' => 'clientes', 'base' => 'clients' ];


    public function __construct( ClientRepository $repository, ClientService $client )
    {
      $this->repository = $repository;
      $this->client = $client;
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

    public function data()
    {
        return Datatables::of($this->repository->all())->make(true);
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
