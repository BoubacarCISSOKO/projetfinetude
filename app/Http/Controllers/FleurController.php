<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fleur;

use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;
class FleurController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $fleurs = Fleur::orderBy('created_at', 'desc');
        $fleurs = $fleurs->paginate(15);
        return view('fleurs.index', compact('fleurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        return view('fleurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $fleur = new Fleur;
        $fleur->name = $request->name;
        $fleur->price = $request->price;
        $fleur->description = $request->description;
        
        if ($file = $request->file('photo')) {

            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/fleurs/';
            $image = time() . $file->getClientOriginalExtension();
            $optimizeImage->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $optimizeImage->save($optimizePath . $image, 90);

            $fleur->photo = $image;
        }

        $fleur->save(); 
        return redirect()->route('fleur.index')->with('info', 'La catégorie a bien été créée');

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
        //
        $fleur  = Fleur::findOrFail($id);
      
        return view('fleurs.editview', compact('fleur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $fleur = Fleur::find($id);
        $fleur->name = $request->name;
        $fleur->price = $request->price;
        $fleur->description = $request->description;
        
        if ($file = $request->file('photo')) {

            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/fleurs/';
            $image = time() . $file->getClientOriginalExtension();
            $optimizeImage->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $optimizeImage->save($optimizePath . $image, 90);

            $fleur->photo = $image;
        }

        $fleur->save(); 
        return redirect()->route('fleur.index')->with('info', 'L\'fleur a bien été modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $fleur =  Fleur::find($id);
        $fleur->delete();
        return redirect()->route('fleur.index')->with('info', 'L\'fleur a bien été supprimé');

    }

}
 
