@extends('dashboard.layouts.main')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        <br>
            <div class="pull-left">
                <h2>Jabatan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('jabatans.create') }}"> Create New Unit Kerja</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <br>
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
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        @foreach ($jabatans as $jabatan)
        <tbody>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jabatan->name }}</td>
                <td>
                    <a href="{{ route('jabatans.edit',$jabatan->id) }}" class="badge bg-primary" ><span data-feather="edit"></span></a>
                    <form action="{{ route('jabatans.destroy',$jabatan->id) }}" method="POST" class="d-inline">
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

    {{ $jabatans->links() }}
        <!-- <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.indexs') }}"> Request</a>
            <a class="btn btn-success" href="{{ route('unitkerjas.indexs') }}"> Unit Kerja</a>
        </div> -->
  
      
@endsection