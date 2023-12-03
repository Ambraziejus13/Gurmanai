<form action="/">
  <div class="flex items-center border-2 border-stone-200 m-4 p-4 rounded-lg">
      <p class="mr-2">Grupuoti receptus pagal </p>
      <select name="group" class="mr-2" required>
          <option selected disabled> ----- </option>
          <option value="group">Grupę</option>
          <option value="host_name">Laidos vedėją</option>
      </select>
      <button type="submit" class="h-10 w-20 text-white rounded-lg bg-amber-400 hover:bg-amber-500">
          Grupuoti
      </button>
  </div>
</form>
