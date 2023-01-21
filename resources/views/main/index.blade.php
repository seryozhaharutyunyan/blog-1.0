@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{'storage/'.$post->main_img}}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{$post->category->title}}</p>
                                @auth()
                                <form action="{{route('post.like.store', $post->id)}}" method="post">
                                    @csrf
                                    <span>{{ $post->like_users_count }}</span>
                                    <button type="submit" class="border-0 bg-transparent">
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                            <i class="fas fa-heart"></i>
                                        @else
                                            <i class="far fa-heart"></i>
                                        @endif

                                    </button>
                                </form>
                                @endauth
                                @guest()
                                    <div>
                                        <span>{{ $post->like_users_count }}</span>
                                        <i class="far fa-heart"></i>
                                    </div>
                                @endguest
                            </div>
                            <a href="{{route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$post->title}}</h6>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-12 d-flex justify-content-center">
                        {{$posts->links()}}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $value)
                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{'storage/'.$value->main_img}}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category">{{$value->category->title}}</p>
                                    <a href="{{route('post.show', $value->id)}}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$value->title}}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Like Post List</h5>
                        <ul class="post-list">
                            @foreach($likePosts as $value)
                                <li class="post">
                                    <a href="{{route('post.show', $value->id)}}" class="post-permalink media">
                                        <img src="{{'storage/'.$value->main_img}}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{$value->title}}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
