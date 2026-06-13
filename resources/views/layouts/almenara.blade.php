<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Almenara Sustentável')</title>

  <!-- Fonte -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS custom -->
  <link rel="stylesheet" href="{{ asset('css/almenara.css') }}">
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
  <div class="logo"><span>Menu</span></div>
  <nav class="menu">
    <a href="{{ route('inicio') }}" class="{{ request()->routeIs('inicio') ? 'active' : '' }}">🏠 <span>Início</span></a>
    @auth
      <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">👤 <span>Meu Perfil</span></a>
    @else
      <a href="{{ route('login') }}" class="{{ request()->routeIs('login') || request()->routeIs('register') ? 'active' : '' }}">👤 <span>Entrar</span></a>
    @endauth
    <a href="{{ route('pontos') }}" class="{{ request()->routeIs('pontos') ? 'active' : '' }}">♻️ <span>Coleta</span></a>
    <a href="{{ route('educacao') }}" class="{{ request()->routeIs('educacao') ? 'active' : '' }}">📚 <span>Educação</span></a>
    <a href="{{ route('contato.index') }}" class="{{ request()->routeIs('contato.index') ? 'active' : '' }}">📞 <span>Contato</span></a>
  </nav>
</div>

<!-- HEADER -->
<div class="header">
  <div class="d-flex align-items-center gap-3">
    <button class="btn btn-success d-md-none" onclick="toggleMenu()">☰</button>
    <img src="{{ asset('imagens/bandeiraAlmenara.png') }}" width="45" alt="Bandeira de Almenara">
    <h2 class="mb-0 titulo-app">Almenara Sustentável</h2>
  </div>

  <div class="d-flex align-items-center gap-3">
    <img src="{{ asset('imagens/simboloReciclagem.png') }}" width="40" alt="Símbolo de Reciclagem">
    @auth
      <form method="POST" action="{{ route('logout') }}" class="mb-0">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm">Sair</button>
      </form>
    @endauth
  </div>
</div>

<!-- CONTENT -->
<div class="content">
  @yield('content')
</div>

<!-- SCRIPT -->
<script>
function toggleMenu() {
  document.getElementById("sidebar").classList.toggle("active");
}
</script>
@yield('scripts')

</body>
</html>
