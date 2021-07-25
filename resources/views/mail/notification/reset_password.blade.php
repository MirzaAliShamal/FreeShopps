
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Freeshopps.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    </head>

    <body style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400;">

        <!-- Hero Start -->
        <div style="margin-top: 50px;">
            <table cellpadding="0" cellspacing="0" style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
                <thead>
                    <tr style="background-color: #eee; padding: 3px 0; text-align: center; color: #fff; font-size: 24px; font-weight: 700; letter-spacing: 1px;">
                        <th scope="col"><img src="{{ asset('logo.png') }}" style="width:80px;" alt=""></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td style="padding: 48px 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;">
                            Hello,
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px 24px 15px; color: #8492a6;">
                            You are receiving this email because we received a password reset request for your account.
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 15px 24px;">
                            <a href="{{ $url }}" style="padding: 8px 20px; outline: none; text-decoration: none; font-size: 16px; letter-spacing: 0.5px; transition: all 0.3s; font-weight: 600; border-radius: 6px; background-color: #f85c70; border: 1px solid #f85c70; color: #ffffff;">Reset Password</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 15px 24px 0; color: #8492a6;">
                            This password reset link will expire in {{ config('auth.passwords.'.config('auth.defaults.passwords').'.expire') }} minutes.
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 15px 24px 0; color: #8492a6;">
                            If you did not request a password reset, no further action is required.
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 15px 24px 15px; color: #8492a6;">
                            {{ config("app.name") }} <br> Support Team
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 15px 24px 0; color: #8492a6; font-size: 13px; font-weight: 400;">
                            If you’re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:
                            <a href="{{ $url }}" target="_blank" style="text-decoration: underline; color: #3869d4;">{{ $url }}</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
                            © <script>document.write(new Date().getFullYear())</script> {{ config("app.name") }}.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Hero End -->
    </body>
</html>
