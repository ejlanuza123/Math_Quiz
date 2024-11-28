<?php
include("db.php");

// Query to get the top 10 scorers
$sql = "SELECT users.username, scores.score FROM scores
        JOIN users ON scores.user_id = users.id
        ORDER BY scores.score DESC
        LIMIT 10";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
</head>
<body>
    <h1>Leaderboard</h1>
    <table border="1">
        <tr>
            <th>Rank</th>
            <th>Username</th>
            <th>Score</th>
        </tr>
        <?php
        $rank = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $rank++ . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['score'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="quiz.php">Back to Quiz</a>
</body>
</html>
