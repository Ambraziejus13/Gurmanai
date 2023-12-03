<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Recipe;
use App\Models\Recording;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    // Show all recipes
    public function index() {
        return view('recipes.index', [
            'recipes' => Recipe::latest()->
                filter(request(['search', 'group', 'host']))->
                with('group')-> // Eager load the 'group' relationship
                with('recordings')-> // Eager load the 'recordings' relationship
                get(),
            'groups' => Group::pluck('name')->unique()->values()->all(),
            'hosts' => Recording::pluck('host_name')->unique()->values()->all()
        ]);
    }

    //Show single listing
    public function show(Recipe $recipe) {
        return view('recipes.show', [
            'recipe' => $recipe,
            'recordings' => $recipe->recordings()->get(),
            'author' => $recipe->user()->first(),
        ]);
    }

    // Show Create Form
    public function create() {
        return view('recipes.create');
    }

    // Store Recipe Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'number_of_servings' => ['required', 'integer'],
            'preparation_time' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required'
        ], [
            'title.required' => 'Privalote įvesti patiekalo pavadinimą',
            'number_of_servings.required' => 'Privalote įvesti porcijų skaičių',
            'number_of_servings.integer' => 'Porcijų skaičius turi būti sveikasis skaičius',
            'preparation_time.required' => 'Privalote įvesti paruošimo laiką',
            'ingredients.required' => 'Privalote įvesti ingredientus',
            'instructions.required' => 'Privalote įvesti paruošimo instrukcijas'
        ]);
    
        $formFields['user_id'] = auth()->id();
        $formFields['group_id'] = request('group');
    
        // Create the recipe
        Recipe::create($formFields);
    
        return redirect('/')->with('message', 'Receptas sėkmingai sukurtas!');
    }

    // Show Edit Form
    public function edit(Recipe $recipe) {
        return view('recipes.edit', ['recipe' => $recipe]);
    }

    // Update Listing Data
    public function update(Request $request, Recipe $recipe) {   
        $formFields = $request->validate([
            'title' => 'required',
            'number_of_servings' => ['required', 'integer'],
            'preparation_time' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
        ], [
            'title.required' => 'Privalote įvesti patiekalo pavadinimą',
            'number_of_servings.required' => 'Privalote įvesti porcijų skaičių',
            'number_of_servings.integer' => 'Porcijų skaičius turi būti sveikasis skaičius',
            'preparation_time.required' => 'Privalote įvesti paruošimo laiką',
            'ingredients.required' => 'Privalote įvesti ingredientus',
            'instructions.required' => 'Privalote įvesti paruošimo instrukcijas',
        ]);

        $recipe->update($formFields);

        return redirect('/recipes/'.$recipe->id)->with('message', 'Receptas sėkmingai atnaujintas!');
    }

    // Delete Listing
    public function destroy(Recipe $recipe) {
        $recipe->delete();

        return redirect('/')->with('message', 'Receptas sėkmingai pašalintas!');
    }
}
