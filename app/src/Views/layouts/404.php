<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>404 Page not found</h1>
    <h4>Router</h4>
    <pre> <?= var_dump($requestUri, $params) ?></pre>
    <h4>Request</h4>
    <pre> <?= var_dump($_REQUEST) ?></pre>
    <h4>Server</h4>
    <pre> <?= var_dump($_SERVER) ?></pre>
</body>
</html>