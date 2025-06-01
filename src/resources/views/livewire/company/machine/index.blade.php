<div>

    <flux:input icon="magnifying-glass" placeholder="Pesquisar maquinas" wire:model.live="search" />

    <div class="
        pt-6 flex flex-wrap
        gap-6
    ">
        @if ($machines->isEmpty())
            <p class="text-center w-full">Nenhuma maquina encontrada</p>
        @endif

        @foreach ($machines as $machine)
            <div 
                class="
                    relative
                    flex flex-col gap-4
                    overflow-hidden
                    border-2 border-gray-700
                    rounded-md card
                    w-full
                    sm:w-64
                "
                id="cardId-{{ $loop->iteration }}"
            >
                <div class="
                    flex
                    overflow-hidden
                    w-full h-40 images
                    border-b-1 border-gray-700
                ">
                    <flux:icon.chevron-left class="
                        absolute
                        top-1/4 left-1
                        cursor-pointer
                        translate-y-[50%]
                        hover:brightness-65
                    " onclick="previousImage({{ $loop->iteration }})"></flux:icon>
                    <flux:icon.chevron-right class="
                        absolute
                        top-1/4 right-1
                        cursor-pointer
                        translate-y-[50%]
                        hover:brightness-65
                    " onclick="nextImage({{ $loop->iteration }})"></flux:icon>

                    <div class="
                        absolute
                        flex gap-1
                        bottom-[50%] left-1/2
                        translate-x-[-50%]
                        translate-y-[150%]    
                    ">
                        @foreach (json_decode($machine->images) as $image)
                            <div class="
                                w-2 h-2
                                rounded-[50%]
                                bg-white 
                                circle circle-{{ $loop->iteration }}
                            ">
                            </div>
                        @endforeach
                    </div>

                    @foreach (json_decode($machine->images) as $image)

                        <figure class="
                            flex-shrink-0
                            w-full h-full
                        ">
                            <img 
                                src="/local/{{ $image }}" alt="{{ $machine->name }}-image-{{ $loop->iteration }}" 
                                class="
                                    w-full h-full
                                    object-cover
                                "
                            >
                        </figure>
                    @endforeach
                </div>
                <div class="px-4">
                    <flux:heading level="2" size="xl">{{ Illuminate\Support\Str::limit($machine->name, 15) }}</flux:heading>
                </div>
                <div class="px-4 pb-4">
                    <flux:button 
                        variant="primary" 
                        class="
                            w-full
                            cursor-pointer
                            hover:brightness-65
                        "
                    >Selecionar</flux:button>
                </div>
            </div>
        @endforeach
    </div>

</div>

@pushOnce('scripts')
    <script>
        function changeCircle() 
        {
            const perImageWidth = parseFloat(getComputedStyle(document.querySelector('.card img')).width);
            const cards = document.querySelectorAll('.card');

            cards.forEach(card => {
                const images = card.querySelector('.images');
                const scrollX = images.scrollLeft;

                const currentImage = scrollX / perImageWidth;
                const circles = card.querySelectorAll(`.circle`);

                circles.forEach(circle => {
                    if (circle.classList.contains(`circle-${currentImage+1}`)) {
                        circle.classList.add('brightness-25');
                    } else {
                        circle.classList.remove('brightness-25');
                    }
                })
            });
        }

        document.addEventListener('DOMContentLoaded', changeCircle);

        function previousImage(cardId)
        {
            const perImageWidth = parseFloat(getComputedStyle(document.querySelector('.card img')).width);
            const card = document.querySelector(`#cardId-${cardId}`);
            const images = card.querySelector('.images');

            const previousScrollPoint = images.scrollLeft;

            images.scrollBy(-(perImageWidth), 0)

            if (images.scrollLeft == previousScrollPoint) 
                images.scrollTo(images.scrollWidth, 0);

            changeCircle()
        }

        function nextImage(cardId)
        {
            const perImageWidth = parseFloat(getComputedStyle(document.querySelector('.card img')).width);
            const card = document.querySelector(`#cardId-${cardId}`);
            const images = card.querySelector('.images');

            const previousScrollPoint = images.scrollLeft;
            
            images.scrollBy(perImageWidth, 0);

            if (images.scrollLeft == previousScrollPoint) 
                images.scrollTo(0, 0);

            changeCircle()
        }
    </script>
@endPushOnce
