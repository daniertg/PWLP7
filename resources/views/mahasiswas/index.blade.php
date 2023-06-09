@extends('mahasiswas.layout')
@section('content')
 <div class="row">
 <div class="col-lg-12 margin-tb">
 <div class="pull-left mt-2">
 <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
 </div>
 <div class="float-left my-2">
    <form action="{{ route('mahasiswa.index') }}" method="GET" class="d-flex">
        <input type="text" class="form-control" name="Nama" placeholder="Nama Mahasiswa" value="{{request('Nama')}}" required>
        <button type="submit" class="btn btn-dark">Search</button>
    </form>
</div>
 <div class="float-right my-2">
 <a class="btn btnsuccess" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
 </div>
 </div>
 </div>

 @if ($message = Session::get('success'))
 <div class="alert alert-success">
 <p>{{ $message }}</p>
 </div>
 @endif

 <table class="table table-bordered">
 <tr>
 <th>Nim</th>
 <th>Nama</th>
 <th>Kelas</th>
 <th>Jurusan</th>
 <th>No_Handphone</th>
 <th>Email</th>
 <th>Tanggal Lahir</th>
 <th width="280px">Action</th>
 </tr>
 @foreach ($mahasiswas as $Mahasiswa)
 <tr>

 <td>{{ $Mahasiswa->Nim }}</td>
 <td>{{ $Mahasiswa->Nama }}</td>
 <td>{{ $Mahasiswa->Kelas }}</td>
 <td>{{ $Mahasiswa->Jurusan }}</td>
 <td>{{ $Mahasiswa->No_Handphone }}</td>
 <td>{{ $Mahasiswa->email }}</td>
 <td>{{ $Mahasiswa->tanggal_lahir }}</td>
 <td>
 <form action="{{ route('mahasiswa.destroy',$Mahasiswa->Nim) }}" method="POST">

 <a class="btn btninfo" href="{{ route('mahasiswa.show',$Mahasiswa->Nim) }}">Show</a>
 <a class="btn btnprimary" href="{{ route('mahasiswa.edit',$Mahasiswa->Nim) }}">Edit</a>
 @csrf
 @method('DELETE')
 <button type="submit" class="btn btn-danger">Delete</button>
 </form>
 </td>
 </tr>
 @endforeach
 </table>
 {{ $mahasiswas->links('pagination::simple-bootstrap-4') }}
@endsection