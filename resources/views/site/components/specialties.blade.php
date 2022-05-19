    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">School Facilities</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                    eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="row g-4">
                @foreach ($specialties as $specialty)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="facility-item">
                            <div class="facility-icon bg-primary">
                                <span class="bg-}}"></span>
                                <i class="fa fa-bus-alt fa-3x text-primary"></i>
                                <span class="bg"></span>
                            </div>
                            <div class="facility-text bg-primary">
                                <h3 class="text-primary mb-3">{{ $specialty->name }}</h3>
                                <p class="mb-0">Eirmod sed ipsum dolor sit rebum magna erat lorem kasd vero
                                    ipsum sit</p>
                                <a class="btn btn-info" href="{{ route('get-doctor-by-category', ['category' => $specialty]) }}">See Doctors</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
