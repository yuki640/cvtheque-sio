{{-- directive de blade spécifiant l'héritage --}}
@extends('cvtheque')

{{-- directive de blade permettant l'injection du contenu de la section : liaison avec @yield --}}
@section('contenu')


    <div class="bs-docs-section pos-bloc-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h4 id="tables">Fiche professionnel : Consultation</h4>
                </div>
                <div class="bs-component">
                    <form method="post" action ="{{route('professionnels.destroy', ['professionnel'=>$professionnel->id])}}">
                        @method('DELETE')
                        @csrf
                        <fieldset>
                            <legend></legend>
                            <div class="form-group row">
                                <label for="prenom" class="col-sm-2 col-form-label">Prénom : </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="prenom"
                                          name="prenom" value="{{$professionnel->prenom}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nom"  class="col-sm-2 col-form-label">Nom :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="nom"
                                          name="nom" value="{{$professionnel->nom}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cp " class="col-sm-2 col-form-label">Code Postal :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="cp"
                                          name="cp" value="{{$professionnel->cp}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ville " class="col-sm-2 col-form-label">Ville :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="ville"
                                          name="ville" value="{{$professionnel->ville}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telephone " class="col-sm-2 col-form-label">Téléphone :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="telephone"
                                          name="telephone" value="{{$professionnel->telephone}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email " class="col-sm-2 col-form-label">Email :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="email"
                                          name="email" value="{{$professionnel->email}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="naissance " class="col-sm-2 col-form-label">Date de naissance :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="naissance"
                                          name="naissance" value="{{$professionnel->naissance}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="formation " class="col-sm-2 col-form-label">Formation :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="formation"
                                          name="formation" value="{{$professionnel->formation ? 'Oui' : 'Non'}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="domaine " class="col-sm-2 col-form-label">Domaine :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="domaine"
                                          name="domaine" value="{{$professionnel->domaine}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="source " class="col-sm-2 col-form-label">Source :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="source"
                                          name="source" value="{{$professionnel->source}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="observation " class="col-sm-2 col-form-label">Observation :</label>
                                <div class="col-sm-10">
                                    <textarea readonly="" class="form-control" id="observation"
                                              name="observation" rows="3">{{$professionnel->observation}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="metier_id " class="col-sm-2 col-form-label">Métier :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="metier_id"
                                          name="metier_id" value="{{$professionnel->metier->libelle}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="competences_id" class="col-form-label">Compétences :</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control" id="competences_id"
                                        name="competences_id" value="{{$professionnel->competences->implode('intitule', ', ')}}">
                                </div>
                        </div>

                         <div class="pos-bloc-section">
                               <a href="{{route('professionnels.index')}}" class="btn btn-primary">Retour</a>
                               <button type="submit" class ="btn btn-primary float-end">Supprimer</button>
                         </div>
                         </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
