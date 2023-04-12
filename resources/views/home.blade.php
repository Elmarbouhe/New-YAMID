@extends('master.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('success'))
                <div class="alert alert-success my-2" role="alert">
                    {{ session('success') }}
                </div>

            @endif
            <div class="card my-2">
                <div class="card-body my-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="row">
                        @foreach ($posts as $post)
                             <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                        <div class="row g-0">
                                        <div class="col-md-12">
                                        <img src="{{asset('./uploads/'.$post->image)}}" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-50">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <h5 class="card-title">{{ $post->user ? $post->user->name : null }}</h5>
                                                <p class="card-text">{{ Str::limit($post->body, 100) }}</p>
                                               <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary">Voire</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                </div>
                <div class="d-flex justify-content-center my-4">
                    {{ $posts->links() }}

                </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
