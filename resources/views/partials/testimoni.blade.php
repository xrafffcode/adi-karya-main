<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="section-title text-center">
            <h1 class="display-5 mb-5">What customers say</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            @foreach ($testimoni as $t)
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3" src="{{ url('/foto_testimoni/' . $t->image) }}"
                        style="width: 90px; height: 90px;">
                    <div class="testimonial-text text-center p-4">
                        <p>
                            {{ $t->testimoni }}
                        </p>
                        <h5 class="mb-1">{{ $t->nama }}</h5>
                        <span class="fst-italic">{{ $t->profesi }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->
