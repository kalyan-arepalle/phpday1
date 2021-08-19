<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Create User</title>
    <!-- styling etc. -->
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <form method="POST" action="{{ config('app.url')}}/users">
            <h1> Enter Details to create a user</h1>
            <div class="form-input">
                <label>First Name</label> <input type="text" name="first_name">
            </div>

            <div class="form-input">
                <label>Last Name</label> <input type="text" name="last_name">
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
