@extends('dashboard.layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
    <br>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('products.indexs') }}"> Back</a>
            <h2>Add New Request</h2>
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
   
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
  
     <div class="row">
        <div class="box">
            <div class="box-header with-border">

                <table width="100%">
                    <tbody>
                        <tr>
                            <td><strong>Name:</strong></td>
                            <td></td>
                            <td></td>
                            <td><td><strong>Bagian:</strong></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="name" class="form-control" placeholder="Name"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="text" name="bagian" class="form-control" placeholder="Bagian"></td>
                        </tr>
                    </tbody>
                </table>                         
                
                <table width="100%">
                    <tbody>
                        <tr>
                            <td><strong>Unit Kerja:</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Jabatan:</strong></td>
                        </tr>
                        <tr>
                            <td><select class="form-control" name="unitkerja">
                                    <option disabled selected>Choose One!</option>
                                    @foreach ($unitkerjas as $unitkerja)
                                    <option value="{{ $unitkerja->name }}">{{ $unitkerja->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><select class="form-control" name="jabatan">
                                    <option disabled selected>Choose One!</option>
                                    @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->name }}">{{ $jabatan->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table width="100%">
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td></td>
                        <td></td>
                        <td><strong>Request Date</strong></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="email" class="form-control" placeholder="E-mail"></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" name="permintaan_at" class="form-control" value="{{ \Carbon\Carbon::today()->format('d-m-Y') }}" readonly> </td>
                    </tr>
                </table>
                    
                <table width="100%">
                    <tr>
                        <td><strong>Jenis Request:</strong></td>
                        <td>
                        <td>
                        <td>
                        <td><strong for="image" class="form-label">File Upload</strong></td>                        
                    </tr>
                    <tr><td width="50%"><select class="form-control" id="product" name="detail">
                                <option disabled selected>Choose One!</option>
                                @foreach ($breaks as $kategori)
                                <option value="{{ $kategori->name }}">{{ $kategori->name }}</option>
                                @endforeach
                            </select></td>
                        <td>
                        <td>
                        <td>
                        <td width="50%"><input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"></td>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                <div> 
                            @enderror
                    </tr>
                </table>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
                    </div>
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
            <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <br>
        </div>
    </div>
   
</form>
@endsection