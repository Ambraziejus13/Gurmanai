@props(['group'])

<x-card>
  <h3 class="text-2xl">
    {{$group->name}}
  </h3>
  
  <div class="text-lg mt-4">
    <i class="fa-solid fa-people-group"></i> Narių skaičius: {{$group->members_count}}
  </div>
  <div class="text-lg mt-4">
    <i class="fa-solid fa-feather"></i> Grupės redaktorius: {{$group->editor->name}}
  </div>

  <div class="text-lg mt-4">
    @auth
      @if ($group->members->pluck('user_id')->contains(auth()->id()))
        <form method='POST' action="/groups/{{$group->id}}/leave">
            @csrf
            <button type="submit"><i class="fa-solid fa-user-minus"></i> Palikti grupę</button>
        </form>
      @else
        <form method='POST' action="/groups/{{$group->id}}/join">
            @csrf
            <button type="submit"><i class="fa-solid fa-user-plus"></i> Prisijungti prie grupės</button>
        </form>
      @endif
    @else
      <a href="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Prisijunkite, kad prisijungtumėte prie grupės</a>
    @endauth
  </div>
</x-card>