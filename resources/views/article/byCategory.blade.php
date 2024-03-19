<x-layout>
    <div class="container">
        <div class="row h align-items-center">
            <div class="col-12">
                <h1 class="text-center">Categoria {{$category->name}}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 mb-5">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="https://picsum.photos/200/300" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 ">
                    <h2 class="text-center">
                        Non ci sono ancora articoli
                    </h2>
                </div>
            @endforelse
        </div>
    </div>

</x-layout>
