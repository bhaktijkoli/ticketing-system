<template>
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
          <p class="user_name">User Name</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Ticket for admin -->
        <li class="treeview">
          <router-link to="/home/inbox">
            <i class="fa fa-ticket"></i>
            <span title="for admin">All Tickets</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </router-link>
        </li>
        <!-- New ticket for user -->
        <li>
          <a href="/">
            <i class="fa fa-plus"></i>
            <span>New Ticket</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <!-- for Super admin -->
        <li class="treeview">
          <a href="/home">
            <i class="fa fa-users"></i>
            <span>Users</span>
          </a>
        </li>
        <!-- Help section -->
        <li class="treeview">
          <a href="/">
            <i class="fa fa-question"></i>
            <span>Help</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
  name: "SideBar"
};
</script>


