<template>
  


  
 
<v-app>



  <router-view v-slot="{ Component }">
    <component :is="Component"/>
  </router-view>



</v-app>
 


 
</template>



<script>
import Navbar from './Navbar.vue';
import Footer from './footer.vue';
export default {
  data() {
    return {
     
    };
  },
  components:{
    Navbar,
    Footer,
  }
}
</script>
<style>
.main{
    height: 89vh;
    width: 100%;
}
</style>