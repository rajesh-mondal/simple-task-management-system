<!DOCTYPE html>
<html>

<head>
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        @yield('content')
    </div>

</body>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this task?");
    }
</script>

</html>
