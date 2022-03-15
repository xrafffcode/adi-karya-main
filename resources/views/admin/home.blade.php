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
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-comment"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pesan</span>
                                <span class="info-box-number">{{ $contact->count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>
                    <!-- /.col -->
                </div>
            </div>
            <!--/. container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <h1 class="mt-5">Pesan</h1>
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $c)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $c->nama }}</td>
                                <td>{{ $c->email }}</td>
                                <td>{{ $c->subject }}</td>
                                <td>{{ $c->pesan }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>


            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
