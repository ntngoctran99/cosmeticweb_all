@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="img/blog/details/details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>{{$blog->title}}</h2>
                        <ul>
                            <li>{{$blog->author ?? 'Noname'}}</li>
                            <li>{{\Carbon\Carbon::parse($blog->created_at)->format('d-m-Y')}}</li>
                            <li>8 Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="{{$blog->image}}" alt="{{$blog->title}}">
                        <div>
                            {!!html_entity_decode($blog->content)!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Post You May Like</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $b)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{$b->image}}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{\Carbon\Carbon::parse($b->created_at)->format('d-m-Y')}}</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="{{route('blog.detail', $b->id)}}">{{$b->title}}</a></h5>
                                <a href="{{route('blog.detail', $b->id)}}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->
@endsection
