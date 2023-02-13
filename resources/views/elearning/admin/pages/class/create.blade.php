@extends('elearning.admin.main')

@section('title', 'Tambah Kelas')
@section('contents')
    
    <div class="pt-3">
        <h3>{{ $title }}</h3>
        <hr/>
    </div>
        <form action="/admin/class" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
            <div class="row mb-3">
                <div class="col">
                    <label for="grade_name" class="form-label">Kelas</label>
                    <input type="text" class="form-control @error('grade_name') is-invalid @enderror" id="grade_name" name="grade_name" value="{{ old('grade_name') }}">
                    @error('grade_name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                </div>
            </div>
            <button class="btn btn-info" type="submit">Simpan perubahan</button>
            <a href="/admin/class" class="btn btn-secondary">Batal</a>
        </div>
    </form>
        
@endsection