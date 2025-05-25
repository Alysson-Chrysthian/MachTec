<div class="    
    w-10/12 max-w-[500px] h-full
    flex flex-col justify-center
    m-auto
">

    <h1 class="font-bold text-center text-[2rem]">Criar maquina</h1>

    <form class="flex flex-col gap-4" wire:submit="create">

        <flux:field>
            <flux:label>Nome</flux:label>
            <flux:input type="text" wire:model="name" placeholder="Nome da maquina" />
            <flux:error name="name" />
        </flux:field>

        <flux:field>
            <flux:label>Imagens</flux:label>
            <flux:input type="file" wire:model="images" placeholder="Imagens da maquina" multiple />
            <flux:error name="images" />
        </flux:field>

        <flux:button type="submit" class="w-full" >Criar maquina</flux:button>

    </form>

</div>

@push('scripts')
    @script
        <script>
            Livewire.on('machine-created', () => {
                alert('Maquina criada com sucesso');
            });
        </script>
    @endscript
@endPush
