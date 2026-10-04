<x-layout>
    <div class="container-fluid hero-bg">
        <div class="row  vh-100 align-items-center w-75 p-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <div class="col-12 col-md-6 col-lg-6 mt-2">
                <h1 class="display-3 playfair-display color-s">Raccontiamo
                    luoghi straordinari.
                    Li rendiamo
                    indimenticabili.</h1>
                <p class="color-s">Strategie creative, fotografia e contenuti su misura per venue che vogliono essere
                    scelte, vissute,
                    ricordate.</p>
                <a href="{{ route('contact') }}" class="btn btn-light">Prenota una consulenza</a>
            </div>

        </div>
    </div>
    <section class="container d-flex justify-content-center">
        <div class="chi-siamo">
            <div class="content">
                <h2>CHI SIAMO</h2>
                <h3 class="playfair-display fw-light display-5">La nostra missione è trasformare ciò che vediamo in
                    immagini che parlano da
                    sole.</h3>

                <p>
                    Crediamo che ogni storia, ogni luogo e ogni esperienza meritino una narrazione visiva capace di
                    esprimerne l’identità. La fotografia è il nostro strumento per valorizzare ciò che rende unico un
                    momento, un ambiente o una persona: luce, atmosfera, dettagli, emozioni.

                    Il nostro obiettivo è creare immagini che comunichino valore reale: fotografie
                    che raccontano, che rappresentano, che restano.

                </p>

                <a href="{{ route('photo.gallery') }}" class="btn-scopri">SCOPRI DI PIÙ</a>
            </div>

            <div class="image">
                <img src="{{ asset('media/chi-siamo.jpeg') }}" alt="Location">
            </div>
        </div>
    </section>


</x-layout>
