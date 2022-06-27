<style>
    .name {
        font-size: 28px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .read {
        font-size: 20px
    }
</style>
<div id="specialist"></div>
<div class="container-xxl py-2">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3 ">التخصصات</h1>
            <p class="pargraph">نحن هنا لمساعدتك في معرفة التخصصات بشكل اوضح وجعل الوصول للمختصين بسهولة وتقديم اختبارات
                مجانية لمعرفة النسبة المؤية
                لأحتياجك لمختصين </p>
        </div>
        @if ($specialties)
            <div class="row g-4 ">
                @if (count($specialties->children) > 0)
                    @foreach ($specialties->children as $specialty)
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="facility-item">
                                {{-- <div   class=" facility-icon bg-primary"> --}}
                                {{-- <div class=" bg-primary"> --}}

                                {{-- <div class=""> --}}
                                <div class="">
                                    <img src="{{ asset('images/' . $headerImage[$specialty->name]) }}"
                                        alt=""width="300" height="100">
                                    <span class="bg-}}"></span>
                                    {{-- <i class="fa fa-bus-alt fa-3x text-primary"></i> --}}
                                    <i class="fa-3x text-primary"></i>
                                    <span class="bg"></span>
                                </div>

                                <div class="facility-text bg-primary">
                                    <h3 class="text-primary mb-3 name">{{ $specialty->name }}</h3>
                                    <p class="mb-0 parg ">{{ $description[$specialty->name] }}</p>

                                    {{-- {{ $specialty->description }} --}}
                                    <a class="read"
                                        href="{{ route('page.content', ['category' => $specialty->name]) }}">قراءة
                                        المزيد</a>

                                    @auth
                                        @if ($specialty->testScores->isNotEmpty())
                                            @if ($specialty->testScores()->where('user_id', auth()->user()->id)->first())
                                                <div class="alert alert-info p-0" role="alert">
                                                    نحن نقترح بنسبة
                                                    {{-- {{ auth()->user()->testScores()->where('category_id', $specialty->id)->first()->total_score }} --}}
                                                    {{ $specialty->testScores()->where('user_id', auth()->user()->id)->first()->total_score ?? '(score not found)' }}
                                                    لزيارة المختص
                                                </div>
                                            @endif
                                        @endif
                                    @endauth
                                    <a class="btn btn-primary"
                                        href="{{ route('get-doctor-by-category', ['category' => $specialty]) }}">المختصين

                                    </a>
                                    @if (count($specialty->questions) > 0)
                                        <a class="btn btn-primary mt-1"
                                            href="{{ route('clinic-test', ['category' => $specialty]) }}">بدأ الأختبار

                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        @endif
    </div>
</div>
