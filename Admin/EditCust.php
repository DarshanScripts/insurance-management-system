<?php
session_start();

if (isset($_SESSION['sesLogin']['btnLogin'])) {
    $uId = $_SESSION['sesCustId'];

    require_once '../Database/DBConnection.php';
    $sql = "SELECT * FROM User WHERE uId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $uId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";

        $fName = $row['firstName'];
        $lName = $row['lastName'];
        $email = $row['email'];
    }



    if (isset($_POST['btnUpdPro'])) {

        //    validations
        //    first name
        if (!preg_match('/^[A-Z][a-z]{1,15}$/', $fName))
            echo "<script>alert('First character of name should be capital & length should be between 2-15 characters!');</script>";

        //    last name
        if (!preg_match('/^[A-Z][a-z]{1,15}$/', $lName))
            echo "<script>alert('First character of name should be capital & length should be between 2-15 characters!');</script>";

        //    email
        elseif (!preg_match("/^[a-z][a-z0-9]+@(gmail|outlook|hotmail|yahoo|icloud)[.](com|in)$/", $email))
            echo "<script>alert('Email format is incorrect!');</script>";

        else {
            require_once '../Database/DBConnection.php';
            $sql = "UPDATE User SET firstName = ?, lastName = ?, email = ? WHERE email = '$email'";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sss', $fName, $lName, $email);
            $fName = $_POST['txtFName'];
            $lName = $_POST['txtLName'];
            $email = $_POST['txtEmail'];
            $stmt->execute();
            if ($stmt)
                echo "<script>alert('Profile Updated Successful!');window.location.replace('./Dashboard.php');</script>";
            else
                echo "<script>alert('Profile not Updated!');</script>";
        }
    }
?>


    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>ABC Insurance</title>
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/style.css">
        <style>
            a {
                font-size: 25px;
                float: right;
                padding-right: 30px;
                padding-top: 15px;
                text-decoration: none;
            }
        </style>
        <script>
            function hideShowPassword() {
                var pass = document.getElementById("pass");
                if (pass.type === "password")
                    pass.type = "text";
                else
                    pass.type = "password";
            }
        </script>
    </head>

    <body>
        <h1>
            &emsp;ABC Insurance
            <a href="../Logout.php">Logout</a>
            <a href="./Dashboard.php">Homepage</a>
        </h1>
        <hr>
        <form method="POST">
            <!-- First Name input -->
            <div class="form-outline mb-3">
                <input type="text" name="txtFName" class="form-control" required="" value="<?php echo $fName ?>" <?php if (!isset($_POST['btnEdit'])) echo ' disabled'; ?> />
                <label class="form-label" for="form2Example1">First Name</label>
            </div>

            <!-- Last Name input -->
            <div class="form-outline mb-3">
                <input type="text" name="txtLName" class="form-control" required="" value="<?php echo $lName ?>" <?php if (!isset($_POST['btnEdit'])) echo ' disabled'; ?> />
                <label class="form-label" for="form2Example1">Last Name</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-3">
                <input type="text" name="txtEmail" class="form-control" required="" value="<?php echo $email ?>" <?php if (!isset($_POST['btnEdit'])) echo ' disabled'; ?> />
                <label class="form-label" for="form2Example1">Email Address</label>
            </div>

            <!-- Submit button -->
            <button type="submit" name="btnEdit" class="btn btn-primary btn-block mb-4" <?php if (isset($_POST['btnEdit'])) echo ' disabled'; ?>>Edit</button>
            <button type="submit" name="btnUpdPro" class="btn btn-primary btn-block mb-4" <?php if (!isset($_POST['btnEdit'])) echo ' disabled'; ?>>Update Profile</button>

        </form>

    </body>

    </html>
<?php
} else
    echo "Please <a href='../Login.php'>Login</a> first!";
?>