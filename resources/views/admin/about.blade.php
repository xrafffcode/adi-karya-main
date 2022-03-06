@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <h1 class="mt-5">Konten About</h1>
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Client</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($about as $a)
                            <tr>
                                <td><img class="img-fluid" src="{{ url('/foto_about/' . $a->image) }}" width="300">
                                </td>
                                <td>{{ $a->deskripsi }}</td>
                                <td>{{ $a->client }}</td>
                                <td>
                                    <a href="{{ route('about.edit', $a->id) }}"><button
                                            class="btn btn-success">Edit</button></a>
                                    <a href="/carousel/hapus/"><button class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalabout">
                    Tambah Konten
                </button>



            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
