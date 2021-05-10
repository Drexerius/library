<?php
    require '../modules/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <form method="post" action="../modules/add_user.php" style="margin-top: 50px;">
        <fieldset>
            <p><input type="text" name="login" placeholder="Login" required = true></p>
            <p><input type="text" name="name" placeholder="Name"></p>
            <p><input type="text" name="surname" placeholder="Surname"></p>
            <p><input type="date" name="birth" placeholder="Birth"></p>
            <p><input type="number_format" name="phone" placeholder="Phone"></p>
            <p><input type="email" name="email" placeholder="Email"></p>
            <p><input type="password" name="password" placeholder="Password" required = true></p>
            <p><input type="submit" value="Register"></p>
        </fieldset>
    </form>

    <table border="1">
        <tr>
            <td>Name</td>
            <td>Surname</td>
            <td>Birth</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Edit</td>
        </tr>
        <?php if (count(getUsers()) === 0) { ?>
            <tr>
                <td colspan="6">No users found</td>
            </tr>
        <?php } else { foreach ($users = getUsers() as $user) { ?>
            <tr>
                <td><?= $user['name']; ?></td>
                <td><?= $user['surname']; ?></td>
                <td><?= $user['birth']; ?></td>
                <td><?= $user['phone']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="../modules/edit_user.php?id=<?= $user['id']; ?>">Edit</a> /
                    <a href="../modules/delete_user.php?id=<?= $user['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } } ?>
    </table>

    <button><a href="../index.php">Return</a></button>
</body>
</html>

<?php


function getUsers(): array
{
    global $db;

    $users = [];

    $result = mysqli_query($db, "SELECT * FROM users");
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $users[] = mysqli_fetch_assoc($result);
    }

    return $users;
}
?>