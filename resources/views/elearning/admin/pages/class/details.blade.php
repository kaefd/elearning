@extends('elearning.admin.main')

@section('title', 'Details')
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

            <div class="border-bottom d-flex justify-content-between w-25 mb-3">
                <h4>{{$edit->grade_name}}</h4>
                <a class="align-self-end" data-bs-toggle="modal" data-bs-target="#cardModal"><i class="fa-solid fa-pen"></i></a>
            </div>
            
            <div class="row">
                <div class="col card p-3 shadow vh-table table-responsive me-3">
                    <div class="d-flex align-items-center">
                        <h5 class="bg-primary-subtle py-2 px-3 m-3 rounded-pill text-center text-primary">Daftar Siswa</h5>
                        <a href="" class="btn btn-info my-auto rounded-circle text-decoration-none shadow"><i class="fa-solid fa-plus text-light"></i></a>
                        <div class="badge text-bg-primary ms-auto"><i class="fa-solid fa-user-group"></i> {{ count($student) }} siswa</div>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th class="w-25">No</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($student as $key => $s)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="d-flex justify-content-between">
                                {{ $s->name }}
                                <form action="/admin/student/up/{{$s->id}}" method="post" class="d-inline">
                                    @method('PUT')
                                    @csrf
                                    <button class="btn btn-sm" onclick="return confirm('apakah anda yakin?')"><i class="fa-solid fa-trash text-danger"></i></button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>                
                </div>
                    
                <div class="col card p-3 shadow vh-table table-responsive">
                    <div class="d-flex align-items-center">
                        <h5 class="bg-primary-subtle py-2 px-3 m-3 rounded-pill text-center text-primary">Daftar Tentor</h5>
                        <a href="" class="btn btn-info my-auto rounded-circle text-decoration-none me-3 shadow"><i class="fa-solid fa-plus text-light"></i></a>
                        <div class="badge text-bg-primary ms-auto"><i class="fa-solid fa-user-group"></i> {{ count($teacher) }} tentor</div>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th class="w-25">No</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($teacher as $key => $t)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="d-flex justify-content-between">
                                {{ $t->name }}
                                <form action="/admin/teacher/up/{{$t->id}}" method="post" class="d-inline">
                                    @method('PUT')
                                    @csrf
                                    <button class="btn btn-sm" onclick="return confirm('apakah anda yakin?')"><i class="fa-solid fa-trash text-danger"></i></button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>                
                </div>
            </div>
		
        
        <!-- Modal -->
        <div class="modal fade" id="cardModal" tabindex="-1" aria-labelledby="cardModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="cardModalLabel">Edit Kelas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('grade.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="grade_name" name="grade_name" value="{{ old('grade_name', $edit->grade_name) }}">
                                <label for="grade_name">Kelas</label>
                            </div>
                                @error('grade_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                
                
                </div>
            </div>
        </div>
@endsection