@extends('app')
@section('content')
<div class="row">
  <div class="col">
    <table class="table stable striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach(Cart::content() as $row) :?>
                <tr>
                    <td>
                        <p><strong><?php echo $row->name; ?></strong></p>
                        <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                    </td>
                    <td><input type="number" value="<?php echo $row->qty; ?>"  id="qty-{{$row->rowId}}"></td>
                    <td>$<?php echo $row->price; ?></td>
                    <td>$<?php echo $row->total; ?></td>
                    <td>
                      {{ Form::open(array('route' => array('cart.update', $row->rowId), 'method' => 'put', 'style'=> 'display: inline')) }}
                          <input type="hidden" name="qty" id="qty-{{$row->rowId}}-2">
                          <button type="submit" class="btn  btn-warning" onclick="$('#qty-{{$row->rowId}}-2').val( $('#qty-{{$row->rowId}}').val() )">Atualizar</button>
                      {{ Form::close() }}
                      {{ Form::open(array('route' => array('cart.destroy', $row->rowId), 'method' => 'delete', 'style'=> 'display: inline')) }}
                          <button type="submit" class="btn  btn-danger">Remover</button>
                      {{ Form::close() }}
                    </td>
                </tr>

            <?php endforeach;?>

        </tbody>

        <tfoot>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Subtotal</td>
                <td><?php echo Cart::subtotal(); ?></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Tax</td>
                <td><?php echo Cart::tax(); ?></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Total</td>
                <td><?php echo Cart::total(); ?></td>
            </tr>
        </tfoot>
    </table>
  </div>
</div>
<div class="row">
    <div class="mx-auto">
        <a href="{{route('cart.shipping')}}" class="btn btn-outline-info">Entrega</a>
    </div>
</div>
@endsection
