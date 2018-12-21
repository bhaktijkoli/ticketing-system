<template>
  <div>
    <MainHeader></MainHeader>
    <SideBar></SideBar>
  </div>
</template>

<script>
import MainHeader from "./components/MainHeader.vue";
import SideBar from "./components/SideBar.vue";
export default {
  name: "Dashboard",
  components: {
    MainHeader: MainHeader,
    SideBar: SideBar
  }
};
</script>
