{{-- directive de blade spécifiant l'héritage --}}
@extends('cvtheque')

{{-- directive de blade permettant l'injection du contenu de la section : liaison avec @yield --}}
@section('contenu')


    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h4 id="tables">Fiche compétence : Modification</h4>
                </div>
                <div class="bs-component">
                    <form method="post" action ="{{route('metiers.update', ['metier'=>$metier->id])}}">
                        @method('PUT')
                        @csrf
                        <fieldset>
                            <legend></legend>
                            <div class="form-group row">
                                <label for="libelle" class="col-sm-2 col-form-label">Intitulé : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control @error('libelle') is-invalid @enderror"
                                           id="libelle"
                                           name="libelle" 
                                           value="{{old('libelle', $metier->libelle)}}">

                                           @error('libelle')
                                           <p class="text-danger" role="alert">{{$message}}</p>
                                           @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description"  class="col-sm-2 col-form-label">Descriptif :</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description"
                                          name="description"
                                          rows="3">{{old('description', $metier->description)}}</textarea>
                                                @error('description')
                                                <p class="text-danger" role="alert">{{$message}}</p>
                                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug"  class="col-sm-2 col-form-label">Slug :</label>
                                <textarea class="form-control @error('slug') is-invalid @enderror"
                                          id="slug"
                                          name="slug"
                                          rows="3">{{old('slug', $metier->slug)}}</textarea>
                                                @error('slug')
                                                <p class="text-danger" role="alert">{{$message}}</p>
                                                @enderror
                            </div>

                            



                         <div class="pos-bloc-section">
                               <a href="{{route('metiers.index')}}" class="btn btn-primary">Retour</a>
                               <button type="submit" class ="btn btn-primary float-end">Modifier</button>
                         </div>
                         </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
