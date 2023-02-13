@extends('elearning.admin.main')

@section('title', 'Tambah Data Baru')
@section('contents')
    
    <div class="pt-3">
        <h3>{{ $title }}</h3>
        <hr/>
    </div>
        <form action="/admin/teacher" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                </div>
            </div>
              <div class="row">
                <div class="col">
                    <label for="nidn" class="form-label mt-4">NIP</label>
                    <input type="number" class="form-control @error('nidn') is-invalid @enderror" id="nidn" name="nidn" value="{{ old('nidn') }}">
                    @error('nidn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="grade_id" class="form-label mt-4">Kelas</label>
                    <select class="form-select @error('grade_id') is-invalid @enderror" aria-label="grade_id" name="grade_id" value="{{ old('grade_id') }}">
                        <option></option>
                        @foreach($grade as $g)
                        <option value="{{ $g->id }}">{{ $g->grade_name }}</option>
                        @endforeach
                    </select>
                    @error('grade_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="row">
                <div class="col">
                    <label for="gender" class="form-label mt-4">Jenis Kelamin</label>
                    <select class="form-select @error('gender') is-invalid @enderror" aria-label="gender" name="gender" value="{{ old('gender') }}">
                        <option selected></option>
                        <option value="female">Perempuan</option>
                        <option value="male">Laki-laki</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="dob" class="form-label mt-4">Tanggal lahir</label>
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}">
                    @error('dob')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
            <div class="row mb-4">
                <div class="col">
                    <label for="birthplace" class="form-label mt-4">Tempat lahir</label>
                    <textarea class="form-control @error('birthplace') is-invalid @enderror" id="birthplace" name="birthplace" value="{{ old('birthplace') }}"></textarea>
                    @error('birthplace')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="alamat" class="form-label mt-4">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}"></textarea>
                          @error('alamat')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror                    
                </div>
            </div>
            
                    
              <div class="d-flex flex-column my-4">
                <label for="image" class="form-label">Profile Image</label>
                <img class="img-preview img-thumbnail img-fluid rounded mb-1" src="{{ asset('img/profile-default.jpg') }}" style="width:100px" />
                <input class="form-control w-50 @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
              </div>
		
		
            <button class="btn btn-info" type="submit">Simpan perubahan</button>
            <a href="/admin/teacher" class="btn btn-secondary">Batal</a>
        </div>
    </form>
        
        <script>
            
            function previewImage()
            {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');
                
                imgPreview.style.display = 'block';
                
                const blob = URL.createObjectURL(image.files[0]);
                imgPreview.src = blob;
            }
            
        </script>
@endsection