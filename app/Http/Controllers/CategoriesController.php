<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;
use CodeDelivery\Http\Requests\CategoryRequest;
use CodeDelivery\Repositories\CategoryRepository;


class CategoriesController extends Controller
{
    //
    private $repository;

    public function __construct( CategoryRepository $repository )
    {
      $this->repository = $repository;
    }

    public function index ()
    {
      $categories = $this->repository->paginate(5);
      return view('categories.index', compact('categories'));
    }

    public function create ()
    {
      return view( 'categories.create' );
    }

    public function edit( $id )
    {
      $data = $this->repository->find($id);

      return view( 'categories.edit', compact( 'data' ) );
    }

    public function store( CategoryRequest $request )
    {
      $data = $request->all();
      $this->repository->create( $data );
      return redirect()->route('categories.index');
    }

    public function update( CategoryRequest $request, $id )
    {
      $data = $request->all();
      $this->repository->update( $data, $id );

      return redirect()->route('categories.index');
    }

    public function delete( $id )
    {
      $this->repository->delete( $id );

      return redirect()->route('categories.index');
    }
}
