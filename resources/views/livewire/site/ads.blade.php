<div class="col-md-4"
     style="background-image: url({{ $ad_new ? $ad_new->image : url('front/img/Backgroundimg-modal.jpg')}});background-size: cover">
    <div class="d-flex flex-column justify-content-center text-white p-3 h-100">
        <img width="100" src="{{ url('front/img/logo-white.png') }}" alt="">
        <h3 class="pb-3">{{$ad_new ? $ad_new->title : '---'}}</h3>
<<<<<<< Updated upstream
        <p class="text-white"> {{ nl2br(Str::limit($ad_new ?$ad_new->description : __('The description is currently empty',500))) }}</p>
=======
        <p class="text-white"> {{ nl2br(Str::limit($ad_new ? $ad_new->description : __('The description is currently empty',500))) }}</p>
>>>>>>> Stashed changes
    </div>
</div>

