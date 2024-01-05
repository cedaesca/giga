<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dog</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="row d-flex flex-column min-vh-100 justify-content-center">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center mb-4">Add Dog</h1>
                <form action="{{ route('dogs.store') }}" method="post" class="card p-4">
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
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Dog's name:</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Dog's birth date:</label>
                        <input name="birth_date" type="date" class="form-control" id="birth_date" value="{{ old('birth_date') }}">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="hidden" name="is_birth_date_exact" value="0">
                        <input type="checkbox" class="form-check-input" id="is_birth_date_exact" name="is_birth_date_exact" value="1" {{ old('is_birth_date_exact') ? 'checked' : '' }}>
                        <label for="is_birth_date_exact" class="form-check-label">Is the dog's birth date exact?</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
