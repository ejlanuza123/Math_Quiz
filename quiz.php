<?php


// Start session for user authentication
session_start();
include ("db.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Define math questions and answers
$questions = [
    [
        "question" => "What is the solution to the equation 3x + 5 = 20?",
        "options" => ["x = 5", "x = 15", "x = 10", "x = 20"],
        "answer" => 0 // x = 5
    ],
    [
        "question" => "Simplify: (2x + 3)(x - 4)",
        "options" => ["2x² - 8x - 12", "2x² - 5x - 12", "2x² - 5x + 12", "2x² + 8x - 12"],
        "answer" => 1 // 2x² - 5x - 12
    ],
    [
        "question" => "What is the area of a triangle with base 10 cm and height 6 cm?",
        "options" => ["30 cm²", "60 cm²", "40 cm²", "20 cm²"],
        "answer" => 0 // 30 cm²
    ],
    [
        "question" => "If the function f(x) = 2x² + 3x - 5, what is f(2)?",
        "options" => ["9", "13", "7", "15"],
        "answer" => 2 // 7
    ],
    [
        "question" => "What is the slope of the line that passes through the points (3, 7) and (6, 11)?",
        "options" => ["2", "1", "4/3", "4"],
        "answer" => 1 // 1
    ],
    [
        "question" => "Solve for x: 5x - 2 = 3x + 10",
        "options" => ["x = 6", "x = -6", "x = 8", "x = -8"],
        "answer" => 0 // x = 6
    ],
    [
        "question" => "What is the quadratic formula used to solve ax² + bx + c = 0?",
        "options" => [
            "-b ± √(b² - 4ac) / 2a",
            "b ± √(b² - 4ac) / 2a",
            "-b ± √(4ac - b²) / 2a",
            "-b ± √(b² + 4ac) / a"
        ],
        "answer" => 0 // -b ± √(b² - 4ac) / 2a
    ],
    [
        "question" => "What is the volume of a sphere with a radius of 3 cm? (Use π ≈ 3.14)",
        "options" => [
            "113.04 cm³",
            "113.1 cm³",
            "113.2 cm³",
            "112.9 cm³"
        ],
        "answer" => 0 // 113.04 cm³
    ],
    [
        "question" => "If sin(θ) = 3/5 and θ is in the first quadrant, what is cos(θ)?",
        "options" => ["4/5", "-4/5", "3/5", "-3/5"],
        "answer" => 0 // 4/5
    ],
    [
        "question" => "What is the sum of the interior angles of a hexagon?",
        "options" => ["720°", "540°", "600°", "900°"],
        "answer" => 0 // 720°
    ]
];

// Initialize score
$score = 0;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($questions as $index => $question) {
        if (isset($_POST["question$index"]) && $_POST["question$index"] == $question['answer']) {
            $score++;
        }
    }

    // Save score to database
    $stmt = $conn->prepare("INSERT INTO scores (user_id, score) VALUES (?, ?)");
    $stmt->bind_param("ii", $_SESSION['user_id'], $score);
    $stmt->execute();
    $stmt->close();

    echo "<h2>Your Score: $score/" . count($questions) . "</h2>";
    echo '<a href="index.php">Try Again</a>';
    echo '<a href="leaderboard.php">View Leaderboard</a>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Quiz</title>
</head>
<body>
    <h1>High School Math Quiz</h1>
    <form method="post" action="">
        <?php foreach ($questions as $index => $question): ?>
            <fieldset>
                <legend><?php echo $question['question']; ?></legend>
                <?php foreach ($question['options'] as $optionIndex => $option): ?>
                    <label>
                        <input type="radio" name="question<?php echo $index; ?>" value="<?php echo $optionIndex; ?>">
                        <?php echo $option; ?>
                    </label><br>
                <?php endforeach; ?>
            </fieldset>
        <?php endforeach; ?>
        <input type="submit" value="Submit">
    </form>
    <a href="leaderboard.php">View Leaderboard</a>
    <a href="logout.php">Logout</a>
</body>
</html>
