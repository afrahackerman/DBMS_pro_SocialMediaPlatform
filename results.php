<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Results - Social Media Platform DBMS</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: linear-gradient(45deg, #833AB4, #C13584);
            color: white;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .error {
            color: #D8000C;
            background: #FFD2D2;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            text-align: center;
        }
        .success {
            color: #4F8A10;
            background: #DFF2BF;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            text-align: center;
        }
        .back-button {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(45deg, #833AB4, #FD1D1D);
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 1.1em;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            margin-top: 20px;
            text-align: center;
        }
        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Query Results</h1>
        <?php
        session_start();

        // Redirect to index.php on page refresh
        if (isset($_SESSION['query_executed'])) {
            unset($_SESSION['query_executed']);
            header("Location: index.php");
            exit;
        }
        $_SESSION['query_executed'] = true;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sql_query = trim($_POST['sql_query']);
            $connection_string = "127.0.0.1:1521/XE";
            $username = "SYSTEM";
            $password = "afra";

            // Connection ekane with oxe
            $conn = oci_connect($username, $password, $connection_string);
            if (!$conn) {
                $e = oci_error();
                echo "<p class='error'>Connection failed: " . htmlentities($e['message']) . "</p>";
                exit;
            }

            // Parse and execute the query
            $stid = oci_parse($conn, $sql_query);
            if (!$stid) {
                $e = oci_error($conn);
                echo "<p class='error'>Parse error: " . htmlentities($e['message']) . "</p>";
                oci_close($conn);
                exit;
            }

            $r = oci_execute($stid);
            if (!$r) {
                $e = oci_error($stid);
                echo "<p class='error'>Execution error: " . htmlentities($e['message']) . "</p>";
                oci_free_statement($stid);
                oci_close($conn);
                exit;
            }

            // Check fo SELECT query
            if (stripos(trim($sql_query), 'SELECT') === 0) {
                echo "<table>";
                // col fetched
                $ncols = oci_num_fields($stid);
                echo "<tr>";
                for ($i = 1; $i <= $ncols; $i++) {
                    echo "<th>" . htmlentities(oci_field_name($stid, $i)) . "</th>";
                }
                echo "</tr>";

                // rows fetched
                while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                    echo "<tr>";
                    foreach ($row as $item) {
                    if ($item instanceof OCILob){
                        $value = $item->read($item->size()); // Read full CLOB content
                        } 
                        else {
                            $value = $item;
                        }
                        echo "<td>" . ($value !== null ? htmlentities($value) : " ") . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='success'>Query executed successfully (e.g., INSERT/UPDATE).</p>";
            }

            // Clean up
            oci_free_statement($stid);
            oci_close($conn);
        } else {
            echo "<p class='error'>No query submitted.</p>";
        }
        ?>
        <a href="index.php" class="back-button">Back to Query Page</a>
    </div>
</body>
</html>