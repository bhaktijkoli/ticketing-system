<template>
  <div>
    <MainHeader></MainHeader>
    <SideBar></SideBar>
    <Tbody></Tbody>
  </div>
</template>

<script>
import MainHeader from "./components/MainHeader.vue";
import SideBar from "./components/SideBar.vue";
import Tbody from "./components/Tbody.vue";
export default {
  name: "Dashboard",
  components: {
    MainHeader: MainHeader,
    SideBar: SideBar,
    Tbody: Tbody
  }
};
</script>
