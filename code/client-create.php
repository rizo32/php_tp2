<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            display: block;
            margin: 5px;
        }
    </style>
</head>
<body>
    <main>
        <form action="client-store.php" method="POST">
            <label>Nom
                <input type="text" name="nom">
            </label>
            <label>Adress
                <input type="text" name="adress">
            </label>
            <label>Postal Code
                <input type="text" name="postal_code">
            </label>
            <label>Courriel
                <input type="email" name="courriel">
            </label>
            <input type="submit" value="save">
        </form>
    </main>
</body>
</html>
