<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Library Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4">
    <?php
    // Database connection details
    define('DB_hostname', "localhost");
    define('DB_user', "kirchhoffer"); // Update with your username
    define('DB_pass', "maria2186"); // Update with your password
    define('DB_name', "kirchhoffer_"); // Update with your database name

    // Include the insertBook function from the external file
    require_once('insertBooksFunction.php');

    // Check if form data has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title']) && isset($_POST['author_name']) && isset($_POST['year'])) {
        // Insert book into the database
        insertBook($_POST['title'], $_POST['author_name'], $_POST['year']);

        // Redirect to the same page to prevent form re-submission on refresh
        header("Location: " . htmlspecialchars($_SERVER["PHP_SELF"]));
        exit;
    }
    // Function to display books
    function displayBooks() {
        // Create database connection
        $conn = new mysqli(DB_hostname, DB_user, DB_pass, DB_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch books and their authors
        $sql = "SELECT BooksList.title, BooksList.year, Authors.name AS author_name FROM BooksList JOIN Authors ON BooksList.author_id = Authors.author_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Start table
            echo "<div class='mt-8'><table class='table-auto w-full'><thead><tr class='bg-gray-200 text-gray-600 uppercase text-sm leading-normal'><th class='py-3 px-6 text-left'>Title</th><th class='py-3 px-6 text-left'>Year</th><th class='py-3 px-6 text-left'>Author</th></tr></thead><tbody>";
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr class='border-b border-gray-200 hover:bg-gray-100'><td class='py-3 px-6 text-left whitespace-nowrap'>".$row["title"]."</td><td class='py-3 px-6 text-left'>".$row["year"]."</td><td class='py-3 px-6 text-left'>".$row["author_name"]."</td></tr>";
            }
            echo "</tbody></table></div>";
        } else {
            echo "0 results found";
        }

        $conn->close();
    }

    // Display books
    displayBooks();
    ?>

    <!-- Form for adding new books -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Add a New Book</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="space-y-4">
            <div>
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" name="title" id="title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="author_name" class="block text-gray-700 text-sm font-bold mb-2">Author Name:</label>
                <input type="text" name="author_name" id="author_name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="year" class="block text-gray-700 text-sm font-bold mb-2">Year:</label>
                <input type="number" name="year" id="year" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Book</button>
        </form>
    </div>
</div>
</body>
</html>
