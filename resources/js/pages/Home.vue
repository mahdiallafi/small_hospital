<template>

  <v-container>
	  
   <!--  <button v-if="isLoggedIn" class="btn btn-danger" @click="logout">
      Logout
    </button>
    <div v-if="isLoggedIn && !loading">
      You are logged in as {{ currentUser.name }}
    </div>
    <div v-if="!isLoggedIn && !loading">You are unauthorized</div>
    <h5 class="text-center">Welcome to the SPA in Laravel & Vue JS</h5>
    <p class="text-center">{{ currentUser.email }}</p> -->
  </v-container>
</template>
<script>
import axios from "axios";
import Navbar from "../components/Navbar.vue"
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
       Navbar
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
          this.currentUser = response.data;
          var statues = this.currentUser.role;
          console.log(statues);
          
          ///   this.$toaster.success('Account created')

          console.log("LOGGED IN");
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

