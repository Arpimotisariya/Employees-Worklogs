<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Logs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
        <div class="mb-3">
            <a href="{{ route('create') }}" class="btn btn-primary mb-2">Add Employee</a>
        </div>
        <div class="my-2">
            <form action="{{ route('filterByDate') }}" method="GET" class="form-inline">
                <label class="mr-2" for="from_date">From:</label>
                <input type="date" class="form-control mr-2" id="from_date" name="from_date">

                <label class="mr-2" for="to_date">To:</label>
                <input type="date" class="form-control mr-2" id="to_date" name="to_date">

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Date</th>
                    <th>Hour</th>
                    <th>Note</th>
                    <th>Preferred Working Hour</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workLogs as $workLog)
                <tr class="{{ $workLog->hour < $userPreferredHours[$workLog->name] ? 'text-danger' : '' }}">
                    <td>{{ $workLog->id }}</td>
                    <td>{{ $workLog->name }}</td>
                    <td>{{ $workLog->date }}</td>
                    <td>{{ $workLog->hour }}</td>
                    <td>{{ $workLog->note }}</td>
                    <td>
                        @if(isset($userPreferredHours[$workLog->name]))
                            {{ $userPreferredHours[$workLog->name] }}
                        @else
                            Not defined
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('edit', $workLog->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('destroy', $workLog->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
