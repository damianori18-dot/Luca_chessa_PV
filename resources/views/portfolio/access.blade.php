<x-layout class="navbar-dark-fixed">


    <div class="container mt-5 py-5 vh-100 d-flex flex-column justify-content-center">
        <h2 class="color-p mb-4">Accesso al set: {{ $set->title }}</h2>

        <p>Inserisci il codice che ti è stato fornito.</p>

        <form action="{{ route('portfolio.access.check', $set->id) }}" method="POST">
            @csrf
            <input type="text" name="code" placeholder="Inserisci il codice" class="form-control">

            @error('code')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror

            <button class="btn bg-dark mt-3" data-bs-theme="dark">Accedi</button>
        </form>
    </div>


</x-layout>
