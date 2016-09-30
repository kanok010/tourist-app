<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Admin
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('admin');?>">Admin</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    
        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                
          <!-- Input addon -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Admin Profile</h3>
            </div>
            <div class="box-body">
              <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="text" class="form-control" placeholder="Username" value="<?php echo  $data['username'];?>">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
              </div>
              <br>
              
              
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                         <input type="text" class="form-control" placeholder="First Name" value="<?php echo $data['firstname'];?>">
                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-md-6">
                 
                        <div class="input-group">
                         
                            <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $data['lastname'];?>">
                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                  </div>
                </div>
                <!-- /.col-lg-6 -->
              </div>
              <br>
              
               
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control" placeholder="Email" value="<?php echo $data['email'];?>">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
              </div>
              <br>
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
             <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
             
            </div>
            <div class="col-md-4"></div>

        </div>
    </section>
</div>
