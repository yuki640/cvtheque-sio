@extends('cvtheque')

@section('contenu')

<div class="bs-docs-section pos-bloc-section">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h4 id="tables">Fiche Professionnel : Création</h4>
            </div>
            <div class="bs-component">
                <form method="post" action ="{{ route('professionnels.store') }}" enctype = "multipart/form-data" >
                    @csrf
                    <fieldset>
                        <legend></legend>
                        
                        {{-- Prénom --}}
                        <div class="form-group row">
                            <label for="prenom" class="col-sm-2 col-form-label">Prénom :</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control @error('prenom') is-invalid @enderror"
                                       id="prenom"
                                       name="prenom" 
                                       value="{{ old('prenom') }}"
                                       placeholder="Entrez votre prénom">
                                @error('prenom')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Nom --}}
                        <div class="form-group row">
                            <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control @error('nom') is-invalid @enderror"
                                       id="nom"
                                       name="nom" 
                                       value="{{ old('nom') }}"
                                       placeholder="Entrez votre nom">
                                @error('nom')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                            
                        

                        {{-- Code postal --}}
                        <div class="form-group row">
                            <label for="cp" class="col-sm-2 col-form-label">Code Postal :</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control @error('cp') is-invalid @enderror"
                                       id="cp"
                                       name="cp" 
                                       value="{{ old('cp') }}"
                                       placeholder="Entrez votre code postal">
                                @error('cp')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                                
                        {{-- Ville --}}
                        <div class="form-group row">
                            <label for="ville" class="col-sm-2 col-form-label">Ville :</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control @error('ville') is-invalid @enderror"
                                       id="ville"
                                       name="ville" 
                                       value="{{ old('ville') }}"
                                       placeholder="Entrez votre ville">
                                @error('ville')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Téléphone --}}
                        <div class="form-group row">
                            <label for="telephone" class="col-sm-2 col-form-label">Téléphone :</label>
                            <div class="col-sm-10">
                                <input type="tel"
                                       class="form-control @error('telephone') is-invalid @enderror"
                                       id="telephone"
                                       name="telephone" 
                                       value="{{ old('telephone') }}"
                                       placeholder="Entrez votre numéro de téléphone">
                                @error('telephone')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email :</label>
                            <div class="col-sm-10">
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email" 
                                       value="{{ old('email') }}"
                                       placeholder="Entrez votre adresse email">
                                @error('email')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Date de naissance --}}
                        <div class="form-group row">
                            <label for="naissance" class="col-sm-2 col-form-label">Date de naissance :</label>
                            <div class="col-sm-10">
                                <input type="date"
                                       class="form-control @error('naissance') is-invalid @enderror"
                                       id="naissance"
                                       name="naissance" 
                                       value="{{ old('naissance') }}"
                                       placeholder="Entrez votre date de naissance">
                                @error('naissance')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Formation --}}
                        <div class="form-group row">
                            <label for="formation" class="col-sm-2 col-form-label">Formation :</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('formation') is-invalid @enderror" id="formation" name="formation">
                                    <option value="1" {{old('formation', isset($professionnel) ? $professionnel->formation : '') == 1 ? 'selected' : ''}}>Oui</option>
                                    <option value="0" {{old('formation', isset($professionnel) ? $professionnel->formation : '') == 0 ? 'selected' : ''}}>Non</option>
                                    </select>
                                @error('formation')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                 

                        {{-- Domaine checkbox --}}
                        <div class="form-group row">
                            <label for="domaine" class="col-sm-2 col-form-label">Domaine :</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <div class="form-check me-2">
                                <input class="form-check-input @error('domaine') is-invalid @enderror" type="checkbox" id="domaine1" name="domaine[]" value="S" {{ in_array('S', old('domaine', isset($professionnel) ? explode(',', $professionnel->domaine) : [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="domaine1">Systèmes</label>
                                </div>
                                <div class="form-check me-2">
                                <input class="form-check-input @error('domaine') is-invalid @enderror" type="checkbox" id="domaine2" name="domaine[]" value="R" {{ in_array('R', old('domaine', isset($professionnel) ? explode(',', $professionnel->domaine) : [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="domaine2">Réseaux</label>
                                </div>
                                <div class="form-check me-2">
                                <input class="form-check-input @error('domaine') is-invalid @enderror" type="checkbox" id="domaine3" name="domaine[]" value="D" {{ in_array('D', old('domaine', isset($professionnel) ? explode(',', $professionnel->domaine) : [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="domaine3">Développement</label>
                                </div>
                                @error('domaine')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        {{-- source --}}
                        <div class="form-group row">
                            <label for="source" class="col-sm-2 col-form-label">Source :</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control @error('source') is-invalid @enderror"
                                       id="source"
                                       name="source" 
                                       value="{{ old('source') }}"
                                       placeholder="Entrez votre source">
                                @error('source')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Observation --}}
                        <div class="form-group row">
                            <label for="observation" class="col-sm-2 col-form-label">Observation :</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('observation') is-invalid @enderror"
                                          id="observation"
                                          name="observation"
                                          rows="3">{{ old('observation') }}</textarea>
                                @error('observation')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <br>

                        {{-- cv a upload --}}
                        <div class="form-group row">
                            <label for="cv" class="col-sm-2 col-form-label">CV :</label>
                            <div class="col-sm-10">
                                <input type="file"
                                       class="form-control @error('cv') is-invalid @enderror"
                                       id="cv"
                                       name="cv" 
                                       value="{{ old('cv') }}"
                                       placeholder="Entrez votre cv">
                                @error('cv')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Métier --}}
                        <div class="form-group">
                            <label for="metier_id" class="col-form-label">Métier :</label>
                            <select class="form-control @error('metier_id') is-invalid @enderror" id="metier_id" name="metier_id">
                                <option value="">Tous les métiers</option>
                                @foreach ($metiers as $metier)
                                    <option value="{{ $metier->id }}" {{ old('metier_id') == $metier->id ? 'selected' : '' }}>{{ $metier->libelle }}</option>
                                @endforeach
                            </select>
                            @error('metier_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <br>

                        {{-- Competence select multiple --}}
                        <div class="form-group row">
                            <label for="competences_id" class="col-sm-2 col-form-label">Compétences :</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('competences_id') is-invalid @enderror" id="competences_id" name="competences_id[]" multiple>
                                    @foreach ($competences as $competence)
                                        <option value="{{ $competence->id }}"
                                         {{ in_array($competence->id, old('competences_id', [])) ? 'selected' : '' }}>
                                         {{ $competence->intitule }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('competences')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>



                        <div class="pos-bloc-section">
                            <a href="{{ route('professionnels.index') }}" class="btn btn-primary">Retour</a>
                            <button type="submit" class="btn btn-primary float-end">Créer</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
