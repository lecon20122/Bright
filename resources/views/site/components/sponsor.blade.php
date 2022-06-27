<style>
    .pargraph {
        font-size: 15px
    }
</style>
<!-- Classes Start -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3" id="featered">بعض المختصين </h1>
            {{-- <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                 eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p> --}}
        </div>
        @if ($FeaturedCategoryDoctors)
            <div class="row g-4">
                @if (count($FeaturedCategoryDoctors->users) > 0)
                    @foreach ($FeaturedCategoryDoctors->users as $doctor)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="classes-item">
                                <div class="bg-light rounded-circle w-75 mx-auto p-3">
                                    {{-- <img class="img-fluid rounded-circle"
                                         src="{{ asset('images/users') . '/' . $doctor->image }}" alt="" width="50" height="50"> --}}
                                </div>
                                <div class="bg-light rounded p-4 pt-5 mt-n5">
                                    <a class="d-block text-center h3 mt-3 mb-4"
                                        href="{{ route('doctor.show', ['doctor_id' => $doctor->id]) }}">
                                        <h5>{{ $doctor->type }}/ {{ $doctor->name }}</h5>
                                    </a>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center">
                                            <img class="img-fluid"
                                                src="{{ asset('images/users') . '/' . $doctor->image }}"
                                                alt="" width="100" height="100">
                                            {{-- <div class="ms-3">
                                                 <h6 class="text-primary mb-1">
                                                     {{ Str::words($doctor->description, 20, '/n') }}</h6>
                                                 <small>Teacher</small>
                                             </div> --}}
                                        </div>
                                        <span class="bg-primary text-white rounded-pill py-2 px-3" href="">
                                            {{ $doctor->price }} EGP</span>
                                    </div>
                                    <div class="row g-1">
                                        <div class="col-4">
                                            <div class="border-top border-3 border-primary pt-2">
                                                <h6 class="text-primary mb-1"> العنوان
                                                    <br>
                                                </h6>
                                                <p class="pargraph">{{ $doctor->address }}</p>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="border-top border-3 border-success pt-2">

                                                <h6 class="text-success mb-1">وقت_الأنتظار</h6>
                                                <small>{{ $doctor->wait_time }}</small>


                                            </div>

                                        </div>
                                        <div class="col-4">
                                            <div class="border-top border-3 border-warning pt-2">
                                                <h6 class="text-warning mb-1">التخصص</h6>
                                                <small>{{ substr($doctor->description  , 0 , 15) }}

                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        @endif
    </div>
</div>
<!-- Classes End -->
