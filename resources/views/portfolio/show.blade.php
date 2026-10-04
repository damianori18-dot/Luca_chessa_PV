<x-layout class="navbar-dark-fixed">

    <div class="container-fluid px-0 mt-5 bg-dark">

        <div class="py-5 text-center">
            <h2 class="gallery-title color-s">{{ $set->title }}</h2>
            <p class="text-secondary">Cartella di consegna</p>

            <a href="{{ route('photo.downloadAll', $set->id) }}"
                class="btn btn-outline-light px-4 py-2 rounded-pill mb-4">
                Scarica tutte le foto
            </a>
        </div>

        <div class="masonry">

            @foreach ($set->images as $image)
                <div class="masonry-item">
                    <button type="button" class="w-100 p-0 border-0 bg-transparent"
                        data-lightbox-src="{{ asset('storage/' . $image->path) }}" aria-label="Apri la foto">
                        <img src="{{ asset('storage/' . $image->path) }}" alt="Foto" loading="lazy">
                        <div class="mansory-overlay"></div>
                    </button>
                </div>
            @endforeach
        </div>

        <div id="lightbox" class="lightbox" role="dialog" aria-modal="true" aria-label="Anteprima foto">
            <a class="lightbox-close text-decoration-none" aria-label="Chiudi anteprima">✕</a>
            <a id="lightbox-download" class="lightbox-download" download>
                ⬇ Scarica
            </a>
            <img id="lightbox-img" alt="Foto selezionata">
        </div>

    </div>

</x-layout>
