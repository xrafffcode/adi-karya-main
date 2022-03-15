<!-- About Start -->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        @foreach ($about as $a)
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="{{ url('/foto_about/' . $a->image) }}" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">About</h1>
                        </div>
                        <p class="mb-4 pb-2">{{ $a->deskripsi }}</p>
                        </p>
                        <div class="row g-4 mb-4 pb-2">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-users fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h2 class="text-primary mb-1" data-toggle="counter-up">{{ $a->client }}</h2>
                                        <p class="fw-medium mb-0">Pelanggan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary py-3 px-5"> @lang('home.about.button')</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- About End -->
