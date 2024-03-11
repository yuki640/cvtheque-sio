@extends('cvtheque')

@section('contenu')

<div class="bs-docs-section pos-bloc-section">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h4 id="tables">Fiche Professionnel : Création</h4>
            </div>
            <div class="bs-component">
                <form method="post" action ="{{ route('professionnels.store') }}">
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
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>
                                </select>
                                @error('formation')
                                <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Domaine --}}
                        <div class="form-group row">
                            <label for="domaine" class="col-sm-2 col-form-label">Domaine :</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('domaine') is-invalid @enderror" id="domaine" name="domaine">
                                    <option value="S">S</option>
                                    <option value="R">R</option>
                                    <option value="D">D</option>
                                </select>
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

                        {{-- Métier --}}
                        <div class="form-group">
                            <label for="metier_id" class="col-form-label">Métier :</label>
                            <select class="form-control @error('metier_id') is-invalid @enderror" id="metier_id" name="metier_id">
                                @foreach ($metiers as $metier)
                                    <option value="{{ $metier->id }}">{{ $metier->libelle }}</option>
                                @endforeach
                            </select>
                            @error('metier_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
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
