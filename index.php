<?php
 include_once "dbactions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Task Details</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .modal1 {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buttonadd"])) {
            $taskname= $_POST["taskName"];
            $dscrptn= $_POST["taskDescription"];
            $sql="INSERT INTO `task_details`(`TASK_NAME`, `TASK_DESCRIPTION`) VALUES ('$taskname','$dscrptn')";
            setData($sql);
        }
        
    ?>
    <div class="container">
        <h1>Task List</h1>
        <button onclick="showAddModal()" class="btnadd">Add+</button>

        <!-- Modal for adding  tasks -->
        <div id="addModal" class="modal">
            <div class="modal-content">
                <span onclick="closeModal()" style="float: right; cursor: pointer;">&times;</span>
                <h2 id="modalTitle">Add Task</h2>
                <form id="taskForm" method="POST">
                    <label class="popuplabel" for="taskName">Task Name:</label>
                    <input class="popupinput" type="text" id="taskName" name="taskName" required><br>
                    <label class="popuplabel1" for="taskDescription">Task Description:</label>
                    <input class="popupinput" type="text" id="taskDescription" name="taskDescription" required><br>
                    <input type="submit" value="Submit" name="buttonadd"/>
                </form>
            </div>
        </div>

        <!-- Modal for adding  tasks -->
        <div id="editModal" class="modal1">
            <div class="modal-content">
                <span onclick="closeModal()" style="float: right; cursor: pointer;">&times;</span>
                <h2 id="modalTitle">Edit Task</h2>
                <form id="taskForm" method="POST">
                    <label class="popuplabel" for="taskNameedit">Task Name:</label>
                    <input class="popupinput" type="text" id="taskNameedit" name="taskNameedit"><br>
                    <label class="popuplabel1" for="taskDesedit">Task Description:</label>
                    <input class="popupinput" type="text" id="taskDesedit" name="taskDesedit"><br>
                    <input type="submit" value="Update" name="buttonedit" onclick="showEditModal()"/>
                </form>
            </div>
        </div>


        <?php
        $sql="SELECT * FROM `task_details`";
        $result = getData($sql);
        ?>
        <table>
            <tr>
                <th>Task Name</th>
                <th>Task Description</th>
                <th>Actions</th>
            </tr>
           
            <?php
            if ($result->num_rows > 0) 
                {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr id = "<?php echo $row["ID"]; ?>">
                        <td data-target="taskNameedit"><?php echo $row['TASK_NAME'];?></td>
                        <td data-targrt="taskDesedit"><?php echo $row['TASK_DESCRIPTION'];?></td>
                        <td>
                            <button class="btnedit" data-id="<?php echo $row['ID']; ?>" onclick="showEditModal(<?php echo $row['ID']; ?>)">Edit</button>
                            <button class="btndelete" type="button" name="button" onclick = "deletedata(<?php echo $row['ID']; ?>);">Delete</button>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            <!-- Add more rows as needed -->
        </table>
    </div>
        <script src="js/script.js"></script>
</body>
</html>