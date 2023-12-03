<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Atnaujinkite receptą</h2>
    </header>

    <form method="POST" action="/recipes/{{$recipe->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2">Patiekalo pavadinimas</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
          placeholder="Pvz: Sūrio pyragas" value="{{$recipe->title}}" />

        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="number_of_servings" class="inline-block text-lg mb-2">Porcijų skaičius</label>
        <input type="number" class="border border-gray-200 rounded p-2 w-full" name="number_of_servings" 
        placeholder=1 value="{{$recipe->number_of_servings}}" />

        @error('number_of_servings')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="preparation_time" class="inline-block text-lg mb-2">
          Paruošimo laikas
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="preparation_time" 
        placeholder="Pvz: Maždaug 1 valanda" value="{{$recipe->preparation_time}}" />

        @error('preparation_time')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="ingredients" class="inline-block text-lg mb-2">
          Ingredientai
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="ingredients" rows="3"
          placeholder="Pvz: 150g sausainių, 70g sviesto, 80g cukraus...">{{$recipe->ingredients}}</textarea>

        @error('ingredients')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="instructions" class="inline-block text-lg mb-2">
          Instrukcijos
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="instructions" rows="10"
          placeholder="Pvz: Pagrindui sausainius sutrupinkite ir sumaišykite su tirpintu sviestu...">{{$recipe->instructions}}</textarea>

        @error('instructions')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="text-white rounded py-2 px-4 bg-amber-400 hover:bg-amber-500">
          Atnaujinti receptą
        </button>

        <a href="/recipes/{{$recipe->id}}" class="text-black ml-4"> Atgal į receptą </a>
      </div>
    </form>
  </x-card>
</x-layout>
