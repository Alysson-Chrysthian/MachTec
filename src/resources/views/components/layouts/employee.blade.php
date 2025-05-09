<x-layouts.app>

    <header>
        <nav>
            <ul>
                <li><a href="#">Ver empresas</a></li>
                <li>
                    <div>Oferecer suporte <x-eva-arrow-ios-forward /></div>
                    <ul class="dropdown">
                        <li><a href="#">Responder tickets</a></li>
                        <li><a href="#">Tickets respondidos</a></li>
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