
<div class="splide my-20" id="bannerCarousel" style="padding: 0px">
    <div class="splide__track w-full">
          <ul class="splide__list">
              <li class="splide__slide">
                <img src="{{ asset('img/img1.jpg') }}" alt="" class="w-full object-contain">
              </li>
              <li class="splide__slide">
                <img src="{{ asset('img/img1.jpg') }}" alt="" class="w-full object-contain">
              </li>
              <li class="splide__slide">
                <img src="{{ asset('img/img1.jpg') }}" alt="" class="w-full object-contain">
              </li>
              <li class="splide__slide">
                <img src="{{ asset('img/img1.jpg') }}" alt="" class="w-full object-contain">
              </li>
              <li class="splide__slide">
                <img src="{{ asset('img/img1.jpg') }}" alt="" class="w-full object-contain">
              </li>

          </ul>
    </div>
  </div>

@push('scripts')
    <script>
        const project = new Splide('#bannerCarousel', {
            type: 'loop',
            drag: 'free',
            focus: 'center',
            perPage: 1,
            pagination: false,
            arrows: false,
            autoplay: true
        });


        project.mount();
    </script>
@endpush
