<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-title text-center">
            <h1 class="display-5 mb-5">Produk Kami</h1>
        </div>
        <div class="row g-4 justify-content-md-center">
            @foreach ($produk as $p)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ url('/foto_produk/' . $p->gambar_1) }}" alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">{{ $p->nama_produk }}</h4>
                            <p>{{ $p->deskripsi_produk }}</p>
                            <a class="fw-medium" href="/produk/{{ $p->id }}">See Details<i
                                    class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->
