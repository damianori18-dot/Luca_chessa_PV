<x-layout class="navbar-dark-fixed">

    <div class="container mt-5 py-5 vh-100 d-flex flex-column justify-content-center">
        <h2 class="color-p mb-4">Carica Immagini Galleria</h2>

        <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Upload singole immagini -->
            <div class="mb-4">
                <label class="form-label color-p">Carica immagini</label>
                <input type="file" name="images[]" multiple class="form-control">
            </div>

            <!-- Upload cartella (ZIP) -->
            <div class="mb-4">
                <label class="form-label color-p">Carica cartella (ZIP)</label>
                <input type="file" name="zip" class="form-control">
            </div>

            <button class="btn bg-dark" data-bs-theme="dark">Carica</button>
        </form>
    </div>

</x-layout>
