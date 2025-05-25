<x-layouts.app>
    
    <flux:header container class="
        dark:bg-zinc-900 dark:border-zinc-700 
        bg-zinc-50 border-zinc-200 border-b 
        items-center flex
    ">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:brand href="{{ route('employee.home') }}" logo="https://fluxui.dev/img/demo/logo.png" name="MachTec Inc." class="max-lg:hidden dark:hidden" />
        <flux:brand href="{{ route('employee.home') }}" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="MachTec Inc." class="max-lg:hidden! hidden dark:flex" />

        <flux:navbar class="max-lg:hidden">
            <flux:navbar.item>Ver empresas</flux:navbar.item>
            <flux:dropdown>
                <flux:navbar.item icon:trailing="chevron-down">Maquinas</flux:navbar.item>
                
                <flux:navmenu>
                    <flux:navmenu.item>Ver maquinas</flux:navmenu.item>
                    <flux:navmenu.item>Adicionar maquinas</flux:navmenu.item>
                </flux:navmenu>
            </flux:dropdown>
            <flux:dropdown>
                <flux:navbar.item icon:trailing="chevron-down">Tickets</flux:navbar.item>

                <flux:navmenu>
                    <flux:navmenu.item>Ver tickets</flux:navmenu.item>
                    <flux:navmenu.item>Tickets respondidos</flux:navmenu.item>
                </flux:navmenu>
            </flux:dropdown>
            <flux:navbar.item>Sair</flux:navbar.item>
        </flux:navbar>
    </flux:header>

    <flux:sidebar stashable sticky class="
        lg:hidden bg-zinc-50 dark:bg-zinc-900 
        border rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700    
    ">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <flux:brand href="{{ route('employee.home') }}" logo="https://fluxui.dev/img/demo/logo.png" name="MachTec Inc." class="px-2 dark:hidden" />
        <flux:brand href="{{ route('employee.home') }}" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="MachTec Inc." class="px-2 hidden dark:flex" />

        <flux:navlist>
            <flux:navlist.item>Ver empresas</flux:navlist.item>
            <flux:navlist.group expandable heading="Maquinas">
                <flux:navlist.item>Ver maquinas</flux:navlist.item>
                <flux:navlist.item>Adicionar maquinas</flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group expandable heading="Tickets">
                <flux:navlist.item>Ver tickets</flux:navlist.item>
                <flux:navlist.item>Tickets respondidos</flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.item href="{{ route('employee.logout') }}">Sair</flux:navlist.item>
        </flux:navlist>
    </flux:sidebar>

    <flux:main>
        {{ $slot }}
    </flux:main>

</x-layouts.app>