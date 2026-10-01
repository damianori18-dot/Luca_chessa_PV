<x-layout class="navbar-dark-fixed">

    <div class="container mt-5 py-5 vh-100 d-flex flex-column justify-content-center">
        <h2 class="color-p mb-4">Cambia Immagine Galleria</h2>

        <form action="{{ route('photo.update', $photo->id) }}" class="d-flex flex-column" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Upload singole immagini -->
            <div class="mb-4">
                <img src="{{ Storage::url($photo->image) }}" alt="Immagine articolo" class="img-fluid rounded"
                    style="max-height: 300px;">
            </div>
            <div class="mb-4">
                <label class="form-label color-p">Cambia immagine</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button class="btn bg-dark" data-bs-theme="dark">Carica</button>
        </form>
    </div>

</x-layout>
