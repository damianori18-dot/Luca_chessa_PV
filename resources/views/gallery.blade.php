<x-layout class="navbar-dark-fixed">
    <section class="gallery-section container-fluid bg-dark">
        <div class="container mt-5">
            <h2 class="text-center gallery-title color-s">Galleria</h2>

            <div class="row gallery-grid g-3">
                <!-- 1 -->
                <div class="col-12 col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#lightboxModal"
                        data-src="{{ asset('media/hero.jpeg') }}">
                        <img src="{{ asset('media/hero.jpeg') }}" alt="Sposa in profilo" loading="lazy">
                        <div class="gallery-overlay"></div>
                    </div>
                </div>

                <!-- 2 -->
                <div class="col-12 col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#lightboxModal"
                        data-src="{{ asset('media/hero2.jpeg') }}">
                        <img src="{{ asset('media/hero2.jpeg') }}" alt="Coppia sulla scogliera" loading="lazy">
                        <div class="gallery-overlay"></div> 
                    </div>
                </div>

                <!-- 3 -->
                <div class="col-12 col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#lightboxModal"
                        data-src="https://picsum.photos/300/200">
                        <img src="https://picsum.photos/300/200" alt="Sposo che sistema il papillon" loading="lazy">
                        <div class="gallery-overlay"></div>
                    </div>
                </div>

                <!-- 4 -->
                <div class="col-12 col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#lightboxModal"
                        data-src="https://picsum.photos/300/200">
                        <img src="https://picsum.photos/300/200" alt="Ritratto in bianco e nero" loading="lazy">
                        <div class="gallery-overlay"></div>
                    </div>
                </div>

                <!-- 5 -->
                <div class="col-12 col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#lightboxModal"
                        data-src="https://picsum.photos/300/200">
                        <img src="https://picsum.photos/300/200" alt="Cena all'aperto" loading="lazy">
                        <div class="gallery-overlay"></div>
                    </div>
                </div>

                <!-- 6 -->
                <div class="col-12 col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#lightboxModal"
                        data-src="https://picsum.photos/300/200">
                        <img src="https://picsum.photos/300/200" alt="Coppia che cammina" loading="lazy">
                        <div class="gallery-overlay"></div>
                    </div>
                </div>

                <!-- 7 -->
                <div class="col-12 col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#lightboxModal"
                        data-src="https://picsum.photos/300/200">
                        <img src="https://picsum.photos/300/200" alt="Paesaggio montano" loading="lazy">
                        <div class="gallery-overlay"></div>
                    </div>
                </div>

                <!-- 8 -->
                <div class="col-12 col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#lightboxModal"
                        data-src="https://picsum.photos/300/200">
                        <img src="https://picsum.photos/300/200" alt="Fotografo al lavoro" loading="lazy">
                        <div class="gallery-overlay"></div>
                    </div>
                </div>

                <!-- 9 -->
                <div class="col-12 col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#lightboxModal"
                        data-src="https://picsum.photos/300/200">
                        <img src="https://picsum.photos/300/200" alt="Auto d'epoca al lago" loading="lazy">
                        <div class="gallery-overlay"></div>
                    </div>
                </div>
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
                    <img id="lightboxImage" src="{{ asset('media/hero.jpeg') }}" alt="Foto galleria">
                </div>
            </div>
        </div>
    </div>
</x-layout>
