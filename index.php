<?php

include('database.php');

$sql = 'SELECT * FROM STUDENT';
$result = $conn->query($sql); //returns mysqli_result object



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
</head>
<body>
<?php include('views/nav.php') ?>

<section class="grid-layout-read">

    <div class="table-container">

        <table class="content-table">
            <thead>
                
                <tr>
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Birthday</th>
                    <th>Course</th>
                    <th>Learning Modal</th>
                    <th>Civil Status</th>
                    <th>Email</th>
                    <th>Emergency Contact</th>
                    <th>Update</th>            
                    <th>Delete</th>            
                </tr>
           
                
            </thead>
            <!-- 
                <tbody>
                    <tr>
                        <th>Id</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>Birthday</th>
                        <th>Course</th>
                        <th>Learning Modal</th>
                        <th>Civil Status</th>
                        <th>Email</th>
                        <th>Emergency Contact</th>
                    </tr>
                </tbody> -->
                <tbody>

                    <?php 


if($result->num_rows > 0){
    
    while($row = $result->fetch_assoc()) //$row = ['id' => 23, 'name' => '']; // row['name']
    {
        
        echo "
        <tr>
        <td>{$row['id']}</td>
        <td>{$row['firstname']}</td>
        <td>{$row['lastname']}</td>
        <td>{$row['sex']}</td>
        <td>{$row['age']}</td>
        <td>{$row['birthday']}</td>
        <td>{$row['course']}</td>
        <td>{$row['learningmodal']}</td>
        <td>{$row['civilstatus']}</td>
        <td>{$row['email']}</td>
        <td>{$row['emergencycontact']}</td>
                <td><a href='update.php?id={$row['id']}' class='update-button'><i class='fa-solid fa-pen-nib'></i></a></td>
                <td><a href='delete.php?id={$row['id']}' class='delete-button'><i class='fa-solid fa-trash'></i></a></td>
                </tr>  
                ";
                
            }
        }
        
        ?>
        </tbody>
        
        </table>
    </div>

    <section class="info-read">
        <h3 class="info-read__read">Read</h3>
        <p>You can read data the data here that is stored in the database.</p>

        <h3 class="info-read__update">Update</h3>
        <p>Click the update button to update the current record.</p>

        <h3 class="info-read__delete">Delete</h3>
        <p>Click the delete button to update the current record.</p>
    </section>
</section>

<?php 
include('views/footer.php');
?>
</body>
</html>