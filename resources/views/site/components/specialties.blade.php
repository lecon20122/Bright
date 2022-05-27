    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">الأخصائيين</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                    eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            @if ($specialties)
                <div class="row g-4 ">
                    @if (count($specialties->children) > 0)
                        @foreach ($specialties->children as $specialty)
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="facility-item">
                                    {{-- <div   class=" facility-icon bg-primary"> --}}
                                    <div class=" bg-primary">
                                        <img src="{{ asset('images/' . $headerImage[$specialty->name]) }}" alt="">
                                        <span class="bg-}}"></span>
                                        <i class="fa fa-bus-alt fa-3x text-primary"></i>
                                        <span class="bg"></span>
                                    </div>

                                    <div class="facility-text bg-primary">
                                        <h3 class="text-primary mb-3">{{ $specialty->name }}</h3>
                                        <p class="mb-0">Eirmod sed ipsum dolor sit rebum magna erat lorem
                                            kasd
                                            <a href="">read more</a>
                                            ipsum sit</p>
                                        {{-- @if ($specialty->name == App\Enums\DataBaseEnum::ADHD)
                                            <a class="btn btn-primary"
                                                href="{{ route('get-doctor-by-category', ['category' => $specialty]) }}">See
                                                Doctors / Shadow Teacher
                                            </a>
                                        @else --}}
                                            <a class="btn btn-primary"
                                                href="{{ route('get-doctor-by-category', ['category' => $specialty]) }}">See
                                                Specialists
                                            </a>
                                            <a class="btn btn-primary mt-1"
                                                href="{{ route('clinic-test', ['category' => $specialty]) }}">take Test
                                            </a>
                                        {{-- @endif --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endif
        </div>
    </div>
