<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Recipe;
use App\Models\Recording;
use Illuminate\Http\Request;

class RecordingController extends Controller
{
    // Show Create Form
    public function create(Recipe $recipe) {
        return view('recordings.create', ['recipe' => $recipe]);
    }

    // Store Recording Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'host_name' => 'required',
            'link' => ['required', 'url'],
        ], [
            'title.required' => 'Privalote įvesti laidos pavadinimą',
            'host_name.required' => 'Privalote įvesti laidos vėdėjo vardą ir pavardę',
            'link.url' => 'Netinkamas nuorodos formatas',
            'link.required' => 'Privalote įvesti įrašo nuorodą',
        ]);
    
        $recipe_id = $request->recipe;
        $formFields['recipe_id'] = $recipe_id;
    
        // Create the recording
        Recording::create($formFields);
    
        return redirect('/recipes/' . $recipe_id)->with('message', 'Įrašas sėkmingai sukurtas!');
    }

    // Show Edit Form
    public function edit(Recipe $recipe, Recording $recording) {
        return view('recordings.edit', ['recipe' => $recipe, 'recording' => $recording]);
    }

    // Update Listing Data
    public function update(Request $request, Recipe $recipe, Recording $recording) {        
        $formFields = $request->validate([
            'title' => 'required',
            'host_name' => 'required',
            'link' => ['required', 'url'],
        ], [
            'title.required' => 'Privalote įvesti laidos pavadinimą',
            'host_name.required' => 'Privalote įvesti laidos vėdėjo vardą ir pavardę',
            'link.url' => 'Netinkamas nuorodos formatas',
            'link.required' => 'Privalote įvesti įrašo nuorodą',
        ]);

        $recording->update($formFields);

        return redirect('/recipes/' . $recipe->id)->with('message', 'Įrašas sėkmingai atnaujintas!');
    }

    // Delete Listing
    public function destroy(Recipe $recipe, Recording $recording) {
        $recording->delete();

        return redirect('/recipes/' . $recipe->id)->with('message', 'Įrašas sėkmingai pašalintas!');
    }
}
