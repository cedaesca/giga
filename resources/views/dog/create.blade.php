<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('dogs.store') }}" method="post">
        @csrf
        <label id="dog_name" for="name">Dog's name:</label>
        <input name="name" type="text" value="{{ old('name') }}">
        <br>
        <label for="birth_date">Dog's birth date:</label>
        <input id="dog_birth_date" name="birth_date" type="date" value="{{ old('birth_date') }}">
        <br>
        <label for="is_birth_date_exact">Is the dog's birth date exact?</label>
        <input type="hidden" name="is_birth_date_exact" value="0">
        <input type="checkbox" name="is_birth_date_exact" value="1" {{ old('is_birth_date_exact') ? 'checked' : '' }}>
        <br>
        <input type="submit">
    </form>
</body>
</html>