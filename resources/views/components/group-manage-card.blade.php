@props(['group'])

<x-card>
  <h3 class="text-2xl">
    {{$group->name}}
  </h3>
  
  <div class="text-lg mt-4">
    <i class="fa-solid fa-people-group"></i> Narių skaičius: {{$group->members_count}}
  </div>

  <div class="text-lg mt-4">
    <a href="/recipes/create/{{$group->id}}">
      <i class="fa-solid fa-plus"></i> Sukurti receptą
    </a>
  </div>

  <div class="text-lg mt-4">
    <a href="/groups/{{$group->id}}/edit">
      <i class="fa-solid fa-pencil"></i> Redaguoti grupę
    </a>
  </div>

  <div class="text-lg mt-4">
    <form method="POST" action="/groups/{{$group->id}}" id="deleteForm">
      @csrf
      @method('DELETE')
      <button class="text-red-500" onclick="confirmDelete(event)">
          <i class="fa-solid fa-trash"></i> Pašalinti grupę
      </button>
    </form>

    <script>
      function confirmDelete(event) {
          event.preventDefault();
          if (confirm('Ar tikrai norite pašalinti grupę?')) {
              document.getElementById('deleteForm').submit();
          }
      }
    </script>
  </div>
</x-card>