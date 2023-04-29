@extends('master.layout')
<title>Ajouter un categories</title>
@section('content')

    <div class="row my-4">
        <div class='col-md-8 mx-auto'>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                        <h3 class="card-title">
                            Ajouter un cetegorie
                        </h3>
                        <div class="card-body">
                            <form action="{{route('categorys.store')}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Titre</label>
                                    <input type="text" class="form-control"  name="title" placeholder="Titre">
                                </div>
                                </div>
                                <div class="mb-3">
                                    <button  class="btn btn-primary">Ajouter</button>
                                </div>

                            </form>
                        </div>
                </div>
            </div>

        </div>

    </div>

@endsection
