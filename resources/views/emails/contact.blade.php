<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            background-color: #f7fafc;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
        }
        .logo {
            display: block;
            margin: 0 auto;
            width: 100px;
            height: 100px;
            background-image: url('https://example.com/logo.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }
        h1 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
        }
        p {
            margin-bottom: 1rem;
            text-align: center;
        }
        table {
            width: 100%;
            margin-top: 2rem;
            border-collapse: collapse;
        }
        th {
            padding: 0.5rem;
            text-align: left;
            background-color: #f7fafc;
            border-bottom: 1px solid #e2e8f0;
        }
        td {
            padding: 0.5rem;
            border-bottom: 1px solid #e2e8f0;
        }
    </style>
</head>
<body>
<section class="w-4/5 px-6 py-8 mx-auto bg-white dark:bg-amber-100">
    <header>
        <a href="#">
            <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/full-logo.svg" alt="">
        </a>
    </header>

    <main class="mt-8">
        <h2 class="text-black dark:text-black font-bold text-2xl">{{ $contactData['name'] }},</h2>

        <p class="mt-2 leading-loose text-gray-600 dark:text-black">
            {{ $contactData['message'] }}
        </p>


    </main>


    <footer class="mt-8">
        <p class="text-gray-500 dark:text-gray-600">
            This email was sent from <a href="#" class="text-blue-600 hover:underline dark:text-blue-400" target="_blank">{{ $contactData['email'] }}</a>.
        </p>

    </footer>
</section>
</body>
</html>
