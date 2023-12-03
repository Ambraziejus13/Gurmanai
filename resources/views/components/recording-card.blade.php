@props(['recipe', 'recording'])

<x-card class="mb-5">
  <h3 class="text-2xl font-bold mb-4">Laidos pavadinimas</h3>
  <div class="text-lg mt-4">
    {{$recording->title}}
  </div>
  <h3 class="text-2xl font-bold m-4">Laidos vedėjas</h3>
  <div class="text-lg mt-4">
    {{$recording->host_name}}
  </div>
  <h3 class="text-2xl font-bold m-4">Nuoroda į laidos įrašą</h3>
  <div class="text-lg mt-4">
    <a href={{$recording->link}}>{{$recording->link}}</a>
  </div>

  @if($recipe->user_id == auth()->id())
    <x-recording-edit-card :recipe="$recipe" :recording="$recording"/>
  @endif
</x-card>