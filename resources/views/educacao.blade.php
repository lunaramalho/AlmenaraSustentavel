@extends('layouts.almenara')

@section('title', 'Educação Ambiental - Almenara Sustentável')

@section('content')

  <!-- HERO -->
  <div class="card-custom mb-4 text-center">
    <h2 class="fw-bold text-success">🌱 Educação Ambiental</h2>
    <p class="text-muted">
      Pequenas atitudes fazem uma grande diferença. Aprenda como contribuir para um futuro mais sustentável.
    </p>
  </div>

  <!-- SEÇÃO 1 -->
  <div class="row">
    <div class="col-md-6">
      <div class="card-custom h-100">
        <h5 class="fw-bold text-success">Para que serve a coleta seletiva?</h5>
        <p class="text-muted">
          A coleta seletiva permite separar os resíduos corretamente, facilitando a reciclagem
          e reduzindo o impacto ambiental. Isso ajuda a preservar recursos naturais e diminuir a poluição.
        </p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card-custom h-100">
        <h5 class="fw-bold text-success">Por que ela é importante?</h5>
        <p class="text-muted">
          Reduz a quantidade de lixo nos aterros, evita contaminação do solo e da água,
          além de contribuir para um planeta mais limpo e saudável.
        </p>
      </div>
    </div>
  </div>

  <!-- SEÇÃO 2 -->
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="card-custom h-100">
        <h5 class="fw-bold text-success">O que pode ser reciclado?</h5>
        <ul class="text-muted">
          <li>Papel e papelão</li>
          <li>Plástico</li>
          <li>Vidro</li>
          <li>Metal</li>
        </ul>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card-custom h-100">
        <h5 class="fw-bold text-success">O que não pode ser reciclado?</h5>
        <ul class="text-muted">
          <li>Papel higiênico</li>
          <li>Restos de comida</li>
          <li>Fraldas descartáveis</li>
          <li>Materiais contaminados</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- DESTAQUE -->
  <div class="card-custom mt-4 text-center">
    <h5 class="fw-bold text-success">💡 Dica importante</h5>
    <p class="text-muted">
      Sempre lave embalagens antes de descartar e separe os materiais corretamente.
      Isso facilita o processo de reciclagem e evita odores desagradáveis.
    </p>
  </div>

  <!-- FAQ -->
  <div class="card-custom mt-4">
    <h5 class="fw-bold text-success mb-3">Dúvidas Frequentes</h5>

    <div class="mb-3">
      <strong>Preciso lavar as embalagens?</strong>
      <p class="text-muted">Sim, isso evita mau cheiro e melhora o processo de reciclagem.</p>
    </div>

    <div class="mb-3">
      <strong>Posso misturar recicláveis?</strong>
      <p class="text-muted">O ideal é separar por tipo para facilitar o trabalho da coleta.</p>
    </div>

    <div class="mb-3">
      <strong>Vidro quebrado pode ser reciclado?</strong>
      <p class="text-muted">Sim, mas deve ser bem embalado para evitar acidentes.</p>
    </div>
  </div>

@endsection
