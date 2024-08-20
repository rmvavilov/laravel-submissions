<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Form</title>
</head>
<body>
<h1>Best form in the world</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/submit" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" maxlength="255" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" maxlength="255" required><br><br>

    <label for="message">Message:</label>
    <textarea id="message" name="message" maxlength="1000" required>{{ old('message') }}</textarea><br><br>

    <button type="submit">Send</button>
</form>
</body>
</html>
