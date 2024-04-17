<?php

function insertBook($title, $author_name, $year)
{
// Database connection details
/* definitions from external file 

define ('DB_hostname', "localhost");
define ('DB_user', "lavrov"); //Your username
define ('DB_pass', "******"); //Your password
define ('DB_name', "lavrov1_"); //Your database

*/


// Create connection
$conn = mysqli_connect(DB_hostname, DB_user, DB_pass , DB_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    // Check if author exists
    $sql_author = "SELECT author_id FROM Authors WHERE name = ?";
    $stmt_author = $conn->prepare($sql_author);
    $stmt_author->bind_param("s", $author_name);
    $stmt_author->execute();
    $result_author = $stmt_author->get_result();

    if ($result_author->num_rows > 0) {
        // Author exists, get author_id
        $row = $result_author->fetch_assoc();
        $author_id = $row['author_id'];
    } else {
        // Author doesn't exist, insert new author
        $sql_new_author = "INSERT INTO Authors (name) VALUES (?)";
        $stmt_new_author = $conn->prepare($sql_new_author);
        $stmt_new_author->bind_param("s", $author_name);
        $stmt_new_author->execute();
        $author_id = $stmt_new_author->insert_id;
        $stmt_new_author->close();
    }

    $stmt_author->close();

    // Insert new book with author_id
    $sql_book = "INSERT INTO BooksList (title, author_id, year) VALUES (?, ?, ?)";
    $stmt_book = $conn->prepare($sql_book);
    $stmt_book->bind_param("sii", $title, $author_id, $year);

    if ($stmt_book->execute()) {
        echo "New book inserted successfully!";
    } else {
        echo "Error: " . $stmt_book->error;
    }

    $stmt_book->close();
    $conn->close();
}