<template>
  <div>
     <Navbar />
 
   <div class="d-flex justify-content-center flex-wrap my-5">
     
<!--     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List of appointments</div>
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
                          <tr v-for="appointment in appointments" v-bind:key="appointment.id">
                            <td>{{appointment.name}}</td>
                            <td>{{appointment.eamil}}</td>
                            <td>{{appointment.age}}</td>
                            <td>{{appointment.Free_days}}</td>
                          
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->
   <v-card  v-for="appointment in appointments" v-bind:key="appointment.id" 
    class="mx-auto my-3 "
  max-width="15rem"
        min-width="15rem"
  >
    <v-img
      class="white--text align-end"
      height="10rem"
      src="https://rb.gy/rnnzki"
    >
      <v-card-title class="d-flex justify-center text-dark">{{appointment.id}}</v-card-title>
    </v-img>

    <v-card-subtitle class="pb-0">
      <div>Date:
    {{appointment.app_date}}
    </div>
    </v-card-subtitle>

    <v-card-text class="text--primary">
      <div>Time:
      {{appointment.app_time}}</div>  
    </v-card-text>
    <hr>
    <p class="text-center">Clinic details</p>
      <v-card-text class="text--primary">
      <div>Clinic Name: {{appointment.doctorname.clinic_name}}</div>  
    </v-card-text>
      <v-card-text class="text--primary">
      <div>Clinic Address: {{appointment.doctorname.clinic_location}}</div>  
    </v-card-text>
   
    <!-- <div class="mb-3">
      <b-button v-b-toggle.my-collapse>Show appointment details</b-button>
    </div>
  <b-collapse id="my-collapse">
      <b-card title="Collapsible card">
      ClinicName:  {{appointment.do}}
      Cliniclocation:  {{appointment.app_time}}
      </b-card>
    </b-collapse> -->
  </v-card>

   </div> </div> 
 <!--  <div>
    <Navbar />

    <div class="p-5">
      <v-card
        v-for="appointment in appointments"
        v-bind:key="appointment.id"
        class="mx-auto"
        max-width="294"
      >
        <v-img
          src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
          height="100px"
        ></v-img>

        <v-card-title>
          {{ appointment.appointment_name }}
        </v-card-title>

        <v-card-actions>
          <v-btn color="orange lighten-2" text>
            <router-link
              :to="{ name: 'appointmentDetails', params: { id: appointment.id } }"
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
      appointments: [],
       token: localStorage.getItem("token"),
       isLoggedIn: false,
    };
  },
  components: {
    Navbar,
  },
 methods: {
    loadUsers() {
      axios.get('/api/appointment/'+this.$route.params.id,{
          headers: {
            Authorization: "Bearer " + this.token,
          },
      })
            .then(response => {
              this.isLoggedIn= false
          ///    this.appointments=response.data.data
          this.appointments=response.data;
        ///    console.log(response.data);
        })
        .catch((error)=> {
            console.log(error.message);
        });
    },
    
    checkLoginStatus() {
      this.loading = true;
      // this.loading = true
      axios
        .get("/api/user", {
          headers: {
            Authorization: "Bearer " + this.token,
          },
        })
        .then((response) => {
          
          this.currentUser = response.data;
          console.log("LOGGED IN");
          this.isLoggedIn = true;
		  console.log( this.currentUser.name)
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
  },
  created() {

    
  }, 

 mounted() {
     this.checkLoginStatus() 
         this.loadUsers();
        
 }
/*  mounted() {
         axios.get('/api/service/'+this.$route.params.id+'/appointments').then(({ data }) => (this.appointments = data.data));
      console.log(this.appointments)
    }  */
};
</script>

<style>
</style>