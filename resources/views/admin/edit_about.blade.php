@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit About</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->

                <form action="/about/update" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input class="form-control" type="hidden" name="id" id="id" value="{{ $about->id }}">
                    <img class="img-fluid mb-3" src="{{ asset('/foto_about/' . $about->image) }}" width="500">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Ganti Foto</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                        <textarea class="form-control" rows="3" name="deskripsi">{{ $about->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Client</label>
                        <input type="number" class="form-control" name="client" value="{{ $about->client }}">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </form>


            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
