<x-guest-layout>
    <div class="card-custom">
        <h4 class="mb-4 fw-bold text-success">Criar conta</h4>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mb-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mb-3">
                <x-input-label for="telefone" :value="__('Telefone')" />
                <x-text-input id="telefone" class="form-control" type="text" name="telefone" :value="old('telefone')" />
            </div>

            <div class="mb-3">
                <x-input-label for="endereco" :value="__('Endereço')" />
                <x-text-input id="endereco" class="form-control" type="text" name="endereco" :value="old('endereco')" />
            </div>

            <div class="mb-3">
                <x-input-label for="password" :value="__('Senha')" />
                <x-text-input id="password" class="form-control" type="password" name="password" required />
            </div>

            <button type="submit" class="btn btn-success w-100">Cadastrar</button>
        </form>
    </div>
</x-guest-layout>