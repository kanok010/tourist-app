<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Users
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>   
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Users List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">                        
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>ID</th>                              
                              <th style="width: 20%">Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Create on</th>
                              <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $row){?>    
                            <tr>
                              <td><?php echo $row['id'];?></td>
                              
                              <td><?php echo $row['firstname']." ".$row['lastname'];?></td>
                              <td><?php echo $row['email'];?></td>
                              <td><?php echo $row['phone'];?></td>
                              <td><?php echo $row['address'];?></td>
                              <td><?php echo $row['create_date'];?></td>
                              <td class="text-center">                                  
                                  <a href="<?php echo site_url('users/edit/'.$row['id']);?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; | &nbsp;
                                  
                                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                              </td>
                            </tr>
                            <?php } ?>
                            <tfoot>
                            <tr>
                              <th>ID</th>                              
                              <th>Username</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Create on</th>
                              <th>Last Modified</th>
                              <th>Actions</th>
                            </tr>
                            </tfoot>
                           
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>