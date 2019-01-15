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
                    v-bind:src="'https://ui-avatars.com/api/?name='+username"
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
      <section class="sidebar" style="height: auto;">
        <!-- Sidebar user panel -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <!-- Ticket for admin -->
          <li class="treeview" v-if="role == 0 || role == 1">
            <router-link to="/home">
              <i class="fa fa-ticket"></i>
              <span title="for admin">All Tickets</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right">{{ticket_length}}</span>
              </span>
            </router-link>
          </li>
          <!-- my ticket for users -->
          <li class="treeview" v-if="role == 2">
            <router-link to="/my-tickets">
              <i class="fa fa-ticket"></i>
              <span title="Your tickets here">My Tickets</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right">{{mytickets_length}}</span>
              </span>
            </router-link>
          </li>
          <!-- New ticket for user -->
          <li v-if="role == 0 || role == 2">
            <router-link to="/new-ticket">
              <i class="fa fa-plus"></i>
              <span>New Ticket</span>
            </router-link>
          </li>
          <!-- for Super admin -->
          <li class="treeview" v-if="role == 0">
            <router-link to="/users">
              <i class="fa fa-users"></i>
              <span>Users</span>
            </router-link>
          </li>
          <!-- setting -->
          <li class="treeview">
            <router-link to="/settings">
              <i class="fa fa-cog"></i>
              <span>Settings</span>
            </router-link>
          </li>
          <!-- Help section -->
          <li class="treeview">
            <router-link to="/help">
              <i class="fa fa-question"></i>
              <span>Help</span>
            </router-link>
          </li>
          <!--Logout section -->
          <li>
            <a href="/logout">
              <i class="fa fa-sign-out"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <router-view></router-view>
    <footer class="main-footer">
      <strong>
        Copyright &copy; 2019
        <a href="http://www.kccemsr.edu.in/">KCCEMSR</a>.
      </strong> All rights
      reserved.
    </footer>
  </div>
</template>

<script>
export default {
  name: "DashBoard",
  data() {
    return {
      ticket_length: "",
      mytickets_length: ""
    };
  },
  //to get no. of tickets
  mounted() {
    axios.get("/api/ticket/get/unassigned").then(res => {
      this.ticket_length = res.data.length;
    });
    axios.get("/api/ticket/user/get").then(res => {
      this.mytickets_length = res.data.length;
    });
  },
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

<style scoped>
.main-header {
  position: fixed;
  width: 100%;
}
.main-sidebar {
  position: fixed;
}
.options {
  flex: 1 0 0;
  flex-grow: 1;
}
footer a:hover {
  color: #3987a9;
}
</style>
