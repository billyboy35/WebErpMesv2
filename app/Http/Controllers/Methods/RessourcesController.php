<?php

namespace App\Http\Controllers\Methods;

use Illuminate\Http\Request;
use App\Models\Methods\MethodsRessources;
use App\Http\Requests\Methods\StoreRessourceRequest;
use App\Http\Requests\Methods\UpdateRessourceRequest;

class RessourcesController extends Controller
{
    
    /**
     * @param Request $request
     * @return View
     */
    public function store(StoreRessourceRequest $request)
    {
        $Ressource =  MethodsRessources::create($request->only('ordre','code', 'label','mask_time', 'capacity','section_id', 'color', 'service_id'));
        if($request->hasFile('picture')){
            $Ressource = MethodsRessources::findOrFail($Ressource->id);
            $file =  $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $request->picture->move(public_path('images/ressources'), $filename);
            $Ressource->update(['picture' => $filename]);
            $Ressource->save();
        }
        else{
            return back()->withInput()->withErrors(['msg' => 'Error, no image selected']);
        }
        return redirect()->route('methods')->with('success', 'Successfully created ressource.');
    }

        /**
     * @param $request
     * @return View
     */
    public function update(UpdateRessourceRequest $request)
    {
        
        $Ressource = MethodsRessources::find($request->id);
        $Ressource->ordre=$request->ordre;
        $Ressource->label=$request->label;
        $Ressource->mask_time=$request->mask_time;
        $Ressource->capacity=$request->capacity;
        $Ressource->section_id=$request->section_id;
        $Ressource->color=$request->color;
        $Ressource->service_id=$request->service_id;
        $Ressource->save();

    /* if($request->hasFile('picture')){
            $file =  $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $request->picture->move(public_path('images/methods'), $filename);
            $Ressource->update(['picture' => $filename]);
            $Ressource->save();
        }
        else{
            return back()->withInput()->withErrors(['msg' => 'Error, no image selected']);
        }*/
        return redirect()->route('methods')->with('success', 'Successfully updated ressource.');
    }
}
