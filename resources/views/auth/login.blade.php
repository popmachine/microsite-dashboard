{\rtf1\ansi\ansicpg1252\cocoartf2822
\cocoatextscaling0\cocoaplatform0{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
{\*\expandedcolortbl;;}
\margl1440\margr1440\vieww11520\viewh8400\viewkind0
\pard\tx720\tx1440\tx2160\tx2880\tx3600\tx4320\tx5040\tx5760\tx6480\tx7200\tx7920\tx8640\pardirnatural\partightenfactor0

\f0\fs24 \cf0 <!DOCTYPE html>\
<html lang="en">\
<head>\
    <meta charset="UTF-8">\
    <title>Login | Microsite Dashboard</title>\
    <meta name="viewport" content="width=device-width, initial-scale=1.0">\
    <style>\
        body \{\
            font-family: sans-serif;\
            background: #f5f7fb;\
            display: flex;\
            justify-content: center;\
            align-items: center;\
            height: 100vh;\
            margin: 0;\
        \}\
        .login-container \{\
            background: white;\
            padding: 2.5rem;\
            border-radius: 8px;\
            box-shadow: 0 4px 30px rgba(0,0,0,0.08);\
            width: 100%;\
            max-width: 420px;\
        \}\
        .logo \{\
            text-align: center;\
            margin-bottom: 2rem;\
            font-weight: bold;\
            font-size: 1.75rem;\
            color: #4f46e5;\
        \}\
        input[type="email"],\
        input[type="password"] \{\
            width: 100%;\
            padding: 0.75rem;\
            margin-top: 0.25rem;\
            margin-bottom: 1.25rem;\
            border: 1px solid #ccc;\
            border-radius: 4px;\
            font-size: 1rem;\
        \}\
        button \{\
            background: #4f46e5;\
            color: white;\
            padding: 0.75rem;\
            border: none;\
            border-radius: 4px;\
            width: 100%;\
            font-size: 1rem;\
            cursor: pointer;\
        \}\
        .actions \{\
            margin-top: 1rem;\
            text-align: center;\
        \}\
        .actions a \{\
            display: inline-block;\
            margin-top: 0.5rem;\
            color: #4f46e5;\
            text-decoration: none;\
            font-size: 0.95rem;\
        \}\
        .error \{\
            color: red;\
            font-size: 0.85rem;\
            margin-bottom: 0.75rem;\
        \}\
    </style>\
</head>\
<body>\
    <div class="login-container">\
        <div class="logo">Microsite Dashboard</div>\
\
        @if ($errors->any())\
            <div class="error">\{\{ $errors->first() \}\}</div>\
        @endif\
\
        <form method="POST" action="\{\{ route('login') \}\}">\
            @csrf\
\
            <label for="email">Email</label>\
            <input type="email" id="email" name="email" value="\{\{ old('email') \}\}" required autofocus>\
\
            <label for="password">Password</label>\
            <input type="password" id="password" name="password" required>\
\
            <button type="submit">Log in</button>\
        </form>\
\
        <div class="actions">\
            @if (Route::has('password.request'))\
                <a href="\{\{ route('password.request') \}\}">Forgot your password?</a>\
            @endif\
            <br>\
            @if (Route::has('register'))\
                <a href="\{\{ route('register') \}\}">Create an account</a>\
            @endif\
        </div>\
    </div>\
</body>\
</html>}