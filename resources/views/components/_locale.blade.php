<form action="{{route('setLocale', $lang)}}" method="get">
    @csrf
    <button class="btn" type="submit">
        <img src="{{asset('vendor/blade-flags/language-'. $lang . '.svg')}}" width="32" height="32" alt="">
    </button>
    
</form>