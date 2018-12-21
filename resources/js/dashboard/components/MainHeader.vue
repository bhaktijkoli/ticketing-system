<template>
  <header class="main-header">
    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <b>A</b>LT
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <b>Admin</b>LTE
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="/">
              <i class="fa fa-plus"></i>
              <span>Ex New Ticket</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img
                src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg"
                class="user-image"
                alt="User Image"
              >
              <span class="hidden-xs">User Name</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img
                  src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg"
                  class="img-circle"
                  alt="User Image"
                >
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-primary btn-primary">
                    <i class="fa fa-user-circle">&nbsp; Profile</i>
                  </a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-danger btn-danger">
                    <i class="fa fa-power-off">&nbsp; Sign Out</i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
</template>


<script>
export default {
  name: "MainHeader"
};
</script>



