<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .flex {
            display: flex;
        }
        .input {
            padding: 10px;
            background-color: white;
            border: 1px solid #ccc;
            color: black;
            border-radius: 5px 0 0 5px;
            cursor: pointer;
            width: 250px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #00cc66;
            border: none;
            color: white;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="./action.php" method="POST" class="flex">
        <input class="input" name="name" placeholder="Find your perfect company Name"/>
        <button class="btn">Search</button>
    </form>
</body>
</html>