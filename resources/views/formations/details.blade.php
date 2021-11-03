@extends('layouts.layout')

@section('content')
    <div class="container">
            <h1>Détails de la formation :</h1>
            <div class="row">
                <div class="col-md-9">
                    {{--Form pour modifer cette nouvelle formation --}}
                    <form method="post" action="{{route('formationUpdate', $formation->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" name="nom" required value="{{$formation->nom}}">
                                </div>
                                <div class="form-group">
                                    <label>Prix</label>
                                    <input type="text" class="form-control" name="prix" required value="{{$formation->prix}}">
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" class="form-control" name="type" required value="{{$formation->type}}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="5" required >{{$formation->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="row">
                                    <h3>Catégories</h3>
                                    @foreach($categories as $category)
                                        <div class="form-check form-check-inline col-md-2">
                                            <input type="checkbox" class="form-check-input" id="check-{{$category->id}}"
                                                   name="checkboxCategories[{{$category->id}}]"
                                                   value="{{$category->id}}"
                                                   @if($formation->categories->contains('id',$category->id)) checked @endif>
                                            <label for="check-{{$category->id}}" class="form-checek-label">{{$category->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <h3>Chapitres</h3>
                                    @foreach($chapitres as $chapitre)
                                        <div class="form-check form-check-inline col-md-2">
                                            <input type="checkbox" class="form-check-input" id="check-{{$chapitre->id}}"
                                                   name="checkboxChapitres[{{$chapitre->id}}]"
                                                   value="{{$chapitre->id}}"
                                                   @if($formation->chapitres->contains('id',$chapitre->id)) checked @endif>
                                            <label for="check-{{$chapitre->id}}" class="form-checek-label">{{$chapitre->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-warning">Modifier</button>
                    </form>
                </div>
                <div class="col-md-3">
                        {{--Form pour modifier l'image de la formation --}}
                    <form method="post" action="{{route('formationUpdateImage', $formation->id)}}"
                          enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" required
                                   name="image"
                                   class="form-control"
                                   accept="image/png, image/jpeg, image/jpg"
                            >
                            <button type="submit" class="btn btn-warning">Modifier l'image</button>
                        </div>
                    </form>
                    <img src="{{asset("storage/$formation->image")}}"
                         class="card-img-top"
                         height="140"
                         style="object-fit: cover"
                    />
                </div>
            </div>

        <a
            href="{{route('formationList')}}"
            class="btn btn-primary"
        >Retourner à la liste des formations</a>
    </div>
@endsection
