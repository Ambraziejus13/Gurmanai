<x-layout>
  @include('partials._searchandfilter', ['groups' => $groups, 'hosts' => $hosts])
  {{-- @include('partials._grouping') --}}

  <div class="grid grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4">

    @unless(count($recipes) == 0)

    @foreach($recipes as $recipe)
      <x-recipe-card :recipe="$recipe" />
    @endforeach

    @else
    <div class="row w-full text-center text-2xl col-span-3">
      <p>Receptų nerasta</p>
    </div>
    @endunless

  </div>
</x-layout>
