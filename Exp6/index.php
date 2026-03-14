<?php
include 'db.php';

$tablecreate = "CREATE TABLE IF NOT EXISTS ENTRIES (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL,
    session_name VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
)"; 
// Ensure table exists
    mysqli_query($connection, $tablecreate);

$message = '';
if(isset($_POST['submit'])) {

    include 'db.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $session = $_POST['session'];

    $query = "INSERT INTO ENTRIES (name, email, session_name, created_at)
              VALUES ('$name', '$email', '$session', NOW())";

    if(mysqli_query($connection, $query)){
        echo "Sign-up saved successfully.". "<br>" . $query;
    } else {
        echo "Error: " . mysqli_error($connection);
    }

}

$result = mysqli_query($connection, 'SELECT * FROM ENTRIES ORDER BY created_at DESC LIMIT 100');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exp6 Attendance</title>
    
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        h1 { color: #2a5d9f; }
        form { max-width: 420px; margin-bottom: 18px; }
        form input { width: 100%; padding: 8px; margin: 6px 0; box-sizing: border-box; }
        button { background: #2a5d9f; color: white; padding: 8px 14px; border: 0; cursor: pointer; }
        table { border-collapse: collapse; width: 100%; max-width: 780px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 8px 10px; text-align: left; }
    </style>
</head>
<body>
    <h1>Attendance Entry</h1>

    <?php if ($message !== ''): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form name="signupForm" method="post" action="" onsubmit="return validateForm();">
        <label>Name</label><br>
        <input type="text" name="name"><br>
        <label>Email</label><br>
        <input type="email" name="email"><br>
        <label>Session</label><br>
        <input type="text" name="session" placeholder="e.g. PHP Basics"><br><br>
        <input type="submit" name="submit" value="Sign Up">
    </form>

    <h2>Recent Sign-ups</h2>
    <table>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Session</th><th>Time</th></tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <!-- htmlspecialchars() -->
                <td><?php echo $row['id']; ?></td> 
                <td><?php echo ($row['name']); ?></td>
                <td><?php echo ($row['email']); ?></td>
                <td><?php echo ($row['session_name']); ?></td>
                <td><?php echo ($row['created_at']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>


    <script>
        function validateForm() {
            const form = document.forms['signupForm'];
            const name = form['name'].value.trim();
            const email = form['email'].value.trim();
            const session = form['session'].value.trim();

            if (!name || !email || !session) {
                alert('All fields are required.');
                return false;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Invalid email format.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
<?php mysqli_close($connection); ?>