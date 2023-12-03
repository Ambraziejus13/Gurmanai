@props(['recipe', 'recording'])

<x-card class="mt-4 p-2 flex space-x-6">
  <a href="/recipes/{{$recipe->id}}/recordings/{{$recording->id}}/edit">
    <i class="fa-solid fa-pencil"></i> Redaguoti
  </a>

  <form method="POST" action="/recipes/{{$recipe->id}}/recordings/{{$recording->id}}">
    @csrf
    @method('DELETE')
    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Pašalinti</button>
  </form>
  </x-card>