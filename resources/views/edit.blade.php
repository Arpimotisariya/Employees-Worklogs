<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Work Log</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Work Log</h2>
        <form action="{{ route('update', $workLog->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">User Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $workLog->name }}" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" value="{{ $workLog->date }}">
            </div>
            <div class="form-group">
                <label for="hour">Hour:</label>
                <input type="number" class="form-control" name="hour" value="{{ $workLog->hour }}" placeholder="Enter hour">
            </div>
            <div class="form-group">
                <label for="note">Note:</label>
                <textarea class="form-control" name="note" rows="3" placeholder="Enter note">{{ $workLog->note }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
