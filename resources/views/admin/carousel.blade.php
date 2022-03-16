@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <h1>Foto Carousel</h1>
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gambar as $g)
                            <tr>
                                <td>{{ $g->id_foto }}</td>
                                <td><img class="img-fluid" src="{{ asset('/foto_carousel/' . $g->foto) }}"
                                        width="500">
                                </td>
                                <td>
                                    <a href="/admin/carousel/hapus/{{ $g->id_foto }}"><button
                                            class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalcarousel">
                    Tambah Foto
                </button>

                <div class="modal fade" id="modalcarousel" tabindex="-1" aria-labelledby="modalcarouselLabel"
                    aria-hidden="true">
                    <form action="/admin/carousel/upload" method="POST" enctype="multipart/form-data">
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


            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
