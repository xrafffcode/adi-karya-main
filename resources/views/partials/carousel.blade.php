<!-- Carousel Start -->
<div class="container-fluid p-0 pb-5">
    <div class="owl-carousel header-carousel position-relative">
        @foreach ($gambar as $g)
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('/foto_carousel/' . $g->foto) }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">
                                    @lang('home.carousel.welcome')
                                </h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">
                                    @lang('home.carousel.title')
                                </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">
                                    @lang('home.carousel.subtitle')
                                </p>
                                <a href="https://api.whatsapp.com/send?phone=6288806929160&text=Hallo%20Adi%20Karya,%20I%20want%20to%20buy%20your%20product"
                                    target="_blank" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                                    @lang('home.carousel.button_header')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Carousel End -->
