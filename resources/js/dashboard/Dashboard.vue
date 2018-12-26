<template>
  <div>
    <MainHeader></MainHeader>
    <SideBar></SideBar>
    <!-- <Tbody></Tbody> -->
    <!-- <AllTicket></AllTicket> -->
    <NewTicket></NewTicket>
  </div>
</template>

<script>
import MainHeader from "./components/MainHeader.vue";
import SideBar from "./components/SideBar.vue";
import Tbody from "./components/Tbody.vue";
import AllTicket from "./components/AllTicket.vue";
import NewTicket from "./components/NewTicket.vue";
export default {
  name: "Dashboard",
  components: {
    MainHeader: MainHeader,
    SideBar: SideBar,
    Tbody: Tbody,
    AllTicket: AllTicket,
    NewTicket: NewTicket
  }
};
</script>
