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
@endsection
