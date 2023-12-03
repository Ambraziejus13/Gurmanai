@props(['recipe'])

<x-card>
  <h3 class="text-2xl">
    <a href="/recipes/{{$recipe->id}}">{{$recipe->title}}</a>
  </h3>
  
  <div class="text-lg mt-4">
    <i class="fa-solid fa-bowl-food"></i> Porcijų skaičius: {{$recipe->number_of_servings}}
  </div>

  <div class="text-lg mt-4">
    <i class="fa-solid fa-clock"></i> Paruošimo laikas: {{$recipe->preparation_time}}
  </div>

  <div class="text-lg mt-4">
    <i class="fa-solid fa-people-group"></i> Grupė: {{$recipe->group->name}}
  </div>
</x-card>