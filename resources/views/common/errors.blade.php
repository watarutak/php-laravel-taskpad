@if (count($errors) > 0)
    <strong>Ah? it seems something went wrong...</strong>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

