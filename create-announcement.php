<?php 
   ob_start();
   error_reporting(E_ALL ^ E_NOTICE);
   session_start();
   include('include/check_login.php');
   include('include/database.php');
    
   ?>

 <?php
 include 'include/mydbCon.php';
 $query="select * from announcement limit 200"; // Fetch all the data from the table Annoucement
 $result=mysqli_query($dbCon,$query);
 ?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include('common/styles.html'); ?>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         <?php include('common/header.php'); ?>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <?php include('common/sidebar2.php');; ?>
         <!-- Content Wrapper. Contains page content -->


         <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <div class="card">
               <div class="card-body">

                     <div class="card-header">
                           <h1 class="m-0">Create Announcement</h1>
                     </div>

            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-8 mt-1 mb-2"><button type="button" id="create" class="btn btn-success">Add</button></div>
                    <div class="col-md-12">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col" class="col-lg-1">#</th>
                              <th scope="col" class="col-lg-3">Header</th>
                              <th scope="col" class="col-lg-6">Body</th>
                              <th scope="col" class="col-lg-2">Action</th>
                            </tr>
                          </thead>
                          <tbody>

                           <?php if ($result->num_rows > 0): ?>
                            <?php while($array=mysqli_fetch_row($result)): ?>
                            <tr>
                                <th scope="row"><?php echo $array[0];?></th>
                                <td><?php echo $array[1];?></td>
                                <td><?php echo $array[2];?></td>
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
                          <input type="hidden" name="Id" id="Id">
                          <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Header</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="Header" name="Header" placeholder="Enter Header" value="" maxlength="3050" required="">
                            </div>
                          </div>  
                          <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Body</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="Body" name="Body" placeholder="Enter Body" value="" maxlength="10000" required="">
                            </div>
                          </div>

                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
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
         <?php include('common/footer.php'); ?>
      </div>
      <!-- ./wrapper -->
      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="plugins/chart.js/Chart.min.js"></script>
      <!-- Sparkline -->
      <script src="plugins/sparklines/sparkline.js"></script>
      <!-- JQVMap -->
      <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
      <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="plugins/moment/moment.min.js"></script>
      <script src="plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="dist/js/pages/dashboard.js"></script>
   </body>
</html>


<script type="text/javascript">
 $(document).ready(function($){
    $('#create').click(function () {
       $('#custForm').trigger("reset");
       $('#custCrudModal').html("Add New Announcement");
       $('#ajax-modal').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "AnnouncementEdit.php",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#custCrudModal').html("Edit Announcement");
              $('#ajax-modal').modal('show');
              $('#Id').val(res.Id);
              $('#Header').val(res.Header);
              $('#Body').val(res.Body);

           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Announcement?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "AnnouncementDelete.php",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#Header').html(res.Header);
              $('#Body').html(res.Body);

              window.location.reload();
           }
        });
       }
    });
    $('#custForm').submit(function() {
         
        // ajax
        $.ajax({
            type:"POST",
            url: "AnnouncementAdd-update.php",
            data: $(this).serialize(), // get all form field value in 
            dataType: 'json',
            success: function(res){
             window.location.reload();
           }
        });
    });
});
</script>
