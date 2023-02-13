@extends('elearning.admin.main')

@section('title', 'Siswa')
@section('contents')
    
    <div class="pt-3">
        <h3>{{ $title }}</h3>
        <hr/>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

                                
    <div class="d-flex my-3 w-50">
        <input type="text" class="form-control col" id="stdSearch" onkeyup="filterTableFunc()" placeholder="Search..">
        <a href="{{  route('grade.create') }}" class="btn btn-dark col-3 ms-2">Buat Baru</a>
    </div>
        
        @foreach($grade as $key => $g )
        <div class="card p-2 mb-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" id="card">
            <div class="card-body d-flex justify-content-between">
                <div class="card-text">
                    <h5>{{ $g->grade_name }}</h5>
                    <i class="fa-solid fa-user-group"></i> 4444 students |
                    <i class="fa-solid fa-user-tie"></i> 4444 teachers
                </div>
                <div class="align-self-center ms-auto"><a href="{{ route('grade.edit', $g->id )}}"><i class="fa-solid fa-gear" style="font-size:20pt"></i></a></div>
            </div> 
        </div>
    
        @endforeach
        

@endsection