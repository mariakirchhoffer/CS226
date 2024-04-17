<?php
session_start();

if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [];
}

$error = '';

if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $year = trim($_POST['year']);

    if (empty($title) || empty($author) || !preg_match('/^\d{4}$/', $year)) {
        $error = 'Please fill in all fields correctly with valid data.';
    } else {
        $_SESSION['books'][] = ['title' => $title, 'author' => $author, 'year' => $year];
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8">
<?php if ($error): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline"><?= htmlspecialchars($error) ?></span>
    </div>
<?php endif; ?>

<form action="index.php" method="post" class="space-y-4">
    <div>
        <label for="title" class="block">Title:</label>
        <input type="text" id="title" name="title" required class="border-gray-300 border rounded p-2 w-full">
    </div>
    <div>
        <label for="author" class="block">Author:</label>
        <input type="text" id="author" name="author" required class="border-gray-300 border rounded p-2 w-full">
    </div>
    <div>
        <label for="year" class="block">Year Published:</label>
        <input type="text" id="year" name="year" required pattern="\d{4}" class="border-gray-300 border rounded p-2 w-full">
    </div>
    <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Submit
    </button>
</form>

<?php include 'display_books.php'; ?>
<?php display_books_table(); ?>
</body>
</html>
