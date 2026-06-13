@extends('layouts.almenara')

@section('title', 'Contato - Almenara Sustentável')

@section('content')

  <div class="card-custom text-center mb-4">
    <h2 class="fw-bold text-success">Fale Conosco</h2>
    <p class="text-muted">Tem dúvidas ou sugestões? Entre em contato com nossa equipe.</p>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="row">
    <div class="col-md-5">
      <div class="card-custom h-100">
        <h5 class="fw-bold text-success mb-3">Informações</h5>
        <p><strong>Email:</strong><br> contato@almenara.com</p>
        <p><strong>Telefone:</strong><br> (33) 99999-9999</p>
        <p><strong>Endereço:</strong><br> Prefeitura de Almenara - Centro - MG</p>
      </div>
    </div>

    <div class="col-md-7">
      <div class="card-custom">
        <h5 class="fw-bold text-success mb-3">Enviar Mensagem</h5>

        <form action="{{ route('contato.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}" placeholder="Seu nome" required>
            @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Seu email" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Mensagem</label>
            <textarea name="mensagem" class="form-control @error('mensagem') is-invalid @enderror" rows="4" placeholder="Digite sua mensagem" required>{{ old('mensagem') }}</textarea>
            @error('mensagem') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <button type="submit" class="btn btn-success w-100">Enviar Mensagem</button>
        </form>
      </div>
    </div>
  </div>

@endsection
