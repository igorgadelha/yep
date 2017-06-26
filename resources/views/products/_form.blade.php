<div class="form-group">
  {!! Form::label('name','Nome:', ['class' => 'control-label']) !!}
  {!! Form::text('name',null, [ 'class' => 'form-control' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('Price','Preço:', ['class' => 'control-label']) !!}
  {!! Form::text('price',null, [ 'class' => 'form-control' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('Category','Categoria:', ['class' => 'control-label']) !!}
  {!! Form::select('category_id', $categories, null, [ 'class' => 'form-control' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('Description','Descrição:', ['class' => 'control-label']) !!}
  {!! Form::textarea('description',null, [ 'class' => 'form-control' ]) !!}
</div>
