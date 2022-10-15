@extends('dashboard.layouts.main')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        <br>
            <div class="pull-left">
                <h2>Layanan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('layanans.create') }}"> Keberatan Informasi Publik</a>
                <a class="btn btn-success" href="{{ route('layanans.createPIP') }}"> Permohonan Informasi Publik</a>
            </div>
        </div>
    </div>
    <br>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success col-md-6">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <form action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}"></input>
                    <button class="btn btn-success" type="submit">Search</button>
                </div>            
            </form>
        </div>
    </div>
   
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori Layanan</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            @foreach ($layanans as $layanan)
            <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $layanan->id_layanan }}</td>
                    <td>{{ $layanan->name }}</td>
                    <td>{{ $layanan->email }}</td>
                    <td>
                        <a href="{{ route('layanans.edit',$layanan->id) }}" class="badge bg-primary" ><span data-feather="edit"></span></a>
                        <form action="{{ route('layanans.destroy',$layanan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
        </table>
    </div>
    
    {{ $layanans->links() }}
        <!-- <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.indexs') }}"> Request</a>
            <a class="btn btn-success" href="{{ route('jabatans.indexs') }}"> Jabatan</a>
        </div> -->
      
@endsection