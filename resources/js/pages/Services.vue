<template>
  <!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List of users</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                          <tr>


                            <th>service_name</th>
                            <th>clinic_name</th>
                            <th>clinic_location</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="service in services" v-bind:key="service.id">
                            <td>{{service.service_name}}</td>
                            <td>{{service.clinic_name}}</td>
                            <td>{{service.clinic_location}}</td>
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
  <div>
    <Navbar />

    <v-row class="p-5">
      <v-card
        v-for="service in services"
        v-bind:key="service.id"
        class="mx-auto"
        max-width="294"
      >
        <v-img
          src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
          height="100px"
        ></v-img>

        <v-card-title>
          {{ service.service_name }}
        </v-card-title>

        <v-card-actions>
          <v-btn color="orange lighten-2" text>
            <router-link
              :to="{ name: 'serviceDetails', params: { id: service.id } }"
            >
              Explore</router-link
            >
          </v-btn>

          <v-spacer></v-spacer>
        </v-card-actions>

        <v-expand-transition>
          <div v-show="show">
            <v-divider></v-divider>
          </div>
        </v-expand-transition>
      </v-card>
    </v-row>
  </div>
</template>

<script>
import axios from "axios";
import Navbar from "../components/Navbar.vue";
export default {
  data: function () {
    return {
      services: {},
       isLoggedIn: false,
    };
  },
  components: {
    Navbar,
  },
  methods: {
    loadUsers() {
      axios.get("api/services").then(({ data }) => (this.services = data.data));
       this.isLoggedIn= false
      console.log(this.services)
    },
  },
  created() {
    this.loadUsers();
    this.isLoggedIn= false
  },
  /* mounted() {
        axios.get('/api/services')
            .then(function (response) {
              this.services=response.data
            console.log(response);
        })
        .catch(function (error) {
            console.log(error.message);
        });
    } */
};
</script>

<style>
</style>