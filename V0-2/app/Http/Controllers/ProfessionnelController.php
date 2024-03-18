<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Professionnel,
    Metier,
    Competence,
};

use App\Http\Requests\ProfessionnelRequest;

class ProfessionnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
           public function index(Request $request, $slug = null, $competenceSlug = null)
{
    $search = $request->get('search');
    $competences = Competence::all();

    $professionnels = Professionnel::when($slug, function ($query, $slug) {
        return $query->whereHas('metier', function ($query) use ($slug) {
            $query->where('slug', $slug);
        });
    })->when($competenceSlug, function ($query, $competenceSlug) {
        return $query->whereHas('competences', function ($query) use ($competenceSlug) {
            $query->where('slug', $competenceSlug);
        });
    })->where(function($query) use ($search) {
        $query->where('nom', 'like', '%' . $search . '%')
            ->orWhere('prenom', 'like', '%' . $search . '%');
    })->paginate(6);

    $metiers = Metier::all();

    $data = [
        'title' => 'Les professionnels de la ' . config('app.name'),
        'description' => 'Liste des professionnels de la ' . config('app.name'),
        'professionnels' => $professionnels,
        'metiers' => $metiers,
        'slug' => $slug,
        'competences' => $competences,
        'competenceSlug' => $competenceSlug,
    ];

    return view('professionnels.index', $data);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $competences = Competence::all(); // Récupère toutes les compétences
    $metiers = Metier::all(); // Récupère tous les métiers

    // dd($competences);
    return view('professionnels.create', compact('competences', 'metiers'));
}

    


public function store(ProfessionnelRequest $professionnelRequest)
{
    $data = $professionnelRequest->validated();

    // Assurez-vous que 'metier_id' est bien sélectionné.
    if (empty($data['metier_id']) || $data['metier_id'] === '0') {
        return back()->with('error', 'Veuillez sélectionner un métier spécifique.');
    }

    // Convertissez le domaine en chaîne, si présent.
    if (isset($data['domaine'])) {
        $data['domaine'] = implode(',', $data['domaine']);
    }

    // Retirez les compétences du tableau $data pour éviter des erreurs lors de la création.
    $competences = $data['competences_id'];
    unset($data['competences_id']);

    // Créez le professionnel sans les compétences.
    $professionnel = Professionnel::create($data);

    // Attachez les compétences au professionnel créé.
    // Assurez-vous que les IDs des compétences sont valides et existent dans la requête.
    if (!empty($competences)) {
        $professionnel->competences()->attach($competences);
    }

    $succes = 'Enregistrement effectué avec succès';

    return redirect()->route('professionnels.index')->with('information', $succes);
}

    

    /**
     * Display the specified resource.
     */
    public function show(Professionnel $professionnel)
    {
        $data = [
            'professionnel' => $professionnel,
        ];
        return view('professionnels.show', $data);
    //    $data = [
    //     'nom' => 'nom de ' . config('app.name'),
    //     'prenom' => 'prenom de ' . config('app.name'),
    //     'cp' => 'code postale de ' . config('app.name'),
    //     'ville' => 'ville de ' . config('app.name'),
    //     'telephone' => 'telephone de ' . config('app.name'),
    //     'email' => 'email de ' . config('app.name'),
    //     'naissance' => 'date de naissance de ' . config('app.name'),
    //     'formation' => 'formation de ' . config('app.name'),
    //     'domaine' => 'domaine de ' . config('app.name'),
    //     'source' => 'source de ' . config('app.name'),
    //     'observation' => 'observation de ' . config('app.name'),
    //     'metier_id' => 'metier de ' . config('app.name'),
    // ];

    // return view ('professionnels.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professionnel $professionnel)
{
    $metiers = Metier::all();
    $competences = Competence::all();
    $data = [
        'professionnel' => $professionnel,
        'metiers' => $metiers,
        'competences' => $competences,
    ];
    return view('professionnels.edit', $data); // Utilisez $data directement sans compact
}


    /**
     * Update the specified resource in storage.
     */
   /**
 * Update the specified resource in storage.
 */
        public function update(ProfessionnelRequest $professionnelRequest, Professionnel $professionnel)
        {
            $data = $professionnelRequest->validated();

            // Convertissez le domaine en chaîne, si présent.
            if (isset($data['domaine'])) {
                $data['domaine'] = implode(',', $data['domaine']);
            }

            // Séparez les compétences du reste des données pour éviter des erreurs lors de la mise à jour.
            $competences = [];
            if (isset($data['competences_id'])) {
                $competences = $data['competences_id'];
                unset($data['competences_id']); // Enlevez 'competences_id' pour ne pas essayer de le mettre à jour directement sur le modèle.
            }

            // Mettez à jour le professionnel avec les données restantes.
            $professionnel->update($data);

            // Mettez à jour les associations de compétences.
            if (!empty($competences)) {
                $professionnel->competences()->sync($competences);
            } else {
                // Si aucune compétence n'est sélectionnée, détachez toutes les compétences.
                $professionnel->competences()->detach();
            }

            $succes = 'Modification effectuée avec succès.';

            return redirect()->route('professionnels.index')->withInformation($succes);
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professionnel $professionnel)
    {
        $professionnel->delete();
        return redirect()->route('professionnels.index')->withInformation('Suppression faite !');
    }

    public function sup(Professionnel $professionnel)
    {
        $data = [
            'title' => 'Les métiers de ' . config('app.name'),
            'description' => 'Retrouvez tous les métiers de ' . config('app.name'),
            'professionnel' => $professionnel,
        ];
    
        return view('professionnels.sup', $data);
    }
    
}
