@extends('master.layout')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card my-2">
                <h3 class="card-header">YAMID
                </h3>
                              @if (session('success'))
                                <div class="alert alert-success my-2" role="alert">
                                {{ session('success') }}
                                </div>
                              @endif
                              @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                </div>
                              @endif
                <div class="card-body ">
                    <div class="row">
                        @foreach ($posts as $post)
                        @if (Auth::check())
                        @if(Auth::user()->id == $post->user_id || Auth::user()->admin)
                            <div class="col-md-4 mb-2 shadow-sm ">
                                <div class="card" style="width:18rem,height:100%">
                                    <div class="card-img-top">
                                                    <img src="{{asset('./uploads/'.$post->image)}}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="card-body">
                                         <h5 class="card-title">{{ $post->title }}</h5>
                                         <h5 class="card-title">{{ $post->user ? $post->user->name : null }}</h5>
                                         <p class="d-flex flex-row justify-content-between align-items-center">
                                            <span class="text-muted">
                                                {{ $post->price}} DH
                                            </span>
                                            <span class="text-danger">
                                                <strike>
                                                {{ $post->old_price}} DH
                                                </strike>
                                            </span>
                                         </p>
                                         <p class="card-text">
                                            {{ Str::limit($post->body, 100) }}
                                         </p>
                                         <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">
                                            <li class="fas fa-eye"></li>
                                            Voire
                                         </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @else
                        <div class="col-md-4 mb-2 shadow-sm ">
                            <div class="card" style="width:18rem,height:100%">
                                <div class="card-img-top">
                                                <img src="{{asset('./uploads/'.$post->image)}}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="card-body">
                                     <h5 class="card-title">{{ $post->title }}</h5>
                                     <p class="d-flex flex-row justify-content-between align-items-center">
                                        <span class="text-muted">
                                            {{ $post->price}} DH
                                        </span>
                                        <span class="text-danger">
                                            <strike>
                                            {{ $post->old_price}} DH
                                            </strike>
                                        </span>
                                     </p>
                                     <p class="card-text">
                                        {{ Str::limit($post->body, 100) }}
                                     </p>
                                     <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">
                                        <li class="fas fa-eye"></li>
                                        Voire
                                     </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center my-4">
                        {{ $posts->links() }}
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-4">
            <div class="list-group my-2">
                <li class="list-group-item active">
                    categories
                </li>
                @foreach ($categories as $category)
                <a href="{{route('category.posts', $category->slug)}}" class="list-group-item list-group-item-action">
                    {{$category->title}}
                    {{ $category->posts->count()}}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
