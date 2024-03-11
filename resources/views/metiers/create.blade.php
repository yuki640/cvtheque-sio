{{-- directive de blade spécifiant l'héritage --}}
@extends('cvtheque')

{{-- directive de blade permettant l'injection du contenu de la section : liaison avec @yield --}}
@section('contenu')


    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h4 id="tables">Fiche Metiers : Création</h4>
                </div>
                <div class="bs-component">
                    <form method="post" action ="{{route('metiers.store')}}">
                        @method('POST')
                        @csrf
                        <fieldset>
                            <legend></legend>
                            <div class="form-group row">
                                <label for="libelle" class="col-sm-2 col-form-label">libelle : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control @error('libelle') is-invalid @enderror"
                                           id="libelle"
                                           name="libelle" 
                                           value="{{old('libelle')}}">

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
                                          rows="3">{{old('description')}}</textarea>
                                                @error('description')
                                                <p class="text-danger" role="alert">{{$message}}</p>
                                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug" class="col-sm-2 col-form-label">slug : </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           id="slug"
                                           name="slug" 
                                           value="{{old('slug')}}">

                                           @error('slug')
                                           <p class="text-danger" role="alert">{{$message}}</p>
                                           @enderror
                                </div>
                            </div>



                         <div class="pos-bloc-section">
                               <a href="{{route('metiers.index')}}" class="btn btn-primary">Retour</a>
                               <button type="submit" class ="btn btn-primary float-end">Créer</button>
                         </div>
                         </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
