@extends('layouts.almenara')

@section('title', 'Meu Perfil - Almenara Sustentável')

@section('content')

  <h2 class="fw-bold text-success mb-4">Painel do Usuário</h2>

  @if(session('success_deposito'))
    <div class="alert alert-success">{{ session('success_deposito') }}</div>
  @endif
  @if(session('status') === 'profile-updated')
    <div class="alert alert-success">Dados atualizados com sucesso!</div>
  @endif

  <div class="row align-items-start">

    <!-- DADOS DO USUÁRIO -->
    <div class="col-md-5 mb-4">
      <div class="card-custom border shadow-sm">
        <div class="text-center mb-3">
          <h4 class="fw-bold mt-2 mb-0">{{ $user->name }}</h4>
          <span class="badge bg-success-subtle text-success">Cidadão Consciente</span>
        </div>
        <hr class="text-muted">

        <div class="mb-3">
          <label class="text-muted small d-block">E-mail</label>
          <span class="fw-semibold">{{ $user->email }}</span>
        </div>
        <div class="mb-3">
          <label class="text-muted small d-block">Telefone</label>
          <span class="fw-semibold">{{ $user->telefone ?? 'Não informado' }}</span>
        </div>
        <div class="mb-3">
          <label class="text-muted small d-block">Endereço</label>
          <span class="fw-semibold">{{ $user->endereco ?? 'Não informado' }}</span>
        </div>
        <div class="mb-3">
          <label class="text-muted small d-block">Bairro</label>
          <span class="fw-semibold">{{ $user->bairro ?? 'Não informado' }}</span>
        </div>

        <button class="btn btn-success w-100 mt-2" type="button"
                onclick="document.getElementById('editarDados').classList.toggle('d-none')">
          Editar Dados
        </button>

        <div id="editarDados" class="d-none mt-3">
          <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')
            <div class="mb-2"><label class="form-label small">Nome</label><input name="name" class="form-control" value="{{ old('name', $user->name) }}" required></div>
            <div class="mb-2"><label class="form-label small">E-mail</label><input name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required></div>
            <div class="mb-2"><label class="form-label small">Telefone</label><input name="telefone" class="form-control" value="{{ old('telefone', $user->telefone) }}"></div>
            <div class="mb-2"><label class="form-label small">Endereço</label><input name="endereco" class="form-control" value="{{ old('endereco', $user->endereco) }}"></div>
            <div class="mb-2"><label class="form-label small">Bairro</label><input name="bairro" class="form-control" value="{{ old('bairro', $user->bairro) }}"></div>
            <button class="btn btn-custom btn-sm w-100 mt-2">Salvar alterações</button>
          </form>
        </div>
      </div>
    </div>

    <!-- DEPÓSITOS -->
    <div class="col-md-7">

      <div class="card-custom border shadow-sm mb-4">
        <h5 class="fw-bold text-success mb-3">➕ Registrar Novo Depósito</h5>

        @if($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('depositos.store') }}">
          @csrf
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="data" class="form-label small fw-semibold">Data do Depósito</label>
              <input type="date" class="form-control" id="data" name="data" value="{{ old('data') }}" required>
            </div>
            <div class="col-sm-6">
              <label for="material" class="form-label small fw-semibold">Tipo de Material</label>
              <select class="form-select" id="material" name="material" required>
                <option value="" selected disabled>Selecione...</option>
                <option value="Plástico">Plástico</option>
                <option value="Papel / Papelão">Papel / Papelão</option>
                <option value="Vidro">Vidro</option>
                <option value="Metal">Metal</option>
                <option value="Orgânico Compostável">Orgânico</option>
              </select>
            </div>
            <div class="col-12">
              <label for="bairro" class="form-label small fw-semibold">Bairro onde realizou o depósito</label>
              <input type="text" class="form-control" id="bairro" name="bairro" value="{{ old('bairro') }}" placeholder="Ex: Centro, São Pedro..." required>
            </div>
            <div class="col-12 text-end">
              <button type="submit" class="btn btn-success px-4">Salvar no Quadro</button>
            </div>
          </div>
        </form>
      </div>

      <div class="card-custom border shadow-sm">
        <h5 class="fw-bold text-success mb-3">📋 Quadro de Depósitos</h5>
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr><th>Data</th><th>Material</th><th>Bairro</th></tr>
            </thead>
            <tbody>
              @forelse($depositos as $dep)
                <tr>
                  <td>{{ $dep->data }}</td>
                  <td>{{ $dep->material }}</td>
                  <td>{{ $dep->bairro }}</td>
                </tr>
              @empty
                <tr><td colspan="3" class="text-center text-muted">Nenhum depósito registrado ainda.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

@endsection
