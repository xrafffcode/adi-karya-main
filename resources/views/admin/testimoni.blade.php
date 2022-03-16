@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <h1 class="mt-5">Testimoni</h1>
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Testimoni</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Profesi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimoni as $t)
                            <tr>
                                <td><img class="img-fluid" src="{{ asset('/foto_testimoni/' . $t->image) }}"
                                        width="300">
                                </td>
                                <td>{{ $t->testimoni }}</td>
                                <td>{{ $t->nama }}</td>
                                <td>{{ $t->profesi }}</td>
                                <td>
                                    <a href="/about_edit/{{ $t->id }}"><button
                                            class="btn btn-success">Edit</button></a>
                                    <a href="/pemilik/hapus/{{ $t->id }}"><button
                                            class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltestimoni">
                    Tambah Testimoni
                </button>
                <div class="modal fade" id="modaltestimoni" tabindex="-1" aria-labelledby="modalaboutLabel"
                    aria-hidden="true">
                    <form action="/testimoni/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalaboutLabel">Input Testimoni</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Pilih Foto</label>
                                        <input class="form-control" type="file" name="image" id="formFile">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Testimoni</label>
                                        <textarea type="text" class="form-control" id="exampleFormControlInput1" name="testimoni"
                                            placeholder="Kualitas Disini Bagus"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama"
                                            placeholder="Jojon">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Profesi</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="profesi" placeholder="pegawai">
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
