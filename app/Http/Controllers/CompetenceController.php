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
        $valadateDtata = $competenceRequest->validated();
        dd($valadateDtata);
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
    public function edit(string $id)
    {
        echo 'je modifie';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        echo 'je suprime';
    }
}
