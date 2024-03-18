<!-- Directive Blade spécifiant l'héritage  -->
@extends('cvtheque')

 <!-- Directive Blade spécifiant l'injection du contenu de la section vers une liaison yield  -->
@section('contenu')

    
<div class="bs-docs-section pos-bloc-section">
    <div class="row">
        <div class="col-lg-12 ">
            <!-- Barre de recherche -->
            <form action="{{ route('competences.index') }}" method="GET" class="d-inline">
                @csrf
                <input type="text" name="search"/>
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
            <a href="{{route('competences.create')}}" class="btn btn-primary float-end">Créer une compétence</a>
        </div>
    </div>
</div>

   

     <!-- ICI LA GESTION DES MESSAGES D'INFORMATION   -->
    @if(session('information'))
        <div class="bs-docs-section pos-bloc-section">
            <div class="alert alert-dismissible alert-success">
                <h4 class="alert-heading">Information : </h4>
                <p class="mb-0">{{session('information')}}</p>
            </div>
        </div>
    @endif
     <!-- FIN GESTION INFO  -->

    <div class="bs-docs-section ">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h4 id="tables">Liste des compétences</h4>
                </div>

                <div class="bs-component">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Numéro</th>
                            <th scope="col">Intitulé</th>
                            <th scope="col" colspan="3"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- BOUCLE POUR RECUPERATION DES COMPTENCES  -->
                            @foreach($competences as $competence)
                                <tr>
                                    <th scope="row">{{$competence->id}}</th>
                                    <td><strong>{{$competence->intitule}}</strong></td>
                                    <td>
                                        <form method="post" action="{{route('competences.show', $competence->id)}}">
                                                @csrf
                                                @method('GET')
                                            <button type="submit" class="btn btn-primary" > Consulter </button>

                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('competences.edit', $competence->id)}}">
                                                @csrf
                                                @method('GET')
                                            <button type="submit" class="btn btn-primary" > Modifier </button>

                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('competences.sup', $competence->id)}}">
                                                @csrf
                                                @method('GET')
                                            <button type="submit" class="btn btn-primary" > Supprimer </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                         <!-- FIN BOUCLE  -->
                        </tbody>
                    </table>
                    <footer>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ ($competences->currentPage() == 1) ? ' disabled' : '' }}">
                                    <a class="page-link" href="{{ $competences->previousPageUrl() }}">Précédent</a>
                                </li>
                                @for ($i = 1; $i <= $competences->lastPage(); $i++)
                                    <li class="page-item {{ ($competences->currentPage() == $i) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $competences->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ ($competences->currentPage() == $competences->lastPage()) ? ' disabled' : '' }}">
                                    <a class="page-link" href="{{ $competences->nextPageUrl() }}">Suivant</a>
                                </li>
                            </ul>
                        </nav>
                    </footer>
                </div>
            </div>
        </div>
    </div>
@endsection


