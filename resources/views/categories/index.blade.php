@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Category</h1>
            <section class="featured-posts-section mb-5 p-5 text-center">
                <ul class="nav flex-column ">
                    @foreach($categories as $category)
                        <li class="btn ui-button ">
                            <a href="{{route('category.post.index', $category->id)}}" class="col-11 col-lg-6 btn bg-gradient bg-secondary">
                                {{$category->title}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
        </div>

    </main>
@endsection
