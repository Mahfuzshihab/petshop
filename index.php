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
        <label>Pet Name:</label>
        <input type="text" name="name" required>

        <label>Pet Age:</label>
        <input type="number" name="age" required>

        <label>Pet Type:</label>
        <select name="type" required>
            <option value="">-- Select --</option>
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
            <p><strong><?= $pet->greet() ?></strong></p>
            <p><em><?= $pet->action() ?></em></p>
        </div>
    <?php endif; ?>

</div>
</body>
</html>
