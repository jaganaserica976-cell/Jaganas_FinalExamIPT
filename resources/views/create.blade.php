<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Campsite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card p-4 mx-auto w-100">
        <h2>Edit Campsite</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('campsites.update', $campsite->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="form-label mt-2">Site Name</label>
            <input type="text" name="site_name" class="form-control"
                   value="{{ old('site_name', $campsite->site_name) }}" required>

            <label class="form-label mt-2">Location</label>
            <input type="text" name="location" class="form-control"
                   value="{{ old('location', $campsite->location) }}" required>

            <label class="form-label mt-2">Price per Night</label>
            <input type="number" name="price" class="form-control"
                   min="0" step="0.01"
                   value="{{ old('price', $campsite->price) }}" required>

            <label class="form-label mt-2">Capacity</label>
            <input type="number" name="capacity" class="form-control"
                   min="1" value="{{ old('capacity', $campsite->capacity) }}" required>

            <label class="form-label mt-2">Status</label>
            <select name="status" class="form-select" required>
                <option value="Available" @selected(old('status', $campsite->status) === 'Available')>Available</option>
                <option value="Unavailable" @selected(old('status', $campsite->status) === 'Unavailable')>Unavailable</option>
            </select>

            <button type="submit" class="btn btn-primary mt-3">Update Campsite</button>
            <a href="{{ route('campsites.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
</div>
</body>
</html>