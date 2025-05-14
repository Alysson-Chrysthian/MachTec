<div class="
    w-10/12 max-w-[500px] h-full
    flex flex-col justify-center
    m-auto
">

    <h1 class="font-bold text-center text-[2rem]">Login</h1>

    <form class="flex flex-col gap-4" wire:submit="login">

        <flux:field>
            <flux:label>Email</flux:label>
            <flux:input type="email" wire:model="email" placeholder="Seu email cadastrado" />
            <flux:error name="email" />
        </flux:field>

        <flux:field>
            <flux:label>CNPJ</flux:label>
            <flux:input type="text" wire:model="cnpj" placeholder="CNPJ da sua empresa" />
            <flux:error name="cnpj" />
        </flux:field>

        <flux:field>
            <flux:label>Senha</flux:label>
            <flux:input type="password" wire:model="password" placeholder="Sua senha" />
            <flux:error name="password" />
        </flux:field>
        
        <flux:button type="submit" class="w-full">Entrar</flux:button>

        <div class="flex gap-4">
            <a href="{{ route('company.auth.register') }}">Registrar-se como empresa</a>
            <a href="{{ route('employee.auth.login') }}">Logar como funcionario</a>
        </div>

    </form>

</div>
