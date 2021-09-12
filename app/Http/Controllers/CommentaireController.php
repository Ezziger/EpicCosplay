<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $req) {
        $req->validate([
            'comment' => 'required',
        ]);

        $input = $req->all();
        $input['user_id'] = auth()->user()->id;

        Commentaire::create($input);
        return back();
    }
}
