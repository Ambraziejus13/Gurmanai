<x-layout>
  {{-- @if (!Auth::check())
    @include('partials._hero')
  @endif --}}

  <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4">

    @unless(count($users) == 0)

    @foreach($users as $user)
      <x-user-card :user="$user" />
    @endforeach

    @else
    <p>Naudotojų nerasta</p>
    @endunless

  </div>

  <div class="mt-6 p-4">
    {{$users->links()}}
  </div>
</x-layout>
