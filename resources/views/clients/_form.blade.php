<div class="form-group">
  {!! Form::label('name','Nome:', ['class' => 'control-label']) !!}
  {!! Form::text('user[name]',null, [ 'class' => 'form-control' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('email','Email:', ['class' => 'control-label']) !!}
  {!! Form::email('user[email]',null, [ 'class' => 'form-control' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('Phone','Telefone:', ['class' => 'control-label']) !!}
  {!! Form::text('phone',null, [ 'class' => 'form-control' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('Address','Endereço:', ['class' => 'control-label']) !!}
  {!! Form::textarea('address',null, [ 'class' => 'form-control' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('city','Cidade:', ['class' => 'control-label']) !!}
  {!! Form::text('city',null, [ 'class' => 'form-control' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('State','Estado:', ['class' => 'control-label']) !!}
  {!! Form::text('state',null, [ 'class' => 'form-control' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('Zipcode','CEP:', ['class' => 'control-label']) !!}
  {!! Form::text('zipcode',null, [ 'class' => 'form-control' ]) !!}
</div>
