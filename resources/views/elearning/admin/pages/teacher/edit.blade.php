@extends('elearning.admin.main')

@section('title', 'Edit Data')
@section('contents')
    
    <div class="pt-3">
        <h3>{{ $title }}</h3>
        <hr/>
    </div>
    <form action="{{ route('teacher.update', $edit->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $edit->name) }}">
                    @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="nidn" class="form-label">NIS</label>
                    <input type="number" class="form-control @error('nidn') is-invalid @enderror" id="nidn" name="nidn" value="{{ old('nidn', $edit->nidn) }}">
                    @error('nidn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
              <div class="row">
                <div class="col">
                    <label for="gender" class="form-label mt-4">Jenis Kelamin</label>
                    <select class="form-select @error('gender') is-invalid @enderror" aria-label="gender" name="gender" value="{{ old('gender', $edit->gender) }}">
                        <option selected></option>
                        <option value="perempuan" @if ($edit->gender == "perempuan") {{ 'selected' }} @endif>Perempuan</option>
                        <option value="laki-laki" @if ($edit->gender == "laki-laki") {{ 'selected' }} @endif>Laki-laki</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="dob" class="form-label mt-4">Tanggal lahir</label>
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob', $edit->dob) }}">
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
                    <textarea class="form-control @error('birthplace') is-invalid @enderror" id="birthplace" name="birthplace">{{ old('birthplace', $edit->birthplace) }}</textarea>
                    @error('birthplace')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="alamat" class="form-label mt-4">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat', $edit->alamat) }}</textarea>
                          @error('alamat')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror                    
                </div>
            </div>
              <div class="d-flex flex-column my-4">
                <label for="image" class="form-label">Profile Image</label>
                    <input type="hidden" name="oldImage" value="{{ $edit->image }}">
                @if($edit->image)
                    <img class="img-preview mb-3" src="{{ asset('storage/'. $edit->image) }}" alt="picture" style="width:100px" >
                @else
                    <img class="img-preview img-thumbnail img-fluid rounded mb-1" src="{{ asset('img/profile-default.jpg') }}" style="width:100px" />
                @endif
                <input class="form-control w-50 @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
              </div>
		
            <button class="btn btn-info" type="submit">Simpan perubahan</button>
            <a href="{{ route('student.show', $edit->id) }}" class="btn btn-secondary">Batal</a>
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