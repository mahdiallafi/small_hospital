<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#">
        <v-img
          class="logoimage"
          max-height="50"
          max-width="150"
          src="./asset/app.png"
        >
        </v-img
      ></b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item
            ><router-link class="col" :to="{ name: 'service' }"
              >Home</router-link
            ></b-nav-item
          >

          <!-- <b-nav-item
            ><router-link class="col" :to="{ name: 'service' }"
              >Services</router-link
            >
          </b-nav-item> -->
          <!-- <b-nav-item 
              ><router-link class="col" :to="{ name: 'about' }"
                >About us</router-link
              >
            </b-nav-item> -->
          <b-nav-item
            ><router-link class="col" :to="{ name: 'contact' }"
              >Contact
            </router-link>
          </b-nav-item>
        </b-navbar-nav>
        <b-navbar-nav class="options"  right v-if="(!isLoggedIn && !loading) ">
          
              <b-nav-item class="item"
            ><router-link class="col" :to="{ name: 'reg' }"
              >Register</router-link
            >
          </b-nav-item>
          <b-nav-item class="item"
            ><router-link class="col" :to="{ name: 'log' }">Login</router-link>
          </b-nav-item>
        
        </b-navbar-nav>
        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-item-dropdown
            right
            :text="currentUser.name"
            v-if="(isLoggedIn && !loading) || $route.params.name"
          >
            <!-- Using 'button-content' slot -->
            <template #button-content>
              {{currentUser.name}}
             <v-icon
      large
      text 
      color="teal darken-2"
    >
 
      mdi-account
    </v-icon>
            </template>
            <b-dropdown-item
              ><router-link class="item"
                :to="{
                  name: 'UserDetails',
                  params: { id: currentUser.id },
                }"
                ><v-icon
      large
      text 
      color="teal darken-2"
    >
 
      mdi-account-circle
    </v-icon>Account</router-link
              ></b-dropdown-item
            >
<hr>
            <b-dropdown-item
              ><router-link class="item"
                :to="{
                  name: 'UserReport',
                  params: { id: currentUser.id },
                }"
                ><v-icon
      large
      text 
      color="teal darken-2"
    >
 
      mdi-typewriter
    </v-icon>Report problem</router-link 
              ></b-dropdown-item
            >
            <hr>
            <b-dropdown-item
              ><router-link class="item"
                :to="{
                  name: 'UserAppointment',
                  params: { id: currentUser.id },
                }"
                ><v-icon
      large
      text 
      color="teal darken-2"
    >
 
      mdi-clipboard-text-clock
    </v-icon>My appointment</router-link
              ></b-dropdown-item
            >
<hr>
            <button class="btn btn-danger logout item" @click="logout"><v-icon
      large
      text 
      color="teal darken-2"
    >
 
      mdi-logout
    </v-icon>Logout</button>
          </b-nav-item-dropdown>
        </b-navbar-nav>
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
          console.log(this.currentUser.id);
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
          this.$router.push("/");
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
    console.log(this.isLoggedIn);
  },
  watch: {
    $route(to, from) {
      this.checkLoginStatus();
    },
  },
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
.dropdown-toggle::after {
    display:none;
}
.logout {
padding: 0;
border: none;
color:black;
background: none; }
.profileMenu span {
  color: black;
}

  @media only screen and (min-width: 768px) {
  .options {
    margin-left:20rem ;

  }
  .logout{
    margin-left: 1.8rem;
  }
}
.item{
text-decoration: none;
}


</style>