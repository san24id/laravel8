@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        <br>
        <br>

            <div class="pull-left">
                <h2> Show Request</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.indexs') }}"> Back</a>
            </div>
        </div>
    </div>
    
    <form  method="post" action="{{url('products/edit/{id}' . $products->id)}}">
        @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $products->name }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Unit Kerja:</strong>
                {{ $products->unitkerja }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bagian:</strong>
                {{ $products->bagian }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jabatan:</strong>
                {{ $products->jabatan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-mail:</strong>
                {{ $products->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Request Date:</strong>
                {{ $products->permintaan_at->format('d-M-Y') }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $products->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $products->description }}
            </div>
        </div>
    </div>
</form>   
@endsection