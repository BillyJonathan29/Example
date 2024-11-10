@if (Auth()->user()->Admin())
    @include('layouts.sidebar.admin')
@elseif(Auth()->user()->User())
    @include('layouts.sidebar.user')
@endif