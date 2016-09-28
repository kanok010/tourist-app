  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $username; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" id="toggle">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($menu == 'home' || $menu == '' ) { echo 'active'; }?> treeview">
          <a href="<?php echo site_url('home');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php if($menu == 'users') { echo 'active'; }?>  treeview">
          <a href="<?php echo site_url('users');?>">
            <i class="fa fa-users"></i>
            <span>Users</span>
          </a>
        </li>
        <li class="<?php if($menu == 'price-plan' || $menu == 'price-plan-add') { echo 'active'; }?>  treeview">
          <a href="<?php echo site_url('priceplan');?>">
            <i class="fa fa-file-text-o"></i>
            <span>Price Plan</span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($menu == 'price-plan') { echo 'active'; }?>"><a href="<?php echo site_url('priceplan');?>"><i class="fa fa-circle-o"></i> Manage Price Plan</a></li>   
            <li class="<?php if($menu == 'price-plan-add') { echo 'active'; }?>"><a href="<?php echo site_url('priceplan/create');?>"><i class="fa fa-circle-o"></i> Add Price Plan</a></li>            
          </ul>  
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-credit-card"></i>
            <span>Payment (Top up)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Credit Card</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> 7-11</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Topping</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Item 1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Item 2</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa fa-files-o"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Report 1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Report 2</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Report 3</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Report 4</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text-o"></i>
            <span>App Logs</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>