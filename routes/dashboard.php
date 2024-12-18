<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header('location: ../');
}
$userdata = $_SESSION['userdata'];

$groupdata = $_SESSION['groupsdata'];

if ($_SESSION['userdata']['status'] == 0) {
    $status = "<b style='color:red'>Not voted</b>";
} else {
    $status = '<b style="color:green">Voted</b>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dahboard</title>
    <style>
        body {
            background-color: rgb(153, 204, 249);

        }

        .button-container {
            display: flex;
            justify-content: space-between;
            /* Aligns items to the extreme left and right */
            margin: 20px;
            /* Optional: adds some margin around the container */
            padding: 0.1rem;
        }

        .profile {
            background-color: aliceblue;
            width: 30%;
            padding: 2rem;
            float: left;
        }

        .group {
            background-color: aliceblue;

            width: 50%;
            padding: 2rem;
            float: right;
        }

        img {
            align-items: center;
            float: right;
        }

        .votebtn {
            margin-top: 1rem;
            margin-bottom: 0.5rem;
            padding: 0.5rem;
            border-radius: 0.5rem;
            background-color: rgb(105, 105, 214);
        }

        .voted {
            margin-top: 1rem;
            margin-bottom: 0.5rem;
            padding: 0.5rem;
            border-radius: 0.5rem;
            background-color: rgb(99, 247, 180);

        }
    </style>
</head>

<body>

    <center>
        <h1>Dashboard</h1>
    </center>

    <div class="button-container">
        <button class="votebtn"><a href="../">Back</a></button>
        <button class="votebtn"><a href="logout.php">Logout</a></button>
    </div>
    <hr>



    <div class="profile">
        <img src="../uploads/<?php echo $userdata['photo'] ?>" alt="img" height="100" width="100"><br>
        <b>Name: </b><?php echo $userdata['name'] ?><br>
        <b>Phone: </b><?php echo $userdata['mobile'] ?><br>
        <b>Address: </b><?php echo $userdata['address'] ?><br>
        <b>Status: </b><?php echo $status ?><br>

    </div>

    <div class="group">

        <?php

        if ($_SESSION['groupsdata']) {
            for ($i = 0; $i < count($groupdata); $i++) {
        ?>
                <div>
                    <img src="../uploads/<?php echo $groupdata[$i]["photo"] ?>" alt="" height="100" width="100">
                    <b>Group Name:</b> <?php echo $groupdata[$i]["name"] ?><br>
                    <b>Votes:</b> <?php echo $groupdata[$i]["votes"] ?><br>
                    <form action="../api/vote.php" method="post">

                        <input type="hidden" name="gvotes" value="<?php echo $groupdata[$i]["votes"]; ?>">
                        <input type="hidden" name="gid" value="<?php echo $groupdata[$i]["id"]; ?>">
                        <?php
                        if ($_SESSION['userdata']['status'] == 0) {
                        ?>
                            <input type="submit" name="votebtn" value="vote" class="votebtn">

                        <?php
                        } else {
                        ?>
                            <button disabled type="btn" name="votebtn" value="vote" class="voted">Voted</button>

                        <?php
                        }
                        ?>
                    </form>
                </div>
                <hr>
        <?php
            }
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        }
        ?>

    </div>

</body>

</html>