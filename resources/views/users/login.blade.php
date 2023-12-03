<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Prisijungmas</h2>
      <p class="mb-4">Prisijunkite prie savo paskyros</p>
    </header>

    <form method="POST" action="/users/authenticate">
      @csrf

      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">Elektroninis paštas</label>
        <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="password" class="inline-block text-lg mb-2">
          Slaptažodis
        </label>
        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
          value="{{old('password')}}" />

        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="text-white rounded py-2 px-4 bg-amber-400 hover:bg-amber-500">
          Prisijungti
        </button>
      </div>

      <div class="mt-8">
        <p>
          Neturite paskyros?
          <a href="/register" class="text-amber-400 hover:text-amber-500 hover:font-bold">Užsiregistruokite</a>
        </p>
      </div>
    </form>
  </x-card>
</x-layout>