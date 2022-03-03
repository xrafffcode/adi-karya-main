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
                 <td><img class="img-fluid" src="{{ url('/foto_testimoni/' . $t->image) }}" width="300">
                 </td>
                 <td>{{ $t->testimoni }}</td>
                 <td>{{ $t->nama }}</td>
                 <td>{{ $t->profesi }}</td>
                 <td>
                     <a href="/about_edit/{{ $t->id }}"><button class="btn btn-success">Edit</button></a>
                     <a href="/pemilik/hapus/{{ $t->id }}"><button class="btn btn-danger">Hapus</button></a>
                 </td>
             </tr>
         @endforeach
     </tbody>

 </table>
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltestimoni">
     Tambah Testimoni
 </button>
