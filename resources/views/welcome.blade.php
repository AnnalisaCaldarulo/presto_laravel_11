<x-layout>
    <div class="container">
        <div class="row h align-items-center">
            <div class="col-12">
                <h1 class="text-center pt-5 mt-5">{{ __('ui.hello') }}</h1>
            </div>
        </div>
        <div class="row justify-content-center h align-items-center">
            <div class="col-12 col-md-6">
                <form action="{{ route('become.revisor') }}" method="POST" class="bg-body-secondary p-5 rounded shadow">
                    @csrf
                    <label for="message" class="form-label">Manda la tua candidatura</label>
                    <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary mt-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>
