<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Metier,
};

use App\Http\Requests\MetierRequest;

class MetierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//       

            $metiers = Metier::get();
            
            $data = [
                'titel' => 'les Metiers de ' . config('app.name'),
                'description' => 'Retrouver toute les Metiers de ' . config('app.name'),
                'metiers' => $metiers,
            ];
            
            return view ('metiers.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // echo 'création d\'une compétence';
        return view ('metiers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MetierRequest $metierRequest)
    {
        
    //      $valadateDtata = $metierRequest->validated();
      
    //   Metier::create($valadateDtata);
    
        $metier = new Metier;
        $metier->libelle = $metierRequest->libelle;
        $metier->description = $metierRequest->description;
        $metier->slug = $metierRequest->slug;
        $metier->save();
        $succes = 'Enregistrement effectué avec succès';
        return redirect()->route('metiers.index')->withInformation($succes);

    }

    /**
     * Display the specified resource.
     */
    public function show(Metier $metier)
    {
        // echo 'je consulte';
        $data = [
            'titel' => 'les metier de ' . config('app.name'),
            'description' => 'Retrouver toute les metier de ' . config('app.name'),
            'metier' => $metier,
        ];

        return view ('metiers.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Metier $metier)
    {
        // echo 'je modifie';

        $data = [
            'titel' => 'les metier de ' . config('app.name'),
            'description' => 'Retrouver toute les metiers de ' . config('app.name'),
            'metier' => $metier,
        ];

        return view ('metiers.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MetierRequest $metierRequest, Metier $metier)
    {
         
        $valadateDtata = $metierRequest->all();
        $metier->update($valadateDtata);
        $succes = 'modification effectué avec succès';
        return redirect()->route('metiers.index')->withInformation($succes);

        // //autre alternative 
       
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Metier $metier)
    {
        // echo 'je suprime';
        $metier->delete();
        return back()->withInformation('Suppression faite !');
    }
}
