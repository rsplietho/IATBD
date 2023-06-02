<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        if($request->Categorie == 'null') {
            $request->Categorie = null;
        }
        return view('/search', ['query' => $request->Query, 'filterCategory' => $request->Categorie]);
    }
}
