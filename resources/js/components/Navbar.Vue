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

        <b-navbar-nav>
          <b-nav-item class="item"
            ><router-link class="col" :to="{ name: 'reg' }"
              >Register</router-link
            >
          </b-nav-item>
          <b-nav-item class="item"
            ><router-link class="col" :to="{ name: 'log' }">Login</router-link>
          </b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  data() {
    return {};
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
</style>