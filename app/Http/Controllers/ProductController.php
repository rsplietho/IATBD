<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;
use Auth;
use Storage;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function storeProduct(Request $request) {
        $request->validate([
            'Naam' => 'required',
            'Afbeelding' => 'required|mimes:png,jpg,jpeg|max:2048',
            'Categorie' => 'required',
        ]);

        $product = Product::create([
            'owner' => Auth::id(),
            'name' => $request->Naam,
            'description' => $request->Beschrijving,
            'image' => $request->file('Afbeelding')->store('images'),
            'category' => $request->Categorie,
        ]);
        
        return redirect('/product/'.$product->id)->with('success', 'Product aangemaakt!');
    }

    public function loanOut(Request $request) {
        if (!$this->isOwner($request->productid)){
            abort(403, 'Niet jouw product!');
        }
        $request->validate([
            'username' => 'required|exists:users,username',
        ]);

        $product = Product::find($request->productid);
        $product->loaned_to = $this->getUserID($request->username);
        $product->returnDate = Carbon::today()->addDays(30)->format('d-m-Y');
        $product->save();
        
        return redirect('/product/'.$product->id)->with('success', 'Product uitgeleend! Deadline: '.$product->returnDate);
    }

    public function takeBack(Request $request) {
        if (!$this->isOwner($request->productid) && !$this->canTakeBack($request->productid)){
            abort(403);
        }
        $request->validate([
            'productid' => 'required',
        ]);

        $product = Product::find($request->productid);
        $product->loaned_to = null;
        $product->returnDate = null;
        $product->save();
        
        return redirect('/product/'.$product->id)->with('success', 'Product teruggegeven!');
    }

    public function removeProduct(Request $request) {
        if (!$this->deletionAuth($request->productid)){
            abort(403);
        }
        $request->validate([
            'productid' => 'required',
        ]);

        $product = Product::find($request->productid);
        
        Storage::delete($product->image);

        $product->delete();
        
        return redirect('/')->with('success', 'Product verwijderd!');
    }

    private function getUserID($username) {
        return User::where('username', $username)->first()->id;   
    }

    public static function deletionAuth($pid) {
        if (!Auth::check()) {
            return false;
        } else if (Auth::user()->role == 1) {
            return true;
        } else if (Auth::user()->id == Product::where('id', $pid)->first()->owner) {
            return true;
        } else {
            return false;
        }
    }

    public static function isOwner($pid) {
        if (!Auth::check()) {
            return false;
        } else if (Auth::user()->id == Product::where('id', $pid)->first()->owner) {
            return true;
        } else {
            return false;
        }
    }

    public static function canTakeBack($pid) {
        if (!Auth::check()) {
            return false;
        } else if (Auth::user()->id == Product::where('id', $pid)->first()->owner | Auth::user()->id == Product::where('id', $pid)->first()->loaned_to) {
            return true;
        } else {
            return false;
        }
    }
}
