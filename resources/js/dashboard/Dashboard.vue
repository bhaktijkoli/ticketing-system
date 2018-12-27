<template>
  <div>
    <MainHeader></MainHeader>
    <SideBar></SideBar>
    <!-- <Tbody></Tbody> -->
    <!-- <AllTicket></AllTicket> -->
    <!-- <NewTicket></NewTicket> -->
    <UserTable></UserTable>
  </div>
</template>

<script>
import MainHeader from "./components/MainHeader.vue";
import SideBar from "./components/SideBar.vue";
import Tbody from "./components/Tbody.vue";
import AllTicket from "./components/AllTicket.vue";
import NewTicket from "./components/NewTicket.vue";
import UserTable from "./components/UserTable.vue";
export default {
  name: "Dashboard",
  components: {
    MainHeader: MainHeader,
    SideBar: SideBar,
    Tbody: Tbody,
    AllTicket: AllTicket,
    NewTicket: NewTicket,
    UserTable: UserTable
  }
};
</script>
