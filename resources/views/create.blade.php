<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Data Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>User Data Form</h2>
<form action="{{ route('store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="user_id">Select User:</label>
        <select class="form-control" name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" name="date">
    </div>
    <div class="form-group">
        <label for="hour">Hour:</label>
        <input type="number" class="form-control" name="hour" placeholder="Enter hour">
    </div>
    <div class="form-group">
        <label for="note">Note:</label>
        <textarea class="form-control" name="note" rows="3" placeholder="Enter note"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

  </div>
</body>
</html>
