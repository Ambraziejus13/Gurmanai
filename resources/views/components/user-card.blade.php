@props(['user'])

<x-card>
  <h3 class="text-2xl">
    {{$user->name}}
  </h3>
  
  <div class="text-lg mt-4">
    <i class="fa-solid fa-envelope"></i> Elektroninis paštas: {{$user->email}}
  </div>
  <div class="text-lg mt-4">
    <i class="fa-solid fa-user"></i> 
    @if($user->type == 'administrator')
      Administratorius
    @else
      Gurmanas
    @endif
  </div>
</x-card>