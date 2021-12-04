<template>
<div class="row mt-5">
<div class="sidebar">
  <b-nav vertical>
                   <router-link class="item"
              :to="{ name: 'UserDetails',
                     params: { id: currentUser.id } }"
            >{{ currentUser.name}} <v-icon
      large
      text 
      color="teal darken-2"
    >
 
      mdi-account-circle
    </v-icon> </router-link>    


<b-nav-item class="item"
              ><router-link class="col" :to="{ name: 'Users' }"
                >Users</router-link             >
</b-nav-item>
<b-nav-item class="item"
              ><router-link class="col" :to="{ name: 'serviceadmin' }"
                >services</router-link             >
</b-nav-item>
<b-nav-item class="item"
              ><router-link class="col" :to="{ name: 'Report' }"
                >reports</router-link             >
</b-nav-item>
 
 <b-nav-item class="item">
  <v-icon @click="logout" >
   mdi-logout
 </v-icon>
   
</b-nav-item>
 
  </b-nav>
</div>
<div class="container">
</div>
</div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      currentUser: {},
      token: localStorage.getItem("token"),
      isLoggedIn: false,
      loading: true,
    };
  },
  methods: {
    checkLoginStatus() {
      this.loading = true;
      // this.loading = true
      axios
        .get("api/user", {
          headers: {
            Authorization: "Bearer " + this.token,
          },
        })
        .then((response) => {
          this.currentUser = response.data;
          console.log("LOGGED IN");
          this.isLoggedIn = true;
		  console.log( response.data.id)
        })
        .catch((errors) => {
          console.log(errors);
          this.isLoggedIn = false;
        })
        .finally(() => {
          this.loading = false;
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
		  this.$router.push('/')
        })
        .catch((errors) => {
          console.log("it is not working");
          console.log(errors);
        });
    },
  },
  mounted() {
    //  axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
    this.checkLoginStatus();
     /* axios.get('/api/service/'+this.$route.params.id+'/doctors')
            .then(response => {
              this.isLoggedIn= false
          ///    this.doctors=response.data.data
          this.doctors=response.data;
        ///    console.log(response.data);
        })
        .catch((error)=> {
            console.log(error.message);
        }); */
  },
  updated() {
	  console.log(this.isLoggedIn)
  },
  watch: {
	  $route(to, from) {
		  this.checkLoginStatus();
	  }
  }
};
</script>

<style>
.sidebar{
    width: 10rem !important;
    background-color: transparent;
}
</style>