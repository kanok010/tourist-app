<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Price Plan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Price Plan</li>
      </ol>
    </section>   
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                       <a href="<?php echo site_url('priceplan/create');?>"><h3 class="box-title"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Add New Price Plan</h3></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if ( $this->session->flashdata('message')) { ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Alert!</h4>
                            <?php echo  $this->session->flashdata('message');?>
                        </div>
                        <?php } ?>
                        <?php if ( $this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <?php echo $this->session->flashdata('error');?>
                        </div>
                        <?php } ?>
                        <?php if ( $this->session->flashdata('success')) { ?>
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                        <?php echo $this->session->flashdata('success');?>
                        </div>
                        <?php } ?>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th style="width:10%">ID</th>                              
                              <th>Package Name</th>
                              <th>Price Plan</th>
                              <th>Status</th>
                              <th style="width:10%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $row){?>    
                            <tr>
                              <td><?php echo $row['id'];?></td>
                              <td><?php echo $row['package_name'];?></td>
                              <td><?php echo $row['price_plan'];?></td>
                              <td><?php echo ($row['status'])? 'Enable': 'Disable' ; ?></td>
                              <td class="text-center">                                  
                                  <a href="<?php echo site_url('priceplan/edit/'.$row['id']);?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; | &nbsp;
                                  <a onClick="return confirm('Are you sure you want to delete this item?')"  href="<?php echo site_url('priceplan/delete/'.$row['id']);?>">
                                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                                  </a>
                              </td>
                            </tr>
                            <?php } ?>
                            <tfoot>
                            <tr>
                              <th>ID</th>                              
                              <th>Package Name</th>
                              <th>Price Plan</th>
                              <th>Status</th>
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
      "lengthChange": true,
      "pageLength": 10,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>