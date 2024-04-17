<?php
function display_books_table(): void
{
    if (!empty($_SESSION['books'])) {
        echo "<table class='table-auto w-full mt-8'>";
        echo "<thead><tr><th class='border px-4 py-2'>Title</th><th class='border px-4 py-2'>Author</th><th class='border px-4 py-2'>Year Published</th></tr></thead>";
        echo "<tbody>";
        foreach ($_SESSION['books'] as $book) {
            echo "<tr>";
            echo "<td class='border px-4 py-2'>" . htmlspecialchars($book['title']) . "</td>";
            echo "<td class='border px-4 py-2'>" . htmlspecialchars($book['author']) . "</td>";
            echo "<td class='border px-4 py-2'>" . htmlspecialchars($book['year']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No books have been added yet.</p>";
    }
}
?>
