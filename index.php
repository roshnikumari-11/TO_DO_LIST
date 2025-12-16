<?php 
session_start();
include 'connection.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="shortcut icon" href="asset/image/list.png" type="image/x-icon">

    <!-- CSS LINK -->
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="heading">
        <h2>My Own To-DO list</h2>
    </div>

    <form action="connection.php" method="POST">
        <?php if(isset($_SESSION['error'])) { ?>
            <p><?php echo $_SESSION['error']; ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php } ?>
        <input type="text" name="task" class="task_input">
        <input type="date" name="date" class="date_input">
        <button type="submit" class="task_btn" name="submit">Add Task</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Task</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $i = 1;
                if (isset($tasks) && $tasks && mysqli_num_rows($tasks) > 0) {
                    while ($row = mysqli_fetch_array($tasks)) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="task"><?php echo $row['task']; ?></td>
                            <td class="date"><?php echo $row['date']; ?></td>
                            <td class="delete">
                                <a href="index.php?delete=<?php echo $row['id']; ?>">X</a>
                            </td>
                        </tr>
                    <?php $i++;
                    }
                } else { ?>
                    <tr>
                        <td colspan="4" style="text-align:center">No tasks found. <br>
                            <img src="asset/image/satisfaction.png" alt="" width="200px">
                        </td>
                    </tr>
                <?php } ?>
            
        </tbody>

    </table>
</body>
</html>