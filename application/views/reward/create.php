<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Reward
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('ReworfS');?>">Reward</a></li>
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
                        <h3 class="box-title">New Reward</h3>
                        <p class="text-right text-red">* Required field</p>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                      <div class="box-body">
                          
                        <div class="form-group">
                            <label for="package_name" class="col-sm-3 control-label">Title <span class="text-red">*</span></label>

                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="">
                         
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="price_plan" class="col-sm-3 control-label">Detail <span class="text-red">*</span></label>

                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="detail" name="detail" placeholder="Detail" value="">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="price_plan" class="col-sm-3 control-label">Image</label>

                          <div class="col-sm-9">
                             
                            <input type="file" id="exampleInputFile">

                            <p class="help-block">File type .gif, .jpeg, .jpg, .png only</p>
                          </div>
                        </div>
                         <div class="form-group">
                          <label for="price_plan" class="col-sm-3 control-label">Point</label>

                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="point" name="point" placeholder="Point" value="">
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="price_plan" class="col-sm-3 control-label">Condition</label>

                          <div class="col-sm-9">
                              <textarea class="form-control" rows="5" placeholder="Condition"  name="image"></textarea>
                          </div>
                        </div>
                          
                          <div class="form-group">
                          <label for="price_plan" class="col-sm-3 control-label">Start Date - End Date <span class="text-red">*</span></label>

                          <div class="col-sm-9">
                              <input type="text" class="form-control pull-right" name="date_range" id="reservation">
                            
                          </div>
                        </div> 
                        <div class="form-group">
                          <label for="status" class="col-sm-3 control-label">Status <span class="text-red">*</span></label>

                          <div class="col-sm-9">
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