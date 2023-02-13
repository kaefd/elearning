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
        <a href="{{  route('student.create') }}" class="btn btn-dark col-3 ms-2">Buat Baru</a>
    </div>
        
    <div class="container card pt-2 mt-3 table-responsive vh-table">
        <table class="table table-hover" id="stdTable">
            <thead class="text-center">
              <tr class="header nav-light">
                <th scope="col">#</th>
                <th scope="col">@sortablelink('name', 'Name')</th>
                <th scope="col">@sortablelink('nis', 'NIS')</th>
                <th scope="col">@sortablelink('grade_id', 'Kelas')</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody class="table-group-divider" >
                
                @php
                    $i = 1;
                @endphp
                @foreach($student as $key => $s )
              <tr class="text-center">
                <th scope="row">{{ $i++ }}</th>
                <td class="text-start">{{ $s->name }}</td>
                <td>{{ $s->nis }}</td>
                <td>{{$s->grade->grade_name}}</td>
                <td>
                    <a class="btn btn-sm btn-info text-light text-decoration-none border-0" href="{{ route('student.show', $s->id) }}"><i class="fa-solid fa-eye"></i></a>
                    
                    <form action="/admin/student/{{ $s->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-sm btn-danger border-0" onclick="return confirm('apakah anda yakin?')"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
              </tr>
                
                @endforeach
                    
            </tbody>
        </table>
    </div>
<script>
    const filterTableFunc = () => {
    const trs = document.querySelectorAll('#stdTable tr:not(.header)')
    const filter = document.querySelector('#stdSearch').value
    const regex = new RegExp(filter, 'i')
    const isFoundInTds = td => regex.test(td.innerHTML)
    const isFound = childrenArr => childrenArr.some(isFoundInTds)
    const setTrStyleDisplay = ({ style, children }) => {
        style.display = isFound([
          ...children // <-- All columns
        ]) ? '' : 'none' 
      }
      
      trs.forEach(setTrStyleDisplay)
    }

	
</script>
    
@endsection
