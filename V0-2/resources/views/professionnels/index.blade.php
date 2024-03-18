
<!-- Directive Blade spécifiant l'héritage -->
@extends('cvtheque')

<!-- Directive Blade spécifiant l'injection du contenu de la section vers une liaison yield -->
@section('contenu')
        <div class="bs-docs-section pos-bloc-section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
            <h4 id="tables">Liste des Professionnels</h4>
            <select onchange="location.href=this.value">
                <!-- Option par défaut -->
                <option value="{{route('professionnels.index')}}" @unless($slug) selected="selected" @endunless>
                    Tous les métiers
                </option>
                @foreach($metiers as $metier)
                <!-- Utilisation de <option> pour chaque métier -->
                <option value="{{route('professionnels.metier', ['slug'=>$metier->slug])}}" {{$slug == $metier->slug ? 'selected' : ''}}>
                    {{$metier->libelle}}
                </option>
                @endforeach
            </select>
            <!-- Nouveau filtre pour les compétences -->
            <select onchange="location.href=this.value">
                <!-- Option par défaut -->
                <option value="{{route('professionnels.index')}}" @unless($competenceSlug) selected="selected" @endunless>
                    Toutes les compétences
                </option>
                @foreach($competences as $competence)
                <!-- Utilisation de <option> pour chaque compétence -->
                <option value="{{route('professionnels.competence', ['slug'=>$competence->slug])}}" {{$competenceSlug == $competence->slug ? 'selected' : ''}}>
                    {{$competence->libelle}}
                </option>
                @endforeach
            </select>
        </div>
            <a href="{{ route('professionnels.create') }}" class="btn btn-primary float-end">Créer un professionnel</a>
        </div>
    </div>
</div>

@if(session('information'))
<div class="bs-docs-section pos-bloc-section">
    <div class="alert alert-dismissible alert-success">
        <h4 class="alert-heading">Information : </h4>
        <p class="mb-0">{{ session('information') }}</p>
    </div>
</div>
@endif

<div class="bs-docs-section">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h4 id="tables">Liste des Professionnels</h4>
            </div>
            <div class="bs-component">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom Prénom</th>
                            <th scope="col">Métier</th>
                            <th scope="col">CP Ville</th>
                            <th scope="col">Formation Oui/Non</th>
                            <th scope="col" colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($professionnels as $professionnel)
                        <tr>
                            <th scope="row">{{ $professionnel->id }}</th>
                            <td><strong>{{ $professionnel->nom }} {{ $professionnel->prenom }}</strong></td>
                            <td><strong>{{ $professionnel->metier->libelle }}</strong></td>
                            <td><strong>{{ $professionnel->cp }} {{ $professionnel->ville }}</strong></td>
                            <td>
                                @if($professionnel->formation == 1)
                                <strong>oui</strong>
                                @else
                                <strong>non</strong>
                                @endif
                            </td>
                            <!-- Les boutons d'action ici -->
                            <td>
                            <form method="post" action="{{route('professionnels.show', $professionnel->id)}}">
                                                @csrf
                                                @method('GET')
                                            <button type="submit" class="btn btn-primary" > Consulter </button>

                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('professionnels.edit', $professionnel->id)}}">
                                                @csrf
                                                @method('GET')
                                            <button type="submit" class="btn btn-primary" > Modifier </button>

                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('professionnels.sup', $professionnel->id)}}">
                                                @csrf
                                                @method('GET')
                                            <button type="submit" class="btn btn-primary" > Supprimer </button>

                                        </form>
                                    </td>
                            <!-- Votre code pour les boutons ici -->
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">Aucun professionnel trouvé.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <footer>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ ($professionnels->currentPage() == 1) ? ' disabled' : '' }}">
                                    <a class="page-link" href="{{ $professionnels->previousPageUrl() }}">Précédent</a>
                                </li>
                                @for ($i = 1; $i <= $professionnels->lastPage(); $i++)
                                    <li class="page-item {{ ($professionnels->currentPage() == $i) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $professionnels->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ ($professionnels->currentPage() == $professionnels->lastPage()) ? ' disabled' : '' }}">
                                    <a class="page-link" href="{{ $professionnels->nextPageUrl() }}">Suivant</a>
                                </li>
                            </ul>
                        </nav>
                    </footer>
            </div>
        </div>
    </div>
</div>
@endsection

