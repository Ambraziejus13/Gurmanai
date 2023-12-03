<x-layout>
  <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Atgal
  </a>
  <div class="mx-8">
    <x-card class="p-10">
      <div class="flex flex-col items-center justify-center text-center">
        {{-- <img class="w-48 mr-6 mb-6"
          src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="" /> --}}

        <h3 class="text-3xl font-bold mb-2">
          {{$recipe->title}}
        </h3>

        <div class="border border-stone-400 w-full m-2"></div>

        <div class="flex space-x-4">
          <div class="text-lg mt-4">
            <i class="fa-solid fa-bowl-food"></i> Porcijų skaičius: {{$recipe->number_of_servings}}
          </div>
        
          <div class="text-lg mt-4">
            <i class="fa-solid fa-clock"></i> Paruošimo laikas: {{$recipe->preparation_time}}
          </div>
        
          <div class="text-lg mt-4">
            <i class="fa-solid fa-feather"></i> Autorius: {{$author->name}}
          </div>
        
          <div class="text-lg mt-4">
            <i class="fa-solid fa-people-group"></i> Grupė: {{$recipe->group->name}}
          </div>
        </div>
        

        <div>
          <h3 class="text-2xl font-bold m-4">Ingredientai</h3>
          <div class="text-lg space-y-6">
            {{$recipe->ingredients}}
          </div>
        </div>

        <div>
          <h3 class="text-2xl font-bold m-4">Instrukcijos</h3>
          <div class="text-lg space-y-6">
            {{$recipe->instructions}}
          </div>
        </div>

        @unless(count($recordings) == 0)
          <div>
            <h3 class="text-2xl font-bold m-4">Pasirodymai TV laidose</h3>
            @foreach($recordings as $recording)
              <x-recording-card :recipe="$recipe" :recording="$recording"/>
            @endforeach
          </div>
        @endunless

      </div>
    </x-card>

    @if($recipe->group->user_id == auth()->id())
      <x-recipe-edit-card :recipe="$recipe"/>
    @endif

  </div>
</x-layout>