<template>
  <div>
     <Navbar />
 
   <div class=" container d-flex justify-center">
<!--     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List of doctors</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                          <tr>


                            <th>name</th>
                            <th>email</th>
                            <th>age</th>
                            <th>working days</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="doctor in doctors" v-bind:key="doctor.id">
                            <td>{{doctor.name}}</td>
                            <td>{{doctor.eamil}}</td>
                            <td>{{doctor.age}}</td>
                            <td>{{doctor.Free_days}}</td>
                          
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->
   <v-card  v-for="doctor in doctors" v-bind:key="doctor.id" 
    class="mx-auto "
    max-width="300"
  >
    <v-img
      class="white--text align-end"
      height="130px"
      src="https://rb.gy/rnnzki"
    >
      <v-card-title class="d-flex justify-center text-dark">{{doctor.name}}</v-card-title>
    </v-img>

    <v-card-subtitle class="pb-0">
    {{doctor.age}}
    </v-card-subtitle>

    <v-card-text class="text--primary">
      <div>emsil address</div>

      <div>{{doctor.eamil}}</div>

         <div>work days </div>

      <div>{{doctor.Free_days}}</div>
    </v-card-text>

    <v-card-actions>
     

      <v-btn
      class="d-flex justify-center"
        color="orange"
        text
      >
      book
      </v-btn>
    </v-card-actions>
  </v-card>

   </div> </div> 
 <!--  <div>
    <Navbar />

    <div class="p-5">
      <v-card
        v-for="doctor in doctors"
        v-bind:key="doctor.id"
        class="mx-auto"
        max-width="294"
      >
        <v-img
          src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
          height="100px"
        ></v-img>

        <v-card-title>
          {{ doctor.doctor_name }}
        </v-card-title>

        <v-card-actions>
          <v-btn color="orange lighten-2" text>
            <router-link
              :to="{ name: 'doctorDetails', params: { id: doctor.id } }"
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
    </div>
  </div> -->



</template>

<script>
import axios from "axios";
import Navbar from "../components/Navbar.vue";
export default {
  data: function () {
    return {
      doctors: [],
       isLoggedIn: false,
    };
  },
  components: {
    Navbar,
  },
  /* methods: {
    loadUsers() {
      axios.get('/api/service/'+this.$route.params.id+'/doctors').then(({ data }) => (this.services = data.data));
      console.log(data.data)
    },
  },
  created() {
    this.loadUsers();
  }, */

 mounted() {
        axios.get('/api/service/'+this.$route.params.id+'/doctors')
            .then(response => {
              this.isLoggedIn= false
          ///    this.doctors=response.data.data
          this.doctors=response.data;
        ///    console.log(response.data);
        })
        .catch((error)=> {
            console.log(error.message);
        });
 }
/*  mounted() {
         axios.get('/api/service/'+this.$route.params.id+'/doctors').then(({ data }) => (this.doctors = data.data));
      console.log(this.doctors)
    }  */
};
</script>

<style>
</style>