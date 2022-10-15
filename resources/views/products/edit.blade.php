@extends('dashboard.layouts.main')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <br>
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('products.indexs') }}"> Back</a>
                <h2>Edit Request</h2>
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
  
    <!-- <form action="{{ route('products.update',$products->id) }}" method="POST">
        @csrf
        @method('PUT')
    -->

    <form action="{{ route('products.update',$products->id) }}" method="POST" enctype="multipart/form-data">
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
                                <td><input type="text" name="name" value="{{ $products->name }}" class="form-control" placeholder="Name"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="text" name="bagian" value="{{ $products->bagian }}" class="form-control" placeholder="Bagian"></td>
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
                                <td><select name='unitkerja' class="form-control {{$errors->first('detail') ? "is-invalid" : "" }} ">
                                        <option value="{{ $products->unitkerja  }}">{{ $products->unitkerja  }}</option>
                                        <!-- <option disabled selected>Choose One!</option> -->
                                        @foreach ($unitkerja as $unitkerja)
                                        <option {{ $unitkerja->name == $products->detail ? 'selected' : '' }} value="{{ $unitkerja->name  }}">{{ $unitkerja->name  }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><select name='jabatan' class="form-control {{$errors->first('detail') ? "is-invalid" : "" }} ">
                                        <option value="{{ $products->jabatan  }}">{{ $products->jabatan  }}</option>
                                        <!-- <option disabled selected>Choose One!</option> -->
                                        @foreach ($jabatans as $jabatan)
                                        <option {{ $jabatan->name == $products->detail ? 'selected' : '' }} value="{{ $jabatan->name  }}">{{ $jabatan->name  }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                        <td><input type="text" name="email" value="{{ $products->email }}" class="form-control" placeholder="E-mail"></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" name="permintaan_at" value="{{ $products->permintaan_at->format('d-m-Y') }}" class="form-control" readonly> </td>
                    </tr>
                </table>
            
            <table width="100%">
                <tr>
                    <td><strong>Jenis Request:</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong for="image" class="form-label">File Upload</strong></td>
                    <input type="hidden" name="oldImage" value=" {{ $products->image }}" >
                    <td>
                </tr>
                <tr>
                    <td width="50%">
                        
                        <select name='detail' class="form-control {{$errors->first('detail') ? "is-invalid" : "" }} " id="detail">
                            <option value="{{ $products->detail }}">{{ $products->detail  }}</option>
                            <!-- <option disabled selected>Choose One!</option> -->
                            @foreach ($breaks as $position)
                            <option {{ $position->name == $products->detail ? 'selected' : '' }} value="{{ $position->name  }}">{{ $position->name  }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    <td>
                    <td>
                    <td width="50%">
                        @if ($products->image)
                            <img src="{{ asset('storage/' . $products->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @endif
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" 
                                   onchange="previewImage()"></td>
                            @error('image')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div> 
                            @enderror
                    </td>
                </tr>
            </table>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $products->description }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
   <br>
    </form>
@endsection

<script> 

function previewImage(){
	const image = document.querySelectot('#image');
	const imgPreview = document.querySelector('.img-preview');
	
	imgPreview.style.display = 'block';

	const oFReader = new FileReader();
	oFReader.readAsDataURL(image.files[0]);

	oFReader.onload = function(oFREvent) {
		imgPreview.src = oFREvent.target.result;	
	}

}


</script>