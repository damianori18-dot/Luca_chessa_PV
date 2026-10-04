<x-layout class="navbar-dark-fixed">

    <div class="container-fluid px-0 mt-5 bg-dark">

        <div class="py-5 text-center">
            <h2 class="gallery-title color-s">{{ $set->title }}</h2>
        </div>

        <div class="delivery-stack px-1">

            @foreach ($set->images as $image)
                <div class="delivery-item">

                    <img src="{{ asset('storage/' . $image->path) }}" alt="Foto" class="delivery-photo" loading="lazy">

                    <div class="download-box">
                        <a href="{{ asset('storage/' . $image->path) }}" download class="download-btn">
                            Scarica foto
                        </a>
                    </div>

                </div>
            @endforeach

        </div>

    </div>

</x-layout>
