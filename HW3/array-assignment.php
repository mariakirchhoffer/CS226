<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
<?php
// Function to print array in a table
function printTable($array) {
    echo '<table class="table-auto w-full mb-8 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">';
    echo '<thead><tr class="bg-gray-200"><th class="px-4 py-2">Key</th><th class="px-4 py-2">Value</th></tr></thead>';
    echo '<tbody>';
    foreach ($array as $key => $value) {
        echo "<tr><td class='border px-4 py-2'>$key</td><td class='border px-4 py-2'>$value</td></tr>";
    }
    echo '</tbody></table>';
}

// A. Creating a one-dimensional associative array
$assocArray = [
    "one" => 10,
    "two" => 20,
    "three" => 30,
    "four" => 40,
    "five" => 50,
    "six" => 60,
    "seven" => 70,
    "eight" => 80,
    "nine" => 90,
    "ten" => 100
];

// B. Print out the array
printTable($assocArray);

// C. Filter array based on a criterion and print
// Criterion: Value greater than 50
echo "<p>Elements with values > 50:</p>";
$filteredArray = array_filter($assocArray, function($value) {
    return $value > 50;
});
printTable($filteredArray);

// D. Sort the array and print
asort($assocArray);
echo "<p>Sorted array by value:</p>";
printTable($assocArray);

// E. Unset the fourth element
$keys = array_keys($assocArray);
unset($assocArray[$keys[3]]);

// F. Print the reverse sorted array
arsort($assocArray);
echo "<p>Reverse sorted array:</p>";
printTable($assocArray);

// G. Print the array sorted by key
ksort($assocArray);
echo "<p>Array sorted by key:</p>";
printTable($assocArray);

// H. EXTRA CREDIT: Print 3 random elements
echo "<p>Three random elements:</p>";
$randomKeys = array_rand($assocArray, 3);
echo "<ul class='list-disc ml-8'>";
foreach ($randomKeys as $key) {
    echo "<li>{$assocArray[$key]}</li>";
}
echo "</ul>";
?>
</body>
</html>

