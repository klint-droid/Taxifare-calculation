<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: monospace;
            background: #f4f4f4;
            max-width: 500px;
            margin: 50px auto;
            padding: 25px;
            border: 2px solid black;
            border-radius: 10px;
            background-color: white;
        }
        h2{
            text-align: center;
            color: blue;
        }
        form{
            display: flex;
            flex-direction: column;
        }
        label{
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"]{
            padding: 5px;
            border: 1px solid black;
            border-radius: 5px;
            font-size: 2em;
        }
        button{
            background: blue;
            color: white;
            border: none;
            padding: 10px;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer
        }
        button:hover{
            background: black;
            color: white;
        }
    </style>
</head>
<body>
    <div>
        <h2>Taxiride Input</h2>
        <form action="taxifare.php" method="post">
            <label>Name: </label>
            <input type="text" name="name" required/>
            <label>Distance Traveled:</label>
            <input type="number" name="distance" required/>
            <label>Waiting Time:</label>
            <input type="number" name="waiting" required/>
            <label><input type="checkbox" name="night"/>Night Time Trip?</label>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>