@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard Adi Karya</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard Adi Karya</li>
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
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-eye"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Penggunjung</span>
                                <span class="info-box-number">
                                    {{ $visitor->count() }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Likes</span>
                                <span class="info-box-number">41,410</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Sales</span>
                                <span class="info-box-number">760</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">New Members</span>
                                <span class="info-box-number">2,000</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>

                @include('admin.partials.carousel')

                @include('admin.partials.about')

                @include('admin.partials.pemilik')

                @include('admin.partials.testimoni')

                <div class="modal fade" id="modalcarousel" tabindex="-1" aria-labelledby="modalcarouselLabel"
                    aria-hidden="true">
                    <form action="/carousel/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalcarouselLabel">Input Carousel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Pilih Foto</label>
                                        <input class="form-control" type="file" name="foto" id="formFile">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Upload" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="modal fade" id="modalabout" tabindex="-1" aria-labelledby="modalaboutLabel"
                    aria-hidden="true">
                    <form action="/about/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalaboutLabel">Konten About</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Pilih Foto</label>
                                        <input class="form-control" type="file" name="image" id="formFile">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi"
                                            rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Client</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="client" placeholder="1234">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Upload" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal fade" id="modalpemilik" tabindex="-1" aria-labelledby="modalaboutLabel"
                    aria-hidden="true">
                    <form action="/pemilik/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalaboutLabel">Konten Pemilik</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Pilih Foto</label>
                                        <input class="form-control" type="file" name="image" id="formFile">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama"
                                            placeholder="Joni">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Posisi</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="posisi" placeholder="pegawai">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Upload" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
