@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @foreach($contents as $index => $section)
                
                @include($section['section']->template)

                <hr />
            @endforeach
        </div>
    </div>
</div>

@endsection
