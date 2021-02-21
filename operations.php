<?php
include "DBConnect.php";
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $q = "select * from user where id = $id";
    $res = $conn->query($q);
    $row = $res->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_GET['edit'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $q = "update user set fname='$fname', lname='$lname', email='$email',
    username='$username', password='$password' where id=$id ";
    if ($conn->query($q)) {
        header('location:showData.php');
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $q = "delete from user where id=$id";
    if ($conn->query($q)) {
        header('Location:showData.php');
    } else {
        echo "Error in deleting";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserForm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="col-lg-6 m-auto" style="border:5px solid grey">
        <form action="operations.php?edit=<?php echo $_GET['edit']; ?>" method="post">
            <div class="bg-dark">
                <h2 class="text-light text-center">Update User Details</h2>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="fname">First Name:</label>
                        <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="lname">Last Name:</label>
                        <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info" name="update">Update</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>