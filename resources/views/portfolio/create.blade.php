<x-layout class="navbar-dark-fixed">

    <div class="container mt-5 py-5 vh-100 d-flex flex-column justify-content-center">
        <h2 class="color-p mb-4">Crea nuovo set portfolio</h2>

        <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="title">Titolo set</label>
                <input id="title" type="text" name="title" class="form-control" value="{{ old('title') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="images">Carica immagini</label>
                <input id="images" type="file" name="images[]" accept="image/*" multiple class="form-control"
                    required>
            </div>

            <button class="btn bg-dark mt-3" data-bs-theme="dark">Crea set</button>
        </form>
    </div>



</x-layout>
