<aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
  
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ asset("inteccardgroup/images/profile.png") }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <!-- Optionally, you can add icons to the links -->
          <li><a href="{{url('inteccardgroup/admin')}}"><i class="fa fa-home"></i> <span>หน้าหลัก</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-list"></i> <span>เนื้อหา</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('news.index')}}"><i class="fa fa-list-alt"></i> ข้อมูลข่าวสาร</a></li>
              <li><a href="{{route('contents.index')}}"><i class="fa fa-list-alt"></i> บทความ</a></li>
              <li><a href="{{route('pages.index')}}"><i class="fa fa-list-alt"></i> เนื้อหาเดี่ยว</a></li>
              <li><a href="{{route('category.index')}}"><i class="fa fa-list"></i> หมวดหมู่</a></li>
            </ul>
          </li>
          @if(in_array(Auth::user()->id,[1,2]))
          <li class="treeview">
              <a href="#"><i class="fa fa-picture-o"></i> <span>ภาพสไลด์</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('photoslide.index')}}"><i class="fa fa-list"></i> รายการทั้งหมด</a></li>
              </ul>
            </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-cog"></i> <span>ตั้งค่า</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{route('users.index')}}"><i class="fa fa-user"></i> ผู้ใช้งาน</a></li>
            <!-- <li><a href="{{route('roles.index')}}"><i class="fa fa-key"></i> สิทธิ์การเข้าถึง</a></li> -->
            </ul>
          </li>
          @endif
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>