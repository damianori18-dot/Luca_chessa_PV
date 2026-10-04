<x-layout class="navbar-dark-fixed">


    <section class="gallery-section container-fluid bg-dark">
        <div class="container mt-5">
            <h2 class="text-center gallery-title color-s">Portfolio</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row gallery-grid g-3">
                @foreach ($sets as $set)
                    <div class="col-12 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ route('portfolio.show', $set->slug) }}">
                                <img src="{{ asset('storage/' . $set->preview_image) }}" alt="Foto anteprima set"
                                    loading="lazy">
                                <div class="gallery-overlay d-flex align-items-center justify-content-center">
                                    <i data-lucide="folder-lock" class="color-s"></i>
                                </div>

                            </a>
                        </div>
                        @if (Auth::check() && Auth::user()->is_admin)
                            <p class="color-s"><strong>Codice accesso cliente:</strong> {{ $set->access_code }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>


</x-layout>
