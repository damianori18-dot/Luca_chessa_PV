<x-layout class="navbar-dark-fixed">
    <section class="gallery-section container-fluid bg-dark">
        <div class="container mt-5">
            <h2 class="text-center gallery-title color-s">Galleria</h2>

            <div class="row gallery-grid g-3">
                @foreach ($photos as $photo)
                    <div class="col-12 col-md-4">
                        <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#lightboxModal"
                            data-src="{{ asset('storage/' . $photo->image) }}">
                            <img src="{{ asset('storage/' . $photo->image) }}" alt="Foto galleria" loading="lazy">
                            <div class="gallery-overlay"></div>
                        </div>
                        @if (Auth::check() && Auth::user()->is_admin)
                            <a class="btn btn-warning" href="{{ route('photo.edit', $photo->id) }}">Modifica foto</a>
                            <a class="btn btn-danger" href="#"
                                onclick="event.preventDefault(); document.querySelector('#delete').submit();">Elimina
                                foto</a>

                            <form id="delete" action="{{ route('photo.destroy', $photo->id) }}" method="POST"
                                class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- LIGHTBOX MODAL -->
    <div class="modal fade lightbox-modal" id="lightboxModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <button type="button" class="btn-close btn-close-white ms-auto me-2 mt-2" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="modal-body p-0">
                    <img id="lightboxImage" src="" alt="Foto galleria">
                </div>
            </div>
        </div>
    </div>
</x-layout>
