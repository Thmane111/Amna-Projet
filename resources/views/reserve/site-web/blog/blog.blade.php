@php
$blog=App\Models\Blog::latest()->get();
@endphp
<div class="row gy-4">

  @foreach($blog as $items)
    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
      <div class="icon flex-shrink-0"><i class="{{$items['icon']['nom_icon']}}"></i></div>
      <div>
        <h4 class="title">{{$items['BlogCategory']['blog_category']}}</h4>
        <p class="description">{{Carbon\Carbon::parse($items->created_at)->diffforHumans()}}</p>
        <p class="description">{{$items->blog_title}}</p>
        <a href="service-details.html" class="readmore stretched-link btn btn-primary"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    @endforeach
    <!-- End Service Item -->





  </div>
