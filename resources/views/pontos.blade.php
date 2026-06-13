@extends('layouts.almenara')

@section('title', 'Pontos de Coleta - Almenara Sustentável')

@section('content')

  <h2 class="fw-bold text-success">Pontos de Coleta em Almenara</h2>
  <p class="text-muted">Confira os dias e horários da coleta seletiva por bairro.</p>

  <div class="card-custom mt-4">
    <div class="table-responsive">
      <table class="table table-hover align-middle text-center">
        <thead class="table-success">
          <tr>
            <th>Bairros</th>
            <th>Dia</th>
            <th>Horário</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pontos as $ponto)
            <tr>
              <td>{{ $ponto->bairro }}</td>
              <td>{{ $ponto->dias_semana }}</td>
              <td>{{ $ponto->horario }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="text-muted">Nenhum ponto de coleta cadastrado ainda.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

@endsection
