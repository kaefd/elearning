@extends('layouts.main')

@section('title', 'Home')
@section('contents')
	
	
    <div class="container py-3">
        <div class="my-5">
            <img class="rounded-circle w-25 d-block mx-auto mb-3" src="{{ asset('img/ika.jpg') }}"/>
            <h1 class="text-center font-bold">IKA FADILA</h1>
        </div>
        <div id="portfolio" class="mt-5 mb-3 py-5 row">
            <div class="col">
                <img class="rounded h-50 d-block mx-auto mb-3" src="{{ asset('img/ika.jpg') }}"/>
            </div>
            <div class="col float-end">
                <h3>RRRRR APP</h3>
                <p>ini adalah contoh saja</p>
                <a href="/learn">see more...</a>
            </div>
        </div>
        <div class="my-3 row">
            <div class="col">
                <img class="rounded h-50 d-block mx-auto mb-3" src="{{ asset('img/ika.jpg') }}"/>
            </div>
            <div class="col float-end">
                <h3>RRRRR APP</h3>
                <p>ini adalah contoh saja</p>
                <a href="/">see more...</a>
            </div>
        </div>
    </div>
	
@endsection
	
	
	
	