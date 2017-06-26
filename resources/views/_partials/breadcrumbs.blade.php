
@if ($breadcrumbs)
<nav class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
            <a class="breadcrumb-item" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
            @else
              <span class="breadcrumb-item active">{{ $breadcrumb->title }}</span>
            @endif
        @endforeach
  </nav>
@endif
