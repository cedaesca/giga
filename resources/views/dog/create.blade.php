<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="row form-container">
            <div class="col-md-6 offset-md-3">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('dogs.store') }}" method="post" class="card p-4">
                    @csrf
                    <div class="form-group">
                        <label for="name">Dog's name:</label>
                        <input name="name" type="text" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Dog's birth date:</label>
                        <input id="birth_date" name="birth_date" type="date" class="form-control" value="{{ old('birth_date') }}">
                    </div>
                    <div class="form-check">
                        <input type="hidden" name="is_birth_date_exact" value="0">
                        <input id="is_birth_date_exact" type="checkbox" name="is_birth_date_exact" class="form-check-input" value="1" {{ old('is_birth_date_exact') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_birth_date_exact">Is the dog's birth date exact?</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
