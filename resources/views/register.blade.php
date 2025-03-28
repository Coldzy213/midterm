<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,	initial-scale=1.0" />
    <title>Registration</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div id="message"></div>

    <form id="registrationForm">
        @csrf
        <label>Username: <input type="text" name="username" required></label><br>
        <label>First Name: <input type="text" name="first_name" required></label><br>
        <label>Last Name: <input type="text" name="last_name" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <label>Retype Password: <input type="password" name="retype_password" required></label><br>
        <button type="submit">Register</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#registrationForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('register') }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#message').html('<p	style="color:	green;">' + response.success +
                            '</p>');
                        $('#registrationForm')[0].reset();
                    },
                    error: function(xhr) {
                        $('#message').html('<p	style="color:	red;">' + xhr.responseJSON.error +
                            '</p>');
                    }
                });
            });
        });
    </script>
</body>

</html>
