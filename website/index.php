<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Calculator</title>
</head>
<body>
    <form method="post" action="">
        <p>First Value:<br/>
        <input type="text" id="first" name="first" required></p>
        <p>Second Value:<br/>
        <input type="text" id="second" name="second" required></p>
        <input type="radio" name="operation" id="add" value="add" checked><label for="add">+</label><br/>
        <input type="radio" name="operation" id="subtract" value="subtract"><label for="subtract">-</label><br/>
        <input type="radio" name="operation" id="times" value="times"><label for="times">x</label><br/>
        <input type="radio" name="operation" id="divide" value="divide"><label for="divide">/</label><br/>
        <button type="submit" name="calculate" id="calculate">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first = $_POST['first'];
        $second = $_POST['second'];
        $operation = $_POST['operation'];

        if (is_numeric($first) && is_numeric($second)) {
            switch ($operation) {
                case "add":
                    $result = $first + $second;
                    break;
                case "subtract":
                    $result = $first - $second;
                    break;
                case "times":
                    $result = $first * $second;
                    break;
                case "divide":
                    if ($second != 0) {
                        $result = $first / $second;
                    } else {
                        $result = "Error: Division by zero";
                    }
                    break;
                default:
                    $result = "Invalid operation";
                    break;
            }
            echo "<p>Result: $result</p>";
        } else {
            echo "<p>Error: Please enter valid numeric values.</p>";
        }
    }
    ?>
</body>
</html>
