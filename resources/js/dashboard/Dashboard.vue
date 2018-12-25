<template>
  <div>
    <MainHeader></MainHeader>
    <SideBar></SideBar>
    <!-- <Tbody></Tbody> -->
    <AllTicket></AllTicket>
    <!-- <router-view></router-view> -->
  </div>
</template>

<script>
import MainHeader from "./components/MainHeader.vue";
import SideBar from "./components/SideBar.vue";
import Tbody from "./components/Tbody.vue";
import AllTicket from "./components/AllTicket.vue";
export default {
  name: "Dashboard",
  components: {
    MainHeader: MainHeader,
    SideBar: SideBar,
    Tbody: Tbody,
    AllTicket: AllTicket
  }
};
</script>
