<template>
  <div>
       <Sidebar>
  
   </Sidebar>
  </div>
</template>


   
<script>

import axios from "axios";
import Navbar from "../components/Navbar.vue"
import Sidebar from '../components/Sidebar.vue'
export default {
  data() {
    return {
      currentUser: {},
      token: localStorage.getItem("token"),
      isLoggedIn: false,
      loading: true,
    };
  },
  components:{
       Navbar,
        Sidebar,
  }
  ,
  methods: {
    checkLoginStatus() {
      // this.loading = true
      axios
        .get("api/user", {
          headers: {
            Authorization: "Bearer " + this.token,
          },
        })
        .then((response) => {
              console.log("im admin");
          this.currentUser = response.data;
          var statues = this.currentUser.role;
          console.log(statues);
          
          ///   this.$toaster.success('Account created')

      
          this.isLoggedIn = true;
        })
        .catch((errors) => {
          console.log(errors);
          this.isLoggedIn = false;
        });
      // this.loading = false
    },
    logout() {
      axios
        .post(
          "api/logout",
          {},
          {
            headers: {
              Authorization: "Bearer " + this.token,
            },
          }
        )
        .then((response) => {
          console.log(response);
          localStorage.removeItem("token");
          this.isLoggedIn = false;
        })
        .catch((errors) => {
          console.log("it is not working");
          console.log(errors);
        });
    },
  },
  mounted() {
    this.loading = true;
    //  axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
    this.checkLoginStatus();
    this.loading = false;
  },
};
</script>

<style>

</style>