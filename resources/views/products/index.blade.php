@extends('dashboard.layouts.main')
 
@section('content')
    <div class="row">
        <div class="col-md-6 margin-tb">
        <br>
            <div class="pull-left">
                <h2>Ticketing Request</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Request</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success col-md-6">
            <p>{{ $message }}</p>
        </div>
    @endif

    <br>
    <!-- <div class="row justify-content-center"> -->
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
              <th scope="col">No. </th>
              <th scope="col">Name</th>
              <th scope="col">Kategori</th>
              <th scope="col">Unit Kerja</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          @foreach ($products as $product)
          <tbody>
            <tr>
                <td>{{ $loop->iteration }}</td>  
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>{{ $product->unitkerja }}</td>
                <td>
                    <!-- <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Detail</a> -->
                    <a href="{{ route('products.edit',$product->id) }}" class="badge bg-primary" ><span data-feather="edit"></span></a>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></button>
                    </form>
                </td>
            </tr>
            
          </tbody>
          @endforeach
        </table>
      </div>

      {{ $products->links() }}
    

        <!-- <div class="pull-right">
            <a class="btn btn-success" href="{{ route('unitkerjas.indexs') }}"> Unit Kerja</a>
            <a class="btn btn-success" href="{{ route('jabatans.indexs') }}"> Jabatan</a>
        </div> -->
  

<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>    
      
@endsection