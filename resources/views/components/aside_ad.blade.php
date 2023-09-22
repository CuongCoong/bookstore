<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ url('avatar')}}/{{auth()->user()->avatar}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ auth()->user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-calendar" aria-hidden="true"></i> <span>Danh Mục</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('dm.danh_sach')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
          <li><a href="{{ route('dm.them')}}"><i class="fa fa-circle-o"></i>Thêm Mới</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Sản Phẩm</span>
          <span class="label label-danger pull-right">Hot</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('sp.thu_vien')}}"><i class="fa fa-circle-o"></i>Danh Sách</a></li>
          <li><a href="{{ route('sp.them')}}"><i class="fa fa-circle-o"></i> Thêm</a></li>


        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Kích Cỡ</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('kc.danh_sach')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
          <li><a href="{{route('kc.them')}}"><i class="fa fa-circle-o"></i> Thêm</a></li>


        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Banner</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('banner.kho')}}"><i class="fa fa-circle-o"></i>Kho Banner</a></li>


        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span> Forum</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('ad.forum')}}"><i class="fa fa-circle-o"></i> Bài Viết</a></li>
          <li><a href="{{route('forum.duyet')}}"><i class="fa fa-circle-o"></i> Duyệt bài</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Đơn Hàng</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('ad.don_hang')}}"><i class="fa fa-circle-o"></i> Quản Lí Đơn</a></li>
        </ul>
      </li>

      <li>
        <a href="{{route('ad_feedback')}}">
          <i class="fa fa-envelope"></i> <span>FeedBack</span>
          
        </a>
      </li>
      <li>
        <a href="{{route('triet_li')}}">
          <i class="fa fa-calendar"></i> <span>Triết lí</span>
          
        </a>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>