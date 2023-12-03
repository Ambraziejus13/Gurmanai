<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Sukurkite grupę</h2>
    </header>

    <form method="POST" action="/groups" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2">Grupės pavadinimas</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
          placeholder="Pvz: Smaližiai" value="{{old('name')}}" />

        @error('name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="user_id" class="inline-block text-lg mb-2">Receptų redaktorius</label>
        <select class="form-select border border-gray-200 rounded p-2 w-full" name="user_id" id="user_id">
          <option selected disabled> ----- </option>
          @foreach ($users as $user)
              <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                  {{ $user->name }} ({{ $user->email }})
              </option>
          @endforeach
        </select>

        @error('user_id')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="text-white rounded py-2 px-4 bg-amber-400 hover:bg-amber-500">
          Sukurti grupę
        </button>

        <a href="/admin/dashboard" class="text-black ml-4"> Atgal </a>
      </div>
    </form>
  </x-card>
</x-layout>
