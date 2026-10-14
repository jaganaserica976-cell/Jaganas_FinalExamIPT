```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Campsite Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Campsite Management</h2>

        <a href="{{ route('campsites.create') }}" class="btn btn-primary">
            + Add Campsite
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($campsites as $campsite)
                            <tr>
                                <td>{{ $campsite->id }}</td>
                                <td>{{ $campsite->name }}</td>
                                <td>{{ $campsite->location }}</td>
                                <td>{{ $campsite->description }}</td>
                                <td>
                                    <a href="{{ route('campsites.edit', $campsite->id) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('campsites.destroy', $campsite->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Delete this campsite?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No campsites found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
```