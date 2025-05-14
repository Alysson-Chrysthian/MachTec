<div class="
    w-10/12 max-w-[500px] h-full
    flex flex-col justify-center
    m-auto
">

    <h1 class="
        font-bold text-[2rem]
        text-center
    ">Register</h1>

    <form class="flex flex-col gap-4" wire:submit="register">

        <flux:field>
            <flux:label>Nome</flux:label>
            <flux:input type="text" wire:model="name" placeholder="Ex: MyCompany" />
            <flux:error name="name" />
        </flux:field>

        <flux:field>
            <flux:label>Email</flux:label>
            <flux:input type="email" wire:model="email" placeholder="Ex: mycompany@mail.com" />
            <flux:error name="email" />
        </flux:field>

        <flux:field>
            <flux:label>Senha</flux:label>
            <flux:input type="password" wire:model="password" placeholder="Digite uma senha segura" />
            <flux:error name="password" />
        </flux:field>

        <flux:field>
            <flux:label>Confirme senha</flux:label>
            <flux:input type="password" wire:model="password_confirmation" placeholder="Confirme sua senha" />
            <flux:error name="password_confirmation" />
        </flux:field>

        <flux:field>
            <flux:label>CNPJ</flux:label>
            <flux:input type="text" wire:model="cnpj" placeholder="Ex: XXXXXXXX0001XX" />
            <flux:error name="cnpj" />
        </flux:field>

        <flux:button type="submit" class="w-full">Registrar-se</flux:button>
    
        <div class="flex gap-4">
            <a href="{{ route('company.auth.login') }}">Logar como empresa</a>
            <a href="{{ route('employee.auth.login') }}">Logar como funcionario</a>
        </div>
    </form>

</div>