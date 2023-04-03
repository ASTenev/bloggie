<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloggie App with Laravel 10</title>
</head>
<body>
    <h1>Bloggie App with Laravel 10</h1>
    <p>This is a mini blog app that allows users to register, log in, create posts, and delete posts. The app requires min PHP 8 and MySQL 8.</p>

    <h2>INSTALLATION</h2>
    <p>To install the app, follow these steps:</p>

    <ol>
        <li>Clone the project repository:</li>
        <pre><code>git clone https://github.com/ASTenev/bloggie</code></pre>

        <li>Configure the app settings and MySQL settings in the .env file.</li>

        <li>Install the project dependencies using Composer. This will also run migrations, app key and images directory creation:</li>
        <pre><code>composer install</code></pre>

        <li>You can seed the database with some data if you want:</li>
        <pre><code>php artisan db:seed</code></pre>

        <li>Open in browser and enjoy!</li>
    </ol>
</body>
</html>
