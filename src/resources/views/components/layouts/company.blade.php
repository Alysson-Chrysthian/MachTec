<x-layouts.app>

    <header>
        <nav>
            <ul>
                <li>
                    <div>Suporte <x-eva-arrow-ios-forward /></div>
                    <ul class="dropdown">
                        <li><a href="">Criar ticket</a></li>
                        <li><a href="">Ver meus tickets</a></li>
                    </ul>
                </li>
                <li>
                    <div>Maquinas <x-eva-arrow-ios-forward /></div>
                    <ul class="dropdown">
                        <li><a href="#">Ver maquinas</a></li>
                        <li><a href="">Minhas maquinas</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <h1>MachTec</h1>
    </header>

    <main>
        {{ $slot }}
    </main>

</x-layouts.app>