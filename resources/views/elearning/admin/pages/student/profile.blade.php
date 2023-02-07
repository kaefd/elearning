<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
    
<body>
    
    <div class="py-3 mb-3 w-75 mx-auto">
        <table class="mx-auto mt-5 table table-bordered w-100">
		
			<tr>
				<th>Nama Lengkap</th>
				<td>{{ $student->name }}</td>
			</tr>
			<tr>	
				<th>NIS</th>
				<td>{{ $student->nis }}</td>
			</tr>	
			<tr>	
				<th>Tempat, Tgl lahir</th>
				<td>{{ $student->birthplace.', '.date('d F Y', strtotime($student->dob)); }}</td>
			</tr>	
			<tr>	
				<th>Jenis kelamin</th>
				<td>{{ $student->gender }}</td>
			</tr>
			<tr>	
				<th>Kelas</th>
				<td>{{ $student->grade->grade_name }}</td>
			</tr>
            <tr>	
				<th>Email</th>
				<td>{{ $student->user->email }}</td>
			</tr>
			<tr>	
				<th>Alamat</th>
				<td>{{ $student->alamat }}</td>
			</tr>	
			
		</table>
    </div>
            <script>
                window.print();
            </script>
</body>
</html>