<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <header>
        <h1>Welcome to My Blog</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

    <main>
        <?php
        // PHP code to fetch and display blog posts from the database

        // Assuming you have already established a database connection
        $host = 'localhost';
        $username = 'your_username';
        $password = 'your_password';
        $database = 'your_database';

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the blog posts from the database
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Loop through each row and display the blog post
            while ($row = $result->fetch_assoc()) {
                echo '<div>';
                echo '<h2>' . $row['title'] . '</h2>';
                echo '<p>' . $row['content'] . '</p>';
                echo '</div>';
            }
        } else {
            echo 'No blog posts found.';
        }

        $conn->close();
        ?>
    </main>

    <footer>
        <p>© <?php echo date('Y'); ?> My Blog. All rights reserved.</p>
    </footer>
</body>
</html>
