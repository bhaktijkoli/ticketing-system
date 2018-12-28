<template>
  <div>
    <!-- <MainHeader></MainHeader> -->
    <div class="wrapper hold-transition skin-blue sidebar-mini">
      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
            <b>KC</b>
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <b>KC</b>COE
          </span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="/" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li>
                <router-link to="/new-ticket">
                  <i class="fa fa-plus"></i>
                  <span>New Ticket</span>
                </router-link>
              </li>

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img
                    src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg"
                    class="user-image"
                    alt="User Image"
                  >
                  <span class="hidden-xs">{{username}}</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
    </div>

    <!-- <SideBar></SideBar> -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img
              src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg"
              class="img-circle"
              alt="User Image"
            >
          </div>
          <div class="pull-left info">
            <p class="user_name">{{username}}</p>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <!-- Ticket for admin -->
          <li class="treeview">
            <router-link to="/home">
              <i class="fa fa-ticket"></i>
              <span title="for admin">All Tickets</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right">4</span>
              </span>
            </router-link>
          </li>
          <!-- New ticket for user -->
          <li>
            <router-link to="/new-ticket">
              <i class="fa fa-plus"></i>
              <span>New Ticket</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </router-link>
          </li>
          <!-- for Super admin -->
          <li class="treeview" v-if="role == 0">
            <router-link to="/users">
              <i class="fa fa-users"></i>
              <span>Users</span>
            </router-link>
          </li>
          <!-- Help section -->
          <li class="treeview">
            <router-link to="/help">
              <i class="fa fa-question"></i>
              <span>Help</span>
            </router-link>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "Dashboard",
  computed: {
    username() {
      if (this.$store.state.user == null) return "";
      return this.$store.state.user.name;
    },
    role() {
      if (this.$store.state.user == null) return -1;
      return this.$store.state.user.role;
    }
  }
};
</script>
