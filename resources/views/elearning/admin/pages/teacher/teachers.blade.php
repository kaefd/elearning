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
    <div class="container card pt-2 mt-3">
    <div class="pt-3">
        <h3>{{ $title }}</h3>
        <hr/>
    </div>
        <table class="table table-bordered" id="stdTable">
            <thead class="text-center">
              <tr class="header">
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NIP</th>
              </tr>
            </thead>
            <tbody class="table-group-divider" >
            
            @php
                $i = 1;
            @endphp
            @foreach($teacher as $key => $t )
              <tr class="text-center">
                <th scope="row">{{ $i++ }}</th>
                <td class="text-start">{{ $t->name }}</td>
                <td>{{ $t->nidn }}</td>
              </tr> 
            @endforeach
                    
            </tbody>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>