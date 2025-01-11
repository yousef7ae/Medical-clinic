<div>
    @if ($statistics->count() > 0)
    <section class="achievements overlay py-4 counter-box">
        <div class="row g-0">
            @foreach ($statistics as $statistic)

            <div class="col-md-3 col-6 mb-3">
                <div class="box text-center text-white fw-bold" data-aos="fade-down" data-aos-delay="0">
                    <img class="img-fluid mx-auto" width="91" src="{{ $statistic->image ? $statistic->image : url('front/img/icon4.png')}}" alt="">
                    <h4>{{$statistic->name}}</h4>
                    <h4><span class="counter" data-number="{{$statistic->value}}"></span>+</h4>
                </div>
            </div>

            @endforeach
        </div>
    </section>
    @endif
</div>
