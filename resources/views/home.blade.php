@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @forelse ( $companies as $k=>$v )
            <a href="{{ url('selection') }}/{{$k}}" class="btn btn-lg btn-outline-info">{{$v}}</a>
        @empty
            No Companies Found!
        @endforelse
    </div>
</div>
@endsection
