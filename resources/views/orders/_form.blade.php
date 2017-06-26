<div class="form-group">
  {!! Form::label('status','Status:', ['class' => 'control-label']) !!}
  {!! Form::select('status', $status, null, [ 'class' => 'form-control' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('deliveryman','Entregador:', ['class' => 'control-label']) !!}
  {!! Form::select('user_deliveryman_id', $deliverymen, null, [ 'class' => 'form-control' ]) !!}
</div>
