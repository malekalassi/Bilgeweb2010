<div class="owl-init slider-main owl-carousel" data-items="1" data-dots="false" data-nav="true">
    @foreach($sliders as $slider)
    <div class="item-slide">
        <img src="{{asset('storage/' . $slider->image)}}">
    </div>
    @endforeach

</div>
