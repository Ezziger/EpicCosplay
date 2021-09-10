<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Cosplay;

class CosplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cosplays = Cosplay::join('categories', 'cosplays.categorie_id', "=", 'categories.id')
                            ->join('users', 'cosplays.user_id', "=", 'users.id')
                            ->select('cosplays.id', 'cosplays.nom', 'cosplays.personnage', 'cosplays.origine', 'cosplays.image', 'categories.nom as n', 'users.name')
                            ->get();
        return view('cosplays.index',compact('cosplays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('cosplays.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $imageName = "";
        if($req->image) {
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('images'), $imageName);

        $newCosplay = new Cosplay;
        $newCosplay->nom = $req->nom;
        $newCosplay->personnage = $req->personnage;
        $newCosplay->origine = $req->origine;
        $newCosplay->categorie_id = $req->categorie_id;
        $newCosplay->user_id = auth()->user()->id;
        $newCosplay->image = '/images/' . $imageName;
        $newCosplay->save();
        return back()->with('success', 'Votre image a été sauvegardée avec succès !' );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categorie::all();
        $cosplay = Cosplay::findOrFail($id);
        return view('cosplays.edit', compact('cosplay', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $updateFicheCosplay = $req->validate([
            'nom' => 'required',
            'personnage' => 'required',
            'origine' => 'required',
            'categorie_id' => 'required',
            'image' => 'nullable'
        ]);

        $updateFicheCosplay = $req->except('_token', '_method');

        if($req->image) {
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('images'), $imageName);
            $updateFicheCosplay['image'] = "/images/" . $imageName;
        }

        Cosplay::whereId($id)->update($updateFicheCosplay);
        return redirect()->route('cosplays.index')
                             ->with('success', 'Votre cosplay a été mise à jour !');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cosplay = Cosplay::findOrFail($id);
        $cosplay->delete();
        return redirect()->route('cosplays.index')
                         ->with('success', 'Votre cosplay a bien été supprimé !');
    }
}
