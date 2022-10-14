@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        <br>
        <br>

            <div class="pull-left">
                <h2> Show Unit Kerja</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.indexs') }}"> Back</a>
            </div>
        </div>
    </div>
    
    <form  method="post" action="{{url('unitkerjas/edit/{id}' . $unitkerjas->id)}}">
        @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $unitkerjas->name }}
            </div>
        </div>
                
    </div>
</form>   
@endsection