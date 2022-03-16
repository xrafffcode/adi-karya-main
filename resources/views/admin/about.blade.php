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
                                <td><img class="img-fluid" src="{{ asset('/foto_about/' . $a->image) }}" width="300">
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
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3"></textarea>
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

            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
