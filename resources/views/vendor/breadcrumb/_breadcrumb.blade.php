<nav class="breadcrumb">
  <a class="breadcrumb-item" href="/">Home</a>
  @for($i = 0; $i <= count(Request::segments()); $i++)
    <a class="breadcrumb-item" href="{{Request::url($i)}}">{{Request::segment($i)}}</a>
  @endfor
</nav>
