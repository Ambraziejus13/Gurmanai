<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Atnaujinkite recepto laidos įrašą</h2>
    </header>

    <form method="POST" action="/recipes/{{$recipe->id}}/recordings/{{$recording->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2">Laidos pavadinimas</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
          placeholder="Pvz: Gustavo enciklopedija" value="{{$recording->title}}" />

        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="host_name" class="inline-block text-lg mb-2">Laidos vedėjas</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="host_name" 
        placeholder="Pvz: Gustavas" value="{{$recording->host_name}}" />

        @error('host_name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="link" class="inline-block text-lg mb-2">
          Įrašo nuoroda
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="link" 
        placeholder="Pvz: www.lrt.lt/mediateka/irasas/..." value="{{$recording->link}}" />

        @error('link')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="text-white rounded py-2 px-4 bg-amber-400 hover:bg-amber-500">
          Atnaujinti įrašą
        </button>
        <a href="/recipes/{{$recipe->id}}" class="text-black ml-4"> Atgal į receptą</a>
      </div>
    </form>
  </x-card>
</x-layout>
