<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Price Plan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('priceplan');?>">Price Plan</a></li>
        <li class="active">Add</li>
      </ol>
    </section>
    
        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <?php echo validation_errors(); ?>
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">New Price Plan</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                      <div class="box-body">
                          
                        <div class="form-group">
                          <label for="package_name" class="col-sm-2 control-label">Package Name</label>

                          <div class="col-sm-10">
                              
                             

                            <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Package Name" value="">
                         
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="price_plan" class="col-sm-2 control-label">Price Plan</label>

                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="price_plan" name="price_plan" placeholder="Price Plan" value="">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="status" class="col-sm-2 control-label">Status</label>

                          <div class="col-sm-10">
                            <select class="form-control" name="status">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                           
                          </div>
                        </div>
                        <input type="hidden" value="create" name="action"/>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="button" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                      </div>
                      <!-- /.box-footer -->
                    </form>
              </div><!-- /.box -->
             
            </div>
            <div class="col-md-4"></div>

        </div>
    </section>
</div>
