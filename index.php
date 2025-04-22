<?php
require_once "pet.php";

$pet = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? '';
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';

    if ($type && $name && $age) {
        switch ($type) {
            case 'dog':
                $pet = new Dog($name, $age);
                break;
            case 'cat':
                $pet = new Cat($name, $age);
                break;
            case 'bird':
                $pet = new Bird($name, $age);
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helsinki Petlainen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>The Ultimate Pet Shop</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Pet Name" required>

        <input type="number" name="age" placeholder="Pet Age" required>

        <select name="type" required>
            <option value="">Pet type</option>
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="bird">Bird</option>
        </select>

        <button type="submit">Add Pet</button>
    </form>

    <hr>

    <h3>Your Pets:</h3>
    <?php if ($pet): ?>
        <div class="pet-card">
            <p><b><?= $pet->greet() ?></b></p>
            <p><?= $pet->action() ?></p>
        </div>
    <?php endif; ?>

</div>
</body>
</html>
