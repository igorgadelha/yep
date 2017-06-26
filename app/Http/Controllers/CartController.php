<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;
use CodeDelivery\Repositories\ProductRepository;
use Cart;
use CodeDelivery\Models\User;

use CodeDelivery\Repositories\AddressesRepository as AddressRepository;

class CartController extends Controller
{
    //

    private $productRepository;
    private $addresses;

    private $base = ['singular' => 'checkout', 'plural' => 'chekout', 'base' => 'checkout' ];


    public function __construct( ProductRepository $productRepository, AddressRepository $addresses )
    {
      $this->productRepository = $productRepository;
      $this->addresses = $addresses;
    }

    public function add ( $id )
    {
      $product = $this->productRepository->find( $id );

      Cart::add( ['id' => $product->id , 'name' => $product->name, 'qty' => 1, 'price' => $product->price ] );

      return redirect('/checkout');

    }

    public function update ( $id, Request $request )
    {

      Cart::update( $id, $request->qty );

      return redirect('/cart/checkout');

    }

    public function destroy ( $id )
    {

      Cart::remove( $id  );

      return redirect('/cart/checkout');

    }

    public function itens (  )
    {
        return view( $this->base['base'].'.cart_items', compact ( 'base' ) );
    }

    public function shipping (  )
    {
      
    }
}
