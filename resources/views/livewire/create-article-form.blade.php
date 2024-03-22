<form wire:submit="save" class="p-5 mb-5 shadow bg-body-secondary rounded" enctype="multipart/form-data">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" wire:model="title">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">body</label>
        <textarea wire:model="body" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="mb-3">

        <select wire:model="category" class="form-control" id="category">
            <option label disabled> Seleziona una categoria </option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="images" class="form-label">Inserisci immagini</label>
        <input type="file" multiple wire:model="temporary_images"
            class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/"
            id="images">
        @error('temporary_images.*')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    @if (!empty($images))
        <div class="row">
            <div class="col-12">
                <p>Preview</p>
                <div class="row border border-info border-4 rounded shadow py-4">
                    @foreach ($images as $key=>$image)
                        <div class="col my-3  align-items-center">
                            <div class="mx-auto shadow rounded img-preview"
                                style="background-image: url({{ $image->temporaryUrl() }});">
                            </div>
                            <button type="button" class="btn btn-danger mx-auto" wire:click="removeImage({{$key}})">X</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="mb-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
