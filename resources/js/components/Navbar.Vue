<template>
  <!-- <div>
  this is navbar
</div> -->
  <div>
    <b-navbar toggleable="lg" type="dark" variant="light">
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <v-img
        class="logoimage"
        max-height="50"
        max-width="150"
        src="./asset/app.png"
      >
      </v-img>
      <b-collapse id="nav-collapse" is-nav>
        <v-row class="justify-content align-items-center">
          <b-navbar-nav>
            <b-nav-item class="item"
              ><router-link class="col" :to="{ name: 'hello' }"
                >Home</router-link
              >
            </b-nav-item>
            <b-nav-item class="item"
              ><router-link class="col" :to="{ name: 'service' }"
                >Services</router-link
              >
            </b-nav-item>
            <b-nav-item class="item"
              ><router-link class="col" :to="{ name: 'about' }"
                >About us</router-link
              >
            </b-nav-item>
            <b-nav-item class="item"
              ><router-link class="col" :to="{ name: 'contact' }"
                >Contact us</router-link
              >
            </b-nav-item>
          </b-navbar-nav>
        </v-row>

              
        <b-navbar-nav v-if="!isLoggedIn && !loading">
          <b-nav-item class="item"
            ><router-link class="col" :to="{ name: 'reg' }"
              >Register</router-link
            >
          </b-nav-item>
          <b-nav-item class="item"
            ><router-link class="col" :to="{ name: 'log' }">Login</router-link>
          </b-nav-item>
        </b-navbar-nav>

        <b-nav-item-dropdown
          class="profileMenu"
          :text="currentUser.name"
          right
          v-if="isLoggedIn && !loading || $route.params.name"
        >
          <b-dropdown-item></b-dropdown-item>
          <b-dropdown-item ><router-link 
                                        :to="{
                                            name: 'UserDetails',
                                            params: { id: currentUser.id }
                                        }"
                                      
                                        >Account</router-link
                                    ></b-dropdown-item>
         
          <b-dropdown-item ><router-link 
                                        :to="{
                                            name: 'UserReport',
                                            params: { id: currentUser.id }
                                        }"
                                      
                                        >Report problem</router-link
                                    ></b-dropdown-item>
          <b-dropdown-item>
            <button  class="btn btn-danger" @click="logout">
              Logout
            </button>
          </b-dropdown-item>
        </b-nav-item-dropdown>
      </b-collapse>
    </b-navbar>
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




<style scope>
.logoimage {
  margin-left: 4rem;
}
.nav-link {
  color: white !important;
  font-size: 1.4rem;
  font-family: "Source Sans Pro", sans-serif;
  font-style: italic;
  font-weight: 600;
}
.col {
  color: black !important;
  text-decoration: none !important;
}
.col:hover {
  color: gray !important;
}
.v-row {
}
.pages {
  margin-left: 70%;
}
.nav {
  border-color: coral;
}
.user {
}
.v-tab {
  text-transform: none;
}

.profileMenu span {
  color: black;
}
</style>