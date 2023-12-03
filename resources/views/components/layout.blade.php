<!DOCTYPE html>
<html lang="lt">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="images/favicon.ico"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Gurmanai.IS</title>
</head>

<body class="mb-48 h">
  <nav class="flex justify-between items-center mb-4 p-2">
    {{-- <a href="/"><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo" /></a> --}}
    <ul class="flex space-x-6 items-center">
      <li>
        <a href="/">
          <div class="p-6 text-xl font-bold text-white bg-amber-300 rounded-lg">Gurmanai.IS</div>
        </a>
      </li>
      <li><a href="/groups" class="text-lg font-bold">Grupės</a></li>
      <li><a href="/users" class="text-lg font-bold">Naudotojai</a></li>
    </ul>
    <ul class="flex space-x-6 mr-6 text-lg">
      @auth
      <li>
        <a href="/groups/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Redaguoti grupes</a>
      </li>
      <li>
        <form class="inline" method="POST" action="/logout">
          @csrf
          <button type="submit">
            <i class="fa-solid fa-door-closed"></i> Atsijungti
          </button>
        </form>
      </li>
      @else
      <li>
        <a href="/register" class="hover:text-amber-400"><i class="fa-solid fa-user-plus"></i> Registruotis</a>
      </li>
      <li>
        <a href="/login" class="hover:text-amber-400"><i class="fa-solid fa-arrow-right-to-bracket"></i> Prisijungti</a>
      </li>
      @endauth
    </ul>
  </nav>

  <main>
    {{$slot}}
  </main>
  <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-amber-400 text-white h-16 mt-24 opacity-80 md:justify-center">
    <p class="ml-2">Parengė IFF-1/4 studentas Lukas Vasiliauskas 2023</p>

    @auth
    @if(auth()->user()->type == 'administrator')
      <a href="/admin/dashboard" class="absolute top-1/4 right-10 bg-amber-400 text-white py-2 px-5">
        <i class="fa-solid fa-gear"></i>
      </a>
    @endif
    @endauth
  </footer>

  <x-flash-message />
</body>

</html>