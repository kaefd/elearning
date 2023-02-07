@extends('elearning.admin.main')

@section('title', 'Details')
@section('contents')
    
    <div class="pt-3">
        <h3>{{ $title }}</h3>
        <hr/>
    </div>
        
    <div class="card p-3 my-5 w-75 mx-auto">
	
		<div class="d-block">
			<a href="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left-long" style="font-size:25px; color:#0dcaf0;"></i></a>
			<a href="{{ route('teacher.edit', $show->id )}}" class="float-end rounded-0 btn btn-outline-info"><i class="fa-solid fa-pen"></i></a>
            <a href="/teacher/{{$show->id}}/profile.php" target="_blank" class="float-end rounded-0 btn btn-outline-info"><i class="fa-solid fa-file-export"></i></a>
		</div>
		
		<div class="mb-4 text-center">
            @if($show->image)
                <img class="w-25 rounded-circle mb-3" src="{{ asset('storage/'. $show->image) }}" alt="picture">
            @else
                <img class="w-25 rounded-circle mb-3" src="{{ asset('img/profile-default.jpg') }}" alt="picture">
            @endif
		  <h4>{{ $show->name }}</h4>
		</div>
		
		<table class="mx-auto table table-hover w-75">
		
			<tr>
				<th>Nama Lengkap</th>
				<td>{{ $show->name }}</td>
			</tr>
			<tr>	
				<th>NIP</th>
				<td>{{ $show->nidn }}</td>
			</tr>	
			<tr>	
				<th>Tempat, Tgl lahir</th>
				<td>{{ $show->birthplace.', '.date('d F Y', strtotime($show->dob)); }}</td>
			</tr>	
			<tr>	
				<th>Jenis kelamin</th>
				<td>{{ $show->gender }}</td>
			</tr>
			<tr>	
				<th>Kelas</th>
				<td>
                @foreach($show->grade as $grade)
                    
                    {{ $grade->grade_name }}
                    
                @endforeach
                </td>
			</tr>
            <tr>	
				<th>Email</th>
				<td>{{ $show->user->email }}</td>
			</tr>
			<tr>	
				<th>Alamat</th>
				<td>{{ $show->alamat }}</td>
			</tr>	
			
		</table>
	
	</div>
@endsection