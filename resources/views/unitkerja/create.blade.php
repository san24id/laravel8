@extends('dashboard.layouts.main')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <br>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('unitkerjas.indexs') }}"> Back</a>
            <h2>Add New Unit Kerja</h2>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('unitkerjas.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Unit Kerja:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
   
</form>
@endsection