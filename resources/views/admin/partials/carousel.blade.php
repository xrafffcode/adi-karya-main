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
                <td><img class="img-fluid" src="{{ url('/foto_carousel/' . $g->foto) }}" width="500">
                </td>
                <td>
                    <a href="/carousel/hapus/{{ $g->id_foto }}"><button class="btn btn-danger">Hapus</button></a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalcarousel">
    Tambah Foto
</button>
