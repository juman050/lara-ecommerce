<!-- Inner sidebar -->
  <div class="sidebar">
    <!-- user panel (Optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('public/backEnd/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo Session::get('admin_name'); ?></p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div><!-- /.user-panel -->

    <!-- Search Form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form><!-- /.sidebar-form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="treeview"><a href="{{URL::to('/orders')}}"><span>Order</span></a><</li>   
      <li class="treeview">
        <a href="#"><span>User</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{URL::to('/')}}">Add User</a></li>
          <li><a href="{{URL::to('/')}}">Manage User</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><span>Category</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{URL::to('/add-category')}}">Add Category</a></li>
          <li><a href="{{URL::to('/manage-category')}}">Manage Category</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><span>Menufacturer</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{URL::to('/add-manufacturer')}}">Add Manufacturer</a></li>
          <li><a href="{{URL::to('/manage-manufacturer')}}">Manage Manufacturer</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><span>Product</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{URL::to('/add-product')}}">Add Product</a></li>
          <li><a href="{{URL::to('/manage-product')}}">Manage Product</a></li>
        </ul>
      </li>
    </ul><!-- /.sidebar-menu -->

  </div><!-- /.sidebar -->