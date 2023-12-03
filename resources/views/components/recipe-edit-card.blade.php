@props(['recipe'])

<x-card class="mt-4 p-2 flex space-x-6">
  <a href="/recipes/{{$recipe->id}}/recordings/create">
    <i class="fa-solid fa-plus"></i> Pridėti įrašą
  </a>

  <a href="/recipes/{{$recipe->id}}/edit">
    <i class="fa-solid fa-pencil"></i> Redaguoti
  </a>

  <form method="POST" action="/recipes/{{$recipe->id}}">
    @csrf
    @method('DELETE')
    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Pašalinti</button>
  </form>
  </x-card>