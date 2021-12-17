<template>
 <div class="sidenav">
        <a> <router-link class="item"
              :to="{ name: 'UserDetails',
                     params: { id: currentUser.id } }"
            >{{ currentUser.name}} <v-icon
      large
      text 
      color="teal darken-2"
    >
 
      mdi-account-circle
    </v-icon> </router-link></a>
    <hr>
  <a><router-link class="col" :to="{ name: 'DoctorService',
                                params: {id: currentUser.id}   }"
                >My services</router-link             ></a>
            <hr>
<a>  <v-icon @click="logout" >
   mdi-logout
 </v-icon></a>


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
.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
background: #eee;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;

  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }}
</style>