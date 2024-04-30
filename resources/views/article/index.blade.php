<x-layout>
    <div class="container">
        <div class="row h align-items-center">
            <div class="col-12">
                <h1 class="text-center">Tutti gli articoli</h1>
            </div>
        </div>
        <div class="row justify-content-evenly">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 my-5">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="{{ $article->images()->get()->isNotEmpty() ? Storage::url($article->images()->first()->path) : 'https://picsum.photos/200/118' }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary">Go
                                somewhere</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center shadow rounded">
                        Non ci sono articoli
                    </div>
                </div>
            @endforelse
            @if ($articles)
                {{ $articles->onEachSide(5)->links() }}
            @endif
        </div>
    </div>

</x-layout>
