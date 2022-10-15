@extends('dashboard.layouts.main')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <br>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('layanans.indexs') }}"> Back</a>
            <h2>Add Keberatan Informasi Publik</h2>
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
   
<form action="{{ route('layanans.store') }}" method="POST">
    @csrf
    <input type="hidden" name="id_layanan" class="form-control" value="Keberatan Informasi Publik">
    <div class="row">
        <div class="box">
            <div class="box-header with-border">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td><strong>Name:</strong></td>
                            <td></td>
                            <td></td>
                            <td><td><strong>Email:</strong></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="name" class="form-control" placeholder="Name"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="text" name="email" class="form-control" placeholder="E-mail"></td>
                        </tr>
                    </tbody>
                </table>

                <table width="100%">
                    <tbody>
                        <tr>
                            <td><strong>Pekerjaan:</strong></td>
                            <td></td>
                            <td></td>
                            <td><td><strong>Alamat Kantor:</strong></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="job" class="form-control" placeholder="Pekerjaan"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="text" name="alamat" class="form-control" placeholder="Alamat Kantor"></td>
                        </tr>
                    </tbody>
                </table>

                <table width="100%">
                    <tbody>
                        <tr>
                            <td><strong>Telephone:</strong></td>
                            <td></td>
                            <td><td><strong>Alasan Keberatan:</strong></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="telephone" class="form-control" placeholder="telephone"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><textarea type="text" name="alasan" class="form-control" placeholder="Alasan Keberatan"></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
                <br>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure for the information?')">Submit</button>
            </div>
        </div>
    </div>
   
</form>
@endsection