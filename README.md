# Math Quiz Web Application

## Overview

This is a web-based math quiz application that allows users to answer multiple-choice questions, receive a score upon submission, and view a leaderboard. The application supports user authentication, stores quiz results in a database, and provides an interactive interface to answer the questions.

## Features

- **User Authentication**: Users can log in to the application.
- **Math Quiz**: A series of 10 math questions, with multiple-choice options.
- **Score Calculation**: Users are graded based on correct answers.
- **Leaderboard**: After submission, users can view the leaderboard to compare scores.
- **Responsive Design**: The web page is designed to work on both desktop and mobile devices.
- **Database Integration**: Quiz results and user data are stored in a database.

## Installation

Follow these steps to set up the project locally:

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/Math_Quiz.git
   ```

2. Navigate to the project directory:

   ```bash
   cd Math_Quiz
   ```

3. Ensure you have a PHP and MySQL server running. You can use tools like XAMPP or WAMP to set up a local server.

4. Import the database schema. You can use the `db.php` file to set up the database connection. Make sure your `db.php` contains the correct database credentials.

5. Open the `index.php` file in your browser by navigating to `localhost` (or your local server URL).

## Usage

1. **Login**: Before starting the quiz, users must log in with their credentials.
2. **Quiz**: After logging in, users will be presented with 10 math questions to answer.
3. **Submit**: Upon submitting the quiz, the user's score will be calculated and stored in the database.
4. **Leaderboard**: Users can view the leaderboard to see their rank and compare scores with others.

## Files Structure

- **`quiz.php`**: Main page displaying the math quiz.
- **`db.php`**: Database connection file where database credentials are stored.
- **`leaderboard.php`**: Page to view the leaderboard.
- **`login.php`**: User login page.
- **`logout.php`**: Logs out the user from the session.
- **`score.php`**: Displays the user's score after submission.

## Database Schema

The application uses a MySQL database to store user information and quiz results.

### Tables:
1. **Users**:
   - `user_id` (INT, AUTO_INCREMENT)
   - `username` (VARCHAR)
   - `password` (VARCHAR)

2. **Scores**:
   - `score_id` (INT, AUTO_INCREMENT)
   - `user_id` (INT, Foreign Key)
   - `score` (INT)

Make sure to set up the tables accordingly in your MySQL database.

## Dependencies

- PHP >= 7.0
- MySQL
- A web server (Apache, Nginx, etc.)

## Contributing

If you'd like to contribute to the project:

1. Fork the repository.
2. Create a new branch.
3. Make your changes.
4. Submit a pull request.


