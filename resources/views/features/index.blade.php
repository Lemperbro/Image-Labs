@extends('layouts.main')

@section('container')
    <div class="pt-32">
        <h1 class="font-semibold text-xl lg:text-2xl">Semua Feature</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mt-5">
            @include('features._features')

            
        </div>
        {{-- <div class="mt-8 justify-center flex">
            @include('features._paginate')
        </div> --}}
    </div>
@endsection
