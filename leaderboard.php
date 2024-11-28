<?php
include('db.php');

// Fetch leaderboard data
$sql = "SELECT u.username, l.score, l.attempted_at FROM leaderboard l
        JOIN users u ON l.user_id = u.id
        ORDER BY l.score DESC LIMIT 10";
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
            <th>Username</th>
            <th>Score</th>
            <th>Attempted At</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['score']; ?></td>
                <td><?php echo $row['attempted_at']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
