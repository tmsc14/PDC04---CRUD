<?php

include "db_connection.php";

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

    <head>

        <title>View Page</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>

    <body>

        <div class="container">

            <h2>users</h2>

            <table class = "table">

                <thread>

                    <tr>

                        <th>ID</th>

                        <th>First Name</th>

                        <th>Last Name</th>

                        <th>Email</th>

                        <th>Gender</th>

                        <th>Action</th>

                    </tr>

                </thread>

                <tbody>

                    <?php

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                    
                    ?>

                            <tr>

                                <td><?php echo $row ['user_id']; ?></td>
                                
                                <td><?php echo $row ['first_name']; ?></td>
                                
                                <td><?php echo $row ['last_name']; ?></td>
                                
                                <td><?php echo $row ['email']; ?></td>
                                
                                <td><?php echo $row ['level']; ?></td>
                                
                                <td><a class="btn btn-info" href="update.php?user_id=<?php echo $row['user_id'];?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['user_id'];?>">Delete</a></td>
                            
                            </tr>

<?php                       }

                        }

                        ?>

                </tbody>

            </table>

        </div>

    </body>
    
</html>