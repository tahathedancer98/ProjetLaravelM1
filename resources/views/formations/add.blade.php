@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Ajouter une nouvelle formation</h1>
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        @endif

        <form method="post" action="{{route('formationStore')}}" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label>Prix</label>
                        <input type="text" class="form-control" name="prix" required>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5" required ></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <h3>Catégories</h3>
                        @foreach($categories as $category)
                            <div class="form-check form-check-inline col-md-2">
                                <input type="checkbox" class="form-check-input" id="check-{{$category->id}}"
                                       name="checkboxCategories[{{$category->id}}]"
                                       value="{{$category->id}}">
                                <label for="check-{{$category->id}}" class="form-check-label">{{$category->name}}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <h3>Chapitres</h3>
                        @foreach($chapitres as $chapitre)
                            <div class="form-check form-check-inline col-md-2">
                                <input type="checkbox" class="form-check-input" id="check-{{$chapitre->id}}"
                                       name="checkboxChapitres[{{$chapitre->id}}]"
                                       value="{{$chapitre->id}}">
                                <label for="check-{{$chapitre->id}}" class="form-check-label">{{$chapitre->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Image</label>
                    <input type="file" required
                           name="image"
                           class="form-control"
                           accept="image/png, image/jpeg, image/jpg"
                    >
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a
                href="{{route('formationList')}}"
                class="btn btn-primary"
            >Retourner à la liste des articles</a>
        </form>
    </div>
@endsection
