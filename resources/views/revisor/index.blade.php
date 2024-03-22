<x-layout>
    <div class="container-fluid">
        <div class="row h align-items-center">
            <div class="col-12">
                <h1 class="text-center display-4 my-5">{{ $article_to_check ? "$article_to_check->title" : 'Nessun articolo' }}</h1>
            </div>
        </div>
        @if ($article_to_check)
            <div class="row justify-content-around">
                <div class="col-12 col-md-5 p-5 text-center rounded bg-body-secondary shadow">
                    @if (count($article_to_check->images)>0)
                        <div id="carouselExample" class="carousel slide ">
                            <div class="carousel-inner">
                                @foreach ($article_to_check->images as $key => $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ Storage::url($image->path) }}" class="d-block w-100 rounded shadow"
                                            alt="Immagine {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}">
                                    </div>
                                @endforeach
                            </div>
                            @if(count($article_to_check->images)>1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            @endif
                        </div>
                    @else
                        <img src="https://picsum.photos/500" alt="Nessuna foto inserita dall'utente">
                    @endif
                </div>
                <div class="col-12 col-md-5 b-3 text-center ">
                    <h2 class=""> Titolo: {{ $article_to_check->title }}</h2>
                    <p class="">{{ $article_to_check->body }}</p>
                    <div class="row justify-content-center h align-items-end">
                        <div class="col-12 col-md-6 text-center ">
                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST"> @csrf
                                @method('PATCH')
                                <button class="btn btn-success">
                                    accetta
                                </button>
                            </form>
                        </div>
                        <div class="col-12 col-md-6 text-center">
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST"> @csrf
                                @method('PATCH')
                                <button class="btn btn-danger">
                                    rifiuta
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

</x-layout>
