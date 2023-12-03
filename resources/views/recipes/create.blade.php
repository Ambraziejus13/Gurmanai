<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Sukurkite receptą</h2>
    </header>

    <form method="POST" action="/recipes/store/{{request('group')}}" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2">Patiekalo pavadinimas</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
          placeholder="Pvz: Sūrio pyragas" value="{{old('title')}}" />

        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="number_of_servings" class="inline-block text-lg mb-2">Porcijų skaičius</label>
        <input type="number" class="border border-gray-200 rounded p-2 w-full" name="number_of_servings" 
        placeholder=1 value="{{old('number_of_servings')}}" />

        @error('number_of_servings')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="preparation_time" class="inline-block text-lg mb-2">
          Paruošimo laikas
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="preparation_time" 
        placeholder="Pvz: Maždaug 1 valanda" value="{{old('preparation_time')}}" />

        @error('preparation_time')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="ingredients" class="inline-block text-lg mb-2">
          Ingredientai
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="ingredients" rows="3"
          placeholder="Pvz: 150g sausainių, 70g sviesto, 80g cukraus...">{{old('ingredients')}}</textarea>

        @error('ingredients')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="instructions" class="inline-block text-lg mb-2">
          Instrukcijos
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="instructions" rows="10"
          placeholder="Pvz: Pagrindui sausainius sutrupinkite ir sumaišykite su tirpintu sviestu...">{{old('instructions')}}</textarea>

        @error('instructions')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div> 

      {{-- <div x-data="{ 
        recordings: {{ old('recordings', '[]')}},
        addRecording(){
          this.recordings.push({
            title: '',
            host_name: '', 
            link: ''
          });
        },
        removeRecording(index){
          this.recordings.splice(index, 1);
        } 
      }">
        <template x-for="(recording, index) in recordings" :key="index">
            <div class="mb-6">
                <label for="recordings.title" class="inline-block text-lg mb-2">
                    Laidos pavadinimas
                </label>
                <input x-model="recording.title" type="text" class="border border-gray-200 rounded p-2 w-full" 
                value="{{ old("recordings.index.title", $recording['title'] ?? '') }}"/>
                @error("recordings.title.index")
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="recordings.host_name" class="inline-block text-lg mb-2">
                  Laidos vedėjas
                </label>
                <input x-model="recording.host_name" type="text" class="border border-gray-200 rounded p-2 w-full" 
                value="{{ old("recordings.index.host_name", $recording['host_name'] ?? '') }}"/>
                @error("recordings.host_name.index")
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="recordings.link" class="inline-block text-lg mb-2">
                  Įrašo nuoroda
                </label>
                <input x-model="recording.link" type="text" class="border border-gray-200 rounded p-2 w-full" 
                value="{{ old("recordings.index.link", $recording['link'] ?? '') }}"/>
                @error("recordings.link.{index}")
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <button @click.prevent="removeRecording(index)" class="mt-4 text-red-500">Pašalinti įrašą</button>
            </div>
        </template>

        <button @click.prevent="addRecording()" class="mb-4 text-white rounded py-2 px-4 bg-amber-400 hover:bg-amber-500">
            Pridėti laidos įrašą
        </button>
      </div> --}}

      <div class="mb-6">
        <button type="submit" class="text-white rounded py-2 px-4 bg-amber-400 hover:bg-amber-500">
          Sukurti receptą
        </button>
        <a href="/groups/manage" class="text-black ml-4"> Atgal į grupių redagavimą </a>
      </div>
    </form>
  </x-card>
</x-layout>
