const modal = document.getElementById('addModal');
function showAddModal() {
   modal.style.display = 'block';
}
const modal1 = document.getElementById('editModal');
function showEditModal(id) {
   modal1.style.display = 'block';
   var id=id;
   var taskName= $('#'+id).children('td[data-target="taskNameedit"]').text();
   var description= $('#'+id).children('td[data-target="taskDesedit"]').text();
   $('#taskNameedit').val(taskName);
   $('#taskDesedit').val(description);
}

function closeModal() {
   modal.style.display = 'none';
   modal1.style.display = 'none';
}

function deletedata(id){
    if (confirm('Are you sure you want to delete this task?')) {
        $(document).ready(function(){
        $.ajax({
            // Action
            url: 'function.php',
            // Method
            type: 'POST',
            data: {
            // Get value
            id: id,
            action: "delete"
            },
            success:function(response){
            // Response is the output of action file
            if(response == 1){
                alert("Data Deleted Successfully");
                document.getElementById(id).style.display = "none";
            }
            }
        });
        });
    }
  }