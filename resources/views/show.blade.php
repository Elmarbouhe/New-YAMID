@extends('master.layout')
@section('content')
<title>  {{ $post->title }} </title>

    
    <div class="container my-4">
        <div class="card" style="width: 50rem;">

          <img src="{{asset('./uploads/'.$post->image)}}" class="img-fluid rounded-start" alt="...">
            <div class="col-md-8">
                <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ ($post->body) }}</p>
                </div>
            </div>
            @if (Auth::check())
            @if(Auth::user()->id == $post->user_id)
                <a href="{{route('posts.edit',$post->slug) }}" class="btn btn-warning">
                    Modifier
                </a>
                <form id="{{ $post->id }}" action="{{route('posts.destroy',$post->slug)}}" method="post">
                    @csrf
                    @method('DELETE')
                </form>
                <button
                    onclick="event.preventDefault();
                    if(confirm('Voulez vous vraiment supprimer ce post?'))
                    document.getElementById({{ $post->id}}).submit();"
                    class="btn btn-danger" type="submit">
                    Supprimer
                </button>
            @endif
            @endif


        </div>
    </div>

@endsection

