<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>
<body>
    <div style="padding: 20px; font-family: sans-serif;">
    <h1>Admin Dashboard</h1>

    <h2>Users</h2>
    <table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse;">
        <tr><th>Name</th><th>Email</th><th>Action</th></tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <h2>User Informs</h2>
    @foreach($inquiries as $item)
        <div style="background: #f4f4f4; padding: 10px; margin-bottom: 5px;">
            <strong>{{ $item->name }}</strong>: {{ $item->subject }} <br>
            <p>{{ $item->message }}</p>
        </div>
    @endforeach
</div>
</body>
</html>
