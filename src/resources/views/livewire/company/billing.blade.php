<div class="
    h-full w-full
    flex flex-row m-auto
    items-center justify-center
">

    <div class="
        flex flex-row gap-8 m-auto
        items-center justify-center
        flex-wrap
    ">
        <div class="
            flex flex-col gap-8
            dark:border-zinc-700
            border-zinc-200 border
            rounded-md p-4 w-10/12 max-w-[400px]
        ">
            <flux:heading class="font-bold text-[1.8rem]" level="2">Plano mensal - R$ 999.99</flux:heading>
            <flux:text>
                Acesse todas as funcionalidades da nossa plataforma pagando apenas R$ 29.99 por mês
                , otimo para você que quer testar nossa plataforma e ter certeza se ela é a certa para você!
            </flux:text>
            <flux:button href="{{ route('checkout', ['name' => 'monthly']) }}" class="w-full">Assinar</flux:button>
        </div>
        <div class="
            flex flex-col gap-8
            dark:border-zinc-700
            border-zinc-200 border
            rounded-md p-4 w-10/12 max-w-[400px]
        ">
            <flux:heading class="font-bold text-[1.8rem]" level="2">Plano anual - R$ 10,249.99</flux:heading>
            <flux:text>
                Acesse todas as funcionalidades da nossa plataforma pagando apenas R$ 149.99 por ano
                , otimo para você que quer economizar o maximo o possivel ao utilizar nossa platoforma!
            </flux:text>
            <flux:button href="{{ route('checkout', ['name' => 'yearly']) }}" class="w-full">Assinar</flux:button>
        </div>
    </div>

</div>
