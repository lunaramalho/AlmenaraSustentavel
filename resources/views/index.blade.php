@extends('layouts.almenara')

@section('title', 'Início - Almenara Sustentável')

@section('content')

  <h2 class="fw-bold text-success">Bem-vindo ao Almenara Sustentável!</h2>

  <p class="text-muted">
    Veja como você pode contribuir para a coleta seletiva em nossa cidade.
  </p>

  <div class="row mt-4 align-items-center">

    <!-- IMAGEM -->
    <div class="col-md-5 text-center">
      <img src="{{ asset('imagens/lixoReciclavel.png') }}" class="img-lixo" alt="Lixo reciclável">
    </div>

    <!-- CARDS -->
    <div class="col-md-7">

      <div class="card-custom">
        <h5 class="fw-bold text-success">♻️ O que é coleta seletiva?</h5>
        <p class="text-muted">
          É o processo de separação e recolhimento de resíduos sólidos como papel, plástico,
          metal e vidro, permitindo a reciclagem e preservação do meio ambiente.
        </p>
      </div>

      <div class="card-custom">
        <h5 class="fw-bold text-success">💡 Dicas de separação</h5>
        <p class="text-muted">
          Separe lixo orgânico do reciclável, lave embalagens e organize por tipo.
          Isso ajuda na reciclagem e evita problemas sanitários.
        </p>
      </div>

    </div>

  </div>

  <!-- BOTÃO -->
  <div class="text-center mt-5">
    <a href="{{ route('pontos') }}" class="btn-custom text-decoration-none shadow">
      Acessar Pontos de Coleta
    </a>
  </div>

@endsection
