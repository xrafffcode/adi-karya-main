@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <h1 class="mt-5">Produk</h1>
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Gambar 1</th>
                            <th scope="col">Gambar 2</th>
                            <th scope="col">Gambar 3</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $p)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $p->nama_produk }}</td>
                                <td>{{ $p->deskripsi_produk }}</td>
                                <td>
                                    <img src="{{ url('/foto_produk/' . $p->gambar_1) }}" alt="{{ $p->nama_produk }}"
                                        width="100px">
                                </td>
                                <td>
                                    <img src="{{ url('/foto_produk/' . $p->gambar_2) }}" alt="{{ $p->nama_produk }}"
                                        width="100px">
                                </td>
                                <td>
                                    <img src="{{ url('/foto_produk/' . $p->gambar_3) }}" alt="{{ $p->nama_produk }}"
                                        width="100px">
                                </td>
                                <td>
                                    <a href="{{ url('/admin/produk/' . $p->id . '/edit') }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ url('/admin/produk/hapus/' . $p->id) }}"
                                        class="btn btn-danger btn-sm">Hapus
                                    </a>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalproduk">
                    Tambah Produk
                </button>
                <div class="modal fade" id="modalproduk" tabindex="-1" aria-labelledby="modalaboutLabel"
                    aria-hidden="true">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalaboutLabel">Input Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="nama_produk" placeholder="Kayu Balok">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi
                                            Produk</label>
                                        <textarea type="text" class="form-control" id="exampleFormControlInput1"
                                            name="deskripsi_produk" placeholder="Ukuran 1 km"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Gambar 1</label>
                                        <input class="form-control" type="file" name="gambar_1" id="formFile">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Gambar 2</label>
                                        <input class="form-control" type="file" name="gambar_2" id="formFile">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Gambar 3</label>
                                        <input class="form-control" type="file" name="gambar_3" id="formFile">
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
