<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Competence,
};

use App\Http\Requests\CompetenceRequest;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        echo "J'arrive sur la liste des compétences";
//        $competences = Competence::all();
//        $competences = Competence::all('intitule'); //SELECT intitule FROM competences
//        $competences = Competence::orderBy('id','desc')->get(); //SELECT intitule FROM competences
//        $competences = Competence::where('intitule','LIKE','Java')->get();
//        $competences = Competence::where('intitule','LIKE','%SQL%')->get();
//        
//                  
        // $competences = Competence::orderByDesc('id')->limit(5)->get();
//        $competences = Competence::orderByDesc('id')->offset(5)->get();
//        $competences = Competence::orderByDesc('id')->limit(5)->get();

//         $competences = Competence::where('intitule', 'LIKE', '%sql')->count();

//         $competences = Competence::find(5);
           

        //     foreach($competences as $competence){
        //         echo $competence->intitule . '<br>';
        //     }

        // //Dump & Die
        // dd($competences);

            $competences = Competence::get();
            
            $data = [
                'titel' => 'les competences de ' . config('app.name'),
                'description' => 'Retrouver toute les competences de ' . config('app.name'),
                'competences' => $competences,
            ];
            
            return view ('competences.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // echo 'création d\'une compétence';
        return view ('competences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompetenceRequest $competenceRequest)
    {
        // recuperer les donnée valider dans un tableau 
        //  $valadateDtata = $competenceRequest->validated();
       // $valadateDtata = $competenceRequest->all();
      //  dd($valadateDtata);
        // Competence::create($valadateDtata);
        // return redirect()->route('competences.index')->with('information', 'Enregistrement effectué avec succès');
        $competence = new Competence;
        $competence->intitule = $competenceRequest->intitule;
        $competence->description = $competenceRequest->description;
        $competence->save();
        $succes = 'Enregistrement effectué avec succès';
        return redirect()->route('competences.index')->withInformation($succes);

    }

    /**
     * Display the specified resource.
     */
    public function show(Competence $competence)
    {
        // echo 'je consulte';
        $data = [
            'titel' => 'les competences de ' . config('app.name'),
            'description' => 'Retrouver toute les competences de ' . config('app.name'),
            'competence' => $competence,
        ];

        return view ('competences.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competence $competence)
    {
        // echo 'je modifie';

        $data = [
            'titel' => 'les competences de ' . config('app.name'),
            'description' => 'Retrouver toute les competences de ' . config('app.name'),
            'competence' => $competence,
        ];

        return view ('competences.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompetenceRequest $competenceRequest, Competence $competence)
    {
         
        $valadateDtata = $competenceRequest->all();
        $competence->update($valadateDtata);
        $succes = 'modification effectué avec succès';
        return redirect()->route('competences.index')->withInformation($succes);

        // //autre alternative 
       
        // $competence->intitule = $competenceRequest->intitule;
        // $competence->description = $competenceRequest->description;
        // $competence->save();
        // $succes = 'modification effectué avec succès';
        // return redirect()->route('competences.index')->withInformation($succes);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competence $competence)
    {
        // echo 'je suprime';
        $competence->delete();
        return back()->withInformation('Suppression faite !');
    }
}
