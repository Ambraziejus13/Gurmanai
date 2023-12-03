<x-layout>
    <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4">

    @unless(count($groups) == 0)

    @foreach($groups as $group)
        <x-group-manage-card :group="$group" />
    @endforeach

    @else
    <p>Grupių nerasta</p>
    @endunless

    </div>
</x-layout>