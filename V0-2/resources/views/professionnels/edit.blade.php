{{-- Modifier pour les professionnels --}}
@extends('cvtheque')

@section('contenu')

<div class="bs-docs-section pos-bloc-section">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h4 id="tables">Fiche Professionnel : Modification</h4>
            </div>
            <div class="bs-component">
                <form method="post" action ="{{route('professionnels.update', ['professionnel'=>$professionnel->id])}}">
                    @method('PUT')
                    @csrf
                    <fieldset>
                        <legend></legend>
                        <div class="form-group row">
                            <label for="prenom" class="col-sm-2 col-form-label">Prénom :</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control @error('prenom') is-invalid @enderror"
                                       id="prenom"
                                       name="prenom" 
                                       value="{{old('prenom', $professionnel->prenom)}}">
                                @error('prenom')
                                <p class="text-danger" role="alert">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control @error('nom') is-invalid @enderror"
                                       id="nom"
                                       name="nom" 
                                       value="{{old('nom', $professionnel->nom)}}">
                                @error('nom')
                                <p class="text-danger" role="alert">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cp" class="col-sm-2 col-form-label">Code Postal :</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control @error('cp') is-invalid @enderror"
                                       id="cp"
                                       name="cp" 
                                       value="{{old('cp', $professionnel->cp)}}">
                                @error('cp')
                                <p class="text-danger" role="alert">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ville" class="col-sm-2 col-form-label">Ville :</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control @error('ville') is-invalid @enderror"
                                       id="ville"
                                       name="ville" 
                                       value="{{old('ville', $professionnel->ville)}}">
                                @error('ville')
                                <p class="text-danger" role="alert">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telephone" class="col-sm-2 col-form-label">Téléphone :</label>
                            <div class="col-sm-10">
                                <input type="tel"
                                       class="form-control @error('telephone') is-invalid @enderror"
                                       id="telephone"
                                       name="telephone" 
                                       value="{{old('telephone', $professionnel->telephone)}}">
                                @error('telephone')
                                <p class="text-danger" role="alert">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email :</label>
                            <div class="col-sm-10">
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email" 
                                       value="{{old('email', $professionnel->email)}}">
                                @error('email')
                                <p class="text-danger" role="alert">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="naissance" class="col-sm-2 col-form-label">Date de naissance :</label>
                            <div class="col-sm-10">
                                <input type="date"
                                       class="form-control @error('naissance') is-invalid @enderror"
                                       id="naissance"
                                       name="naissance" 
                                       value="{{old('naissance', $professionnel->naissance)}}">
                                @error('naissance')
                                <p class="text-danger" role="alert">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="formation" class="col-sm-2 col-form-label">Formation :</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('formation') is-invalid @enderror" id="formation" name="formation">
                                    <option value="1" {{old('formation', $professionnel->formation) == 1 ? 'selected' : ''}}>Oui</option>
                                    <option value="0" {{old('formation', $professionnel->formation) == 0 ? 'selected' : ''}}>Non</option>
                                </select>
                                @error('formation')
                                <p class="text-danger" role="alert">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="domaine" class="col-sm-2 col-form-label">Domaine :</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <div class="form-check me-2">
                                    <input class="form-check-input @error('domaine') is-invalid @enderror" type="checkbox" id="domaine1" name="domaine[]" value="S" {{ in_array('S', old('domaine', explode(',', $professionnel->domaine))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="domaine1">Systèmes</label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input @error('domaine') is-invalid @enderror" type="checkbox" id="domaine2" name="domaine[]" value="R" {{ in_array('R', old('domaine', explode(',', $professionnel->domaine))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="domaine2">Réseaux</label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input @error('domaine') is-invalid @enderror" type="checkbox" id="domaine3" name="domaine[]" value="D" {{ in_array('D', old('domaine', explode(',', $professionnel->domaine))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="domaine3">Développement</label>
                                </div>
                                @error('domaine')
                                <p class="text-danger" role="alert">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="source" class="col-sm-2 col-form-label">Source :</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control @error('source') is-invalid @enderror"
                                       id="source"
                                       name="source" 
                                       value="{{old('source', $professionnel->source)}}">
                                @error('source')
                                <p class="text-danger" role="alert">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="observation" class="col-sm-2 col-form-label">Observation :</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('observation') is-invalid @enderror"
                                          id="observation"
                                          name="observation"
                                          rows="3">{{old('observation', $professionnel->observation)}}</textarea>
                                @error('observation')
                                <p class="text-danger" role="alert">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="metier_id" class="col-form-label">Métier :</label>
                            <select class="form-control @error('metier_id') is-invalid @enderror" id="metier_id" name="metier_id">
                                <option value="">Tous les métiers</option> {{-- Si vous souhaitez garder cette option --}}
                                @foreach ($metiers as $metier)
                                    <option value="{{ $metier->id }}" {{ old('metier_id', isset($professionnel->metier) ? $professionnel->metier->id : '') == $metier->id ? 'selected' : '' }}>{{ $metier->libelle }}</option>
                                @endforeach
                            </select>
                            @error('metier_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pos-bloc-section">
                            <a href="{{ route('professionnels.index') }}" class="btn btn-primary">Retour</a>
                            <button type="submit" class="btn btn-primary float-end">Modifier</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
