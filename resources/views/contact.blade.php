<x-layout class="navbar-dark-fixed">
    <section class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <h2 class="text-center my-4">Richiedi informazioni o un preventivo</h2>

                <form action="{{ route('contact.store') }}" method="POST">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" >
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Cognome</label>
                        <input type="text" class="form-control form-control-lg" id="surname" name="surname">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Informazioni sull’evento</label>
                        <textarea class="form-control form-control-lg" id="description" name="description" rows="6"
                            placeholder="Descrivi l’evento o la richiesta di preventivo..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark btn-lg w-100">
                        Invia richiesta
                    </button>

                </form>

            </div>
        </div>
    </section>

</x-layout>
