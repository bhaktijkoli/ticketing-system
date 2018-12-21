<template>
  <div>
    <h3>asdfb;</h3>
    <MainHeader></MainHeader>
  </div>
</template>

<script>
import MainHeader from "./components/MainHeader.vue";
Vue.component("MainHeader", require("./components/MainHeader.vue"));
export default {
  name: "Dashboard"
};
</script>
