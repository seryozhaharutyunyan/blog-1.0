@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">User name
                <!--post->user->title--> {{$data->day}} {{$data->format('F')}} {{$data->year}} {{$data->format('H:i')}}
                Comments {{$post->comments->count()}}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/'.$post->main_img)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
                <div class="row mb-5">
                    @if(isset($post->preview_img))
                        <div class="col-md-4 mb-3" data-aos="fade-right">
                            <img src="{{asset('storage/'.$post->preview_img)}}" alt="blog post" class="img-fluid">
                        </div>
                    @endif
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section>
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
                    </section>
                    @if($relatedPosts->count()>0)
                        <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $value)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{asset('storage/'.$value->main_img)}}" alt="related post"
                                         class="post-thumbnail">
                                    <p class="post-category">{{$value->category->title}}</p>
                                    <a href="{{route('post.show', $value->id)}}"><h5
                                            class="post-title">{{$post->title}}</h5></a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    <section class="comment-section">
                        <h2>Comments ({{$post->comments->count()}})</h2>
                        @foreach($post->comments as $comment)
                            <section class="comment-list m-3">
                                <div class="comment-text">
                            <span class="username">
                                <div class="m-2 text-center col-12 font-weight-medium">
                                    <h4>{{$comment->user->name}}</h4>
                                </div>
                              <span class="text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}y</span>
                            </span>{{$comment->message}}
                                </div>
                            </section>
                        @endforeach
                    </section>
                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                            <form action="{{route('post.comment.store', $post->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Comment</label>
                                        <textarea name="message" id="comment" class="form-control" placeholder="Comment"
                                                  rows="10" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Send Message" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
