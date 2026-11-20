
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
</head>
<body>
    <h1>Task Details</h1>

    <h2>{{ $task->title }}</h2>

    <p><strong>Description:</strong> {{ $task->description }}</p>
    <p><strong>Status:</strong> {{ $task->status }}</p>
    <p><strong>Due Date:</strong> {{ $task->due_date }}</p>

    <a href="{{ route('tasks.edit', $task->id) }}">Edit Task</a>

    <br><br>
    <a href="{{ route('tasks.index') }}">Back to Tasks</a>
</body>
</html>
