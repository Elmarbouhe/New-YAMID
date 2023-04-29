@extends('master.layout')
@section('content')
<title>  {{ $post->title }} </title>


    <div class="container my-2">
        <div class="row">
            <div class="col-md-8">
                 <div class="card">
                    <h3 class="card-header">{{$post->title }} </h3>
                                    <div class="card-img-top">
                                         <img src="{{asset('./uploads/'.$post->image)}}" class="img-fluid w-100" alt="...">
                                    </div>
                                    <div class="card-body">
                                         <h5 class="card-title">{{ $post->title }}</h5>
                                         {{-- <p class="text-dark font-weight-bold  ">
                                            {{$categories->title}}
                                         </p> --}}
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
                                            {{ ($post->body) }}
                                         </p>
                                         <p class ="font-weight-bold">
                                            @if ($post->inStock > 0)
                                                <span class="text-success">
                                                    Disponible
                                                </span>
                                            @else
                                                <span class="text-danger">
                                                    Pas Disponible
                                                </span>
                                            @endif

                                         </p>

                                    </div>

                            @if (Auth::check())
                            @if(Auth::user()->id == $post->user_id || Auth::user()->admin)
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
            {{-- <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header">Vendeur</h3>
                    <div class="card-body">
                        <p class="card-text">
                            <span class="font-weight-bold">
                                Nom:
                            </span>
                            {{$post->user->name}}
                        </p>
                        <p class="card-text">
                            <span class="font-weight-bold">
                                Email:
                            </span>
                            {{$post->user->email}}
                        </p>
                        <p class="card-text">
                            <span class="font-weight-bold">
                                Téléphone:
                            </span>
                            {{$post->user->phone}}
                        </p>
                        <p class="card-text">
                            <span class="font-weight-bold">
                                Adresse:
                            </span>
                            {{$post->user->address}}
                        </p>
                    </div>
                </div> --}}
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header">Choisissez votre quantité</h3>
                        <div class="card-body">
                            <form action="">
                                @csrf
                                <div class="form-group">
                                    <label for="quantity" class="label-input my-2">
                                        Quantité disponible: {{$post->inStock}}
                                    </label>
                                    <input type="number" name="quantity" id="quantity"
                                        value="1"
                                        placeholder="Quantité"
                                        max = "{{$post->inStock}}"
                                        min="1"
                                        class="form-control"
                                    >
                                </div>
                                <div class="form-group my-2">
                                    <button type="submit" class="btn btn-block bg-dark text-white">
                                        <i class="fas fa-shopping-cart"></i>
                                        Ajouter au panier
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
        </div>
    </div>

@endsection

