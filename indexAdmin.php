<?php 
   ob_start();
   error_reporting(E_ALL ^ E_NOTICE);
   session_start();
   include('include/database.php');
   include('include/check_login.php');
   
      
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include('common/styles.html'); ?>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Header -->
         <?php include('common/header.php'); ?>
         <!-- Main Sidebar Container -->  
         <?php include('common/sidebarAdmin.php');; ?>
         <div class="content-wrapper">
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0">Welcome to ESEB Information System !</h1>
                     </div>
                  </div>

            
                  <div class="card">
                    <div class="card-header">
                        <div class="row">
                           <div class="col-md-6">
                           <h1>Admin Panel</h1></div>
                           <div class="col-md-6">
                           <input id="myInput" type="text" placeholder="Search.." style="float: right;"> </div>
                        </div>
                    </div>
                    <div class="card-body">

                      
<div class="container mt-2">
    <div class="row">
   

    <div class="col-md-8 mt-1 mb-2"><button type="button" id="create" class="btn btn-success">Add</button></div>
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="col-md-1">#</th>
                  <th scope="col" class="col-md-2">Name</th>
                  <th scope="col" class="col-md-2">User Name</th>
                  <th scope="col"class="col-md-2">Password</th>
                  <th scope="col"class="col-md-2">Image</th>
                  <th scope="col"class="col-md-1">UserTypeId</th>
                  <th scope="col"class="col-md-2">Action</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <?php
                include 'mydbCon.php';
                $query="select * from user"; // Fetch all the data from the table user
                $result=mysqli_query($dbCon,$query);
                ?>
                <?php if ($result->num_rows > 0): ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[3];?></td>
                    <td><?php echo $array[4];?></td>
                    <td><?php echo $array[5];?></td>
                    <td> 
                      <a href="javascript:void(0)" class="btn btn-primary edit" data-id="<?php echo $array[0];?>">Edit</a>
                      <a href="javascript:void(0)" class="btn btn-primary delete" data-id="<?php echo $array[0];?>">Delete</a>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                   <td colspan="3" rowspan="1" headers="">No Data Found</td>
                </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
              </tbody>
            </table>
        </div>
    </div>        
</div>
<!-- boostrap model -->
    <div class="modal fade" id="ajax-modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="custCrudModal"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="custForm" name="custForm" class="form-horizontal" method="POST">
              <input type="hidden" name="custId" id="custId">
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name" value="" maxlength="50" required="">
                </div>
              </div>  
              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">User Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="Username" name="Username" placeholder="Enter User Name" value="" maxlength="50" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Password</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="Password" name="Password" placeholder="Enter Password" value="" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Image</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="Image" name="Image" placeholder="Insert Image" value="" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label">User Type Id</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="UserTypeId" name="UserTypeId" placeholder="Enter User Type Id" value="" required="">
                </div>
              </div>

              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->


                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>  
      </div>
      <?php include('common/footer.php'); ?>
      </div>
      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
<script type="text/javascript">
 $(document).ready(function($){
    $('#create').click(function () {
       $('#custForm').trigger("reset");
       $('#custCrudModal').html("Add New Customer");
       $('#ajax-modal').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "Adminedit.php",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#custCrudModal').html("Edit Customer");
              $('#ajax-modal').modal('show');
              $('#custId').val(res.custId);
              $('#Name').val(res.Name);
              $('#Username').val(res.Username);
              $('#Password').val(res.Password);
              $('#Image').val(res.Image);
              $('#UserTypeId').val(res.UserTypeId);

           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "Admindelete.php",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#Name').html(res.Name);
              $('#Username').html(res.Username);
              $('#Password').html(res.Password);
              $('#Image').html(res.Image);
              $('#UserTypeId').html(res.UserTypeId);
              window.location.reload();
           }
        });
       }
    });
    $('#custForm').submit(function() {
         
        // ajax
        $.ajax({
            type:"POST",
            url: "AdminAdd-update.php",
            data: $(this).serialize(), // get all form field value in 
            dataType: 'json',
            success: function(res){
             window.location.reload();
           }
        });
    });
});

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>