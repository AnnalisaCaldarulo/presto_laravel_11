<form wire:submit="save" class="p-5 shadow bg-body-secondary rounded">
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
    <div class="mb-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
