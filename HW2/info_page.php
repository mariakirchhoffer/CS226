<?php
$name = 'Maria Kirchhoffer';
$credits = 9;
$decimalValue = 3.56;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Variable Info</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
<div class="container mx-auto p-8">
    <h1 class="text-3xl mb-4 text-gray-900">Welcome, <?php echo $name; ?>!</h1>
    <?php
    $status = $credits >= 12 ? "FULL TIME STUDENT" : "PART TIME STUDENT";
    echo "<p class='mb-4 font-bold'>" . $status . "</p>";
    ?>
    <table class="table-auto w-full mb-8 bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-700 text-white">
        <tr>
            <th class="px-4 py-2">Type</th>
            <th class="px-4 py-2">Value</th>
        </tr>
        </thead>
        <tbody class="text-gray-700">
        <tr>
            <td class="border px-4 py-2"><?php echo gettype($name); ?></td>
            <td class="border px-4 py-2"><?php echo $name; ?></td>
        </tr>
        <tr>
            <td class="border px-4 py-2"><?php echo gettype($credits); ?></td>
            <td class="border px-4 py-2"><?php echo $credits; ?></td>
        </tr>
        <tr>
            <td class="border px-4 py-2"><?php echo gettype($decimalValue); ?></td>
            <td class="border px-4 py-2"><?php echo $decimalValue; ?></td>
        </tr>
        </tbody>
    </table>

    <footer class="text-gray-600">
        <p>File Name: <?php echo basename(__FILE__); ?></p>
        <p>Server Software: <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Not Available'; ?></p>
        <p>Host IP Address: <?php echo $_SERVER['SERVER_ADDR'] ?? 'Not Available'; ?></p>
        <p>Browser: <?php echo $_SERVER['HTTP_USER_AGENT'] ?? 'Not Available'; ?></p>
    </footer>
</div>
</body>
</html>