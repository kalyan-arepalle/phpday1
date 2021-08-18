<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>View Users</title>
    <!-- Styles etc. -->
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <h1>Here's a list of available users</h1>
        <table>
            <thead>
            <td>First Name</td>
            <td>Last Name</td>
            </thead>
            <tbody>
            @foreach ($allUsers as $u)
                <tr>
                    <td>{{ $u->first_name }}</td>
                    <td>{{ $u->last_name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
