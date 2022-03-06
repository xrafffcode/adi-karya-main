@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <h1 class="mt-5">Pemilik</h1>
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemilik as $p)
                            <tr>
                                <td><img class="img-fluid" src="{{ url('/foto_pemilik/' . $p->image) }}" width="300">
                                </td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->posisi }}</td>
                                <td>
                                    <a href="/about_edit/{{ $p->id }}"><button
                                            class="btn btn-success">Edit</button></a>
                                    <a href="/pemilik/hapus/{{ $p->id }}"><button
                                            class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalpemilik">
                    Tambah Pemilik
                </button>



            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
