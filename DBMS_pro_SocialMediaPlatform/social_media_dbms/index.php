<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Platform DBMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            max-width: 1200px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2.5em;
            background: linear-gradient(45deg, #833AB4, #FD1D1D, #F56040);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            margin-bottom: 20px;
        }
        textarea {
            width: 100%;
            height: 120px;
            padding: 15px;
            border: 2px solid transparent;
            border-image: linear-gradient(45deg, #833AB4, #FD1D1D, #F56040) 1;
            border-radius: 10px;
            resize: vertical;
            font-size: 1em;
            font-family: 'Poppins', sans-serif;
            background: rgba(131, 58, 180, 0.1);
            color: #333;
            transition: border-image 0.3s, box-shadow 0.3s;
        }
        textarea:focus, textarea:hover {
            outline: none;
            border-image: linear-gradient(45deg, #FD1D1D, #F56040, #833AB4) 1;
            box-shadow: 0 0 8px rgba(253, 29, 29, 0.5);
        }
        textarea::placeholder {
            color: #666;
            opacity: 0.8;
        }
        button {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(45deg, #833AB4, #FD1D1D);
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 1.1em;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 10px;
        }
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Social Media Platform DBMS</h1>
        <form method="POST" action="results.php">
            <textarea name="sql_query" placeholder="Enter your SQL query here (e.g., SELECT * FROM users, no semicolon)" required></textarea>
            <br>
            <button type="submit">Run Query</button>
        </form>
    </div>
</body>
</html>