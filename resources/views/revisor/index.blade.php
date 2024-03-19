<x-layout>
    <div class="container">
        <div class="row h align-items-center">
            <div class="col-12">
                <h1 class="text-center">{{ $article_to_check ? "$article_to_check->title" : 'Nessun articolo' }}</h1>
            </div>
        </div>
        @if ($article_to_check)
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 b-3">
                    <img src="https://picsum.photos/500" class="rounded shadow" alt="">
                </div>
                <div class="col-12 col-md-6 b-3">
                    <h2>Titolo: {{ $article_to_check->title }}</h2>
                    <p class="">{{ $article_to_check->body }}</p>
                    <div class="row justify-content-center h align-items-end">
                        <div class="col-12 col-md-6 text-center">
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
