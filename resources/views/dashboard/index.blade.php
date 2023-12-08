@extends('layouts.main')

@section('container')
    <div>
        <div class="min-h-screen">
            @include('dashboard._hero')
            @include('dashboard._bannerCarousel')
            @include('dashboard._grid')
        </div>
        

    </div>
@endsection
