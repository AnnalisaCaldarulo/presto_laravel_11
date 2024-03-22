<x-layout>
    <div class="container">
        <div class="row h align-items-center">
            <div class="col-12">
                <h1 class="text-center">Dettaglio dell'articolo {{ $article->title }}</h1>
            </div>
        </div>
        <div class="row justify-content-evenly">
            <div class="col-12 col-md-6">
                <img src="{{ $article->images()->get()->isNotEmpty() ? Storage::url($article->images()->first()->path) : 'https://picsum.photos/200/118' }}"
                    class="shadow rounded text-center img-fluid" alt="...">
            </div>
            <div class="col-12 col-md-4 my-5">

                <h5 class="card-title">{{ $article->title }}</h5>


            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3 py-5">
                <a href="{{ route('article.index') }}" class="btn btn-primary">Torna indietro</a>
            </div>
        </div>
    </div>

</x-layout>
