<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Professionnel,
    Metier,
};

use App\Http\Requests\ProfessionnelRequest;

class ProfessionnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug = null)
{
    $professionnels = $slug ?
        Metier::where('slug', $slug)->firstOrFail()->professionnels()->get() :
        Professionnel::all();

    $metiers = Metier::all();

    $data = [
        'title' => 'Les professionnels de la ' . config('app.name'),
        'description' => 'Liste des professionnels de la ' . config('app.name'),
        'professionnels' => $professionnels,
        'metiers' => $metiers,
        'slug' => $slug,
    ];

    return view('professionnels.index', $data);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Récupération de tous les métiers pour les passer à la vue
        $metiers = Metier::all();
    
        // Passage des métiers à la vue
        return view('professionnels.create', compact('metiers'));
    }
    


    /**
     * Store a newly created resource in storage.
     */
        public function store(ProfessionnelRequest $professionnelRequest)
    {
        Professionnel::create($professionnelRequest->all());
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
    $data = [
        'professionnel' => $professionnel,
        'metiers' => $metiers,
    ];
    return view('professionnels.edit', $data); // Utilisez $data directement sans compact
}


    /**
     * Update the specified resource in storage.
     */
    public function update(ProfessionnelRequest $professionnelRequest, Professionnel $professionnel)
    {
        $valadateDtata = $professionnelRequest->all();
        $professionnel->update($valadateDtata);
        $succes = 'modification effectué avec succès';
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
