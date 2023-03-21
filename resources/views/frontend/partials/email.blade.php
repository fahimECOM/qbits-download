<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qbits | @yield('title')</title>
</head>

<body style="background-color: #f5f5f5; padding-top: 1rem;">
    <div
        style="background-color: #fff; color: #444; font: 16px/1.6 Tahoma, Verdana, Arial, sans-serif; max-width: 725px; margin: 1rem auto; padding: 2rem;">
        <a href="https://www.myqbits.com" style="display: block;" target="_blank">
            <img src="{{$message->embed('frontend/assets/logo/qbits_logo_black.png')}}" alt="Qbits Logo"
                style="display: block; margin: auto auto 1.5rem; width: 100px;" />
        </a>

        @yield('content')

        <!-- <p style="margin-bottom: 0.25em;">Thank You</p>
        <p style="margin: 0;"><a href="https://www.myqbits.com" style="text-decoration: none;color: #444;" target="_blank">myqbits.com</a></p> -->

    </div>
    <p style="font: 13px/1.5 Tahoma, Verdana, Arial, sans-serif; text-align: center; padding-bottom: 1rem;">&copy; 2023
        <a href="https://myqbits.com" style="color: #3490dc; text-decoration: none;" target="_blank">Qbits</a></p>
</body>

</html>