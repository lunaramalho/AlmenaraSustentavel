@php
  // Decide qual aba abrir: usa a aba pedida, mas se houver erro de cadastro força "cadastro"
  $abaAtiva = $aba ?? 'login';
  if ($errors->has('name') || old('telefone') !== null || old('endereco') !== null || old('bairro') !== null) {
      $abaAtiva = 'cadastro';
  }
@endphp

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card-custom">

      <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
          <button type="button" class="nav-link {{ $abaAtiva === 'login' ? 'active' : '' }}" id="tabLogin" onclick="mostrarLogin()">Login</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link {{ $abaAtiva === 'cadastro' ? 'active' : '' }}" id="tabCadastro" onclick="mostrarCadastro()">Cadastro</button>
        </li>
      </ul>

      <!-- LOGIN -->
      <div id="login" style="{{ $abaAtiva === 'login' ? '' : 'display:none;' }}">
        <h4 class="mb-3 fw-bold text-success">Entrar no sistema</h4>

        @if(session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Lembrar de mim</label>
          </div>
          <button type="submit" class="btn btn-custom w-100">Entrar</button>
        </form>
        <p class="mt-3 text-center">Não tem conta? <a href="#" onclick="mostrarCadastro(); return false;">Cadastre-se</a></p>
      </div>

      <!-- CADASTRO -->
      <div id="cadastro" style="{{ $abaAtiva === 'cadastro' ? '' : 'display:none;' }}">
        <h4 class="mb-3 fw-bold text-success">Criar conta</h4>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            <small class="text-muted">Mínimo de 8 caracteres.</small>
          </div>
          <div class="mb-3">
            <label class="form-label">Confirmar senha</label>
            <input type="password" name="password_confirmation" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control" value="{{ old('endereco') }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Bairro</label>
            <input type="text" name="bairro" class="form-control" value="{{ old('bairro') }}">
          </div>
          <button type="submit" class="btn btn-custom w-100">Cadastrar</button>
        </form>
        <p class="mt-3 text-center">Já tem conta? <a href="#" onclick="mostrarLogin(); return false;">Fazer login</a></p>
      </div>

    </div>
  </div>
</div>

<script>
function mostrarCadastro() {
  document.getElementById("login").style.display = "none";
  document.getElementById("cadastro").style.display = "block";
  document.getElementById("tabCadastro").classList.add("active");
  document.getElementById("tabLogin").classList.remove("active");
}
function mostrarLogin() {
  document.getElementById("login").style.display = "block";
  document.getElementById("cadastro").style.display = "none";
  document.getElementById("tabLogin").classList.add("active");
  document.getElementById("tabCadastro").classList.remove("active");
}
</script>
