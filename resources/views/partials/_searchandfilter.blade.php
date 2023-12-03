<form action="/">
  <div class="flex space-x-2 relative p-2 border-2 border-stone-200 m-4 rounded-lg">
    <div class="flex items-center">
        <i class="fa fa-search text-stone-200"></i>
    </div>
    <input type="text" name="search" class="flex-1 h-12 rounded-lg z-0 focus:outline-none"
      placeholder="Receptų paieška..." value="{{ request('search') }}"/>
    
    <!-- Filtravimas pagal grupę -->
    <div class="h-12 relative space-x-2 p-2 text-stone-700 rounded-lg bg-white border-2 border-stone-200 relative">
      <select name="group" id="groupSelect" class="w-36 bg-white">
        <option value="" selected disabled>Pasirinkite grupę</option>
        @foreach ($groups as $group)
          <option value="{{ $group }}" {{ request('group') == $group ? 'selected' : '' }}>{{ $group }}</option>
        @endforeach
      </select>
      <button class="clear-btn font-bold text-amber-400 hover:text-amber-500" onclick="clearSelect('groupSelect'); event.preventDefault();">X</button>
    </div>

    <!-- Filtravimas pagal laidos vedėją (reikia kitaip vedėjus išgauti, kad būtų tik unique)-->
    <div class="h-12 relative space-x-2 p-2 text-stone-700 rounded-lg bg-white border-2 border-stone-200 relative">
      <select name="host" id="hostSelect" class="w-48 bg-white">
        <option value="" selected disabled>Pasirinkite laidos vedėją</option>
        @foreach ($hosts as $host)
          <option value="{{ $host }}" {{ request('host') == $host ? 'selected' : '' }}>{{ $host }}</option>
        @endforeach
      </select>
      <button class="clear-btn font-bold text-amber-400 hover:text-amber-500" onclick="clearSelect('hostSelect'); event.preventDefault();">X</button>
    </div>

    <div class="flex items-center">
        <button type="submit" class="h-12 w-20 text-white rounded-lg bg-amber-400 hover:bg-amber-500">
            Ieškoti
        </button>
    </div>
</div>

<script>
  function clearSelect(selectId) {
      var selectElement = document.getElementById(selectId);
      selectElement.selectedIndex = 0; // Set it to the first option with value=""
  }
</script>

</form>