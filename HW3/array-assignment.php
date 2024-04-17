<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Operations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<?php

// Function to print array in a table using Tailwind CSS for styling
function printTable($array, $title = 'Array Table') {
    echo "<div class='mb-8'><h2 class='text-lg font-bold mb-2'>$title</h2>";
    echo '<div class="overflow-x-auto"><table class="min-w-full table-auto bg-white rounded-lg overflow-hidden">';
    echo '<thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal"><tr>';
    echo '<th class="py-3 px-6 text-left">Key</th>';
    echo '<th class="py-3 px-6 text-left">Type</th>';
    echo '</tr></thead>';
    echo '<tbody class="text-gray-600 text-sm font-light">';
    foreach ($array as $key => $value) {
        echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
        echo "<td class='py-3 px-6 text-left whitespace-nowrap'>" . ucfirst($key) . "</td>";
        echo "<td class='py-3 px-6 text-left'>" . ucfirst($value) . "</td>";
        echo '</tr>';
    }
    echo '</tbody></table></div></div>';
}

// A. Creating a one-dimensional associative array with fruits and vegetables
$assocArray = [
    "apple" => "fruit",
    "banana" => "fruit",
    "carrot" => "vegetable",
    "date" => "fruit",
    "eggplant" => "vegetable",
    "fig" => "fruit",
    "grape" => "fruit",
    "honeydew" => "fruit",
    "iris" => "vegetable",
    "jackfruit" => "fruit"
];

// B. Print out the original array
printTable($assocArray, 'Original Array');

// C. Filter array based on the new criterion: Key starts with a letter before 'M'
echo "<p>Elements with keys starting with a letter before 'M':</p>";
$filteredArray = array_filter($assocArray, function($key) {
    return strtolower($key[0]) < 'm';
}, ARRAY_FILTER_USE_KEY);
printTable($filteredArray, 'Filtered Array (Key Starts Before \'M\')');

// D. Sort the array by value and print
asort($assocArray);
printTable($assocArray, 'Sorted Array by Type');

// F. Print the reverse sorted array
arsort($assocArray);
printTable($assocArray, 'Reverse Sorted Array by Type');

// G. Print the array sorted by key
ksort($assocArray);
printTable($assocArray, 'Array Sorted by Key');

// H. EXTRA CREDIT: Print 3 random elements
$randomKeys = array_rand($assocArray, 3);
echo "<h2 class='text-lg font-bold mb-2'>Three Random Elements</h2><ul class='list-disc pl-8 mb-8'>";
foreach ($randomKeys as $key) {
    echo "<li>" . ucfirst($key) . " - " . ucfirst($assocArray[$key]) . "</li>";
}
echo "</ul>";

?>

</body>
</html>
