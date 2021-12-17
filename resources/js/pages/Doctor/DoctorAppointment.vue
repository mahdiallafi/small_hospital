<template>
  <div class="container">
    <div class="row">
      <Sidebar />
      <div class="col-md-8 col-md-offset-2">
        <v-row class="mb-2 mt-3">
          <div class="panel-heading">List of services</div>

          <v-row justify="end">
           
          </v-row>
        </v-row>
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Appointment date</th>
                  <th>Appointment time</th>
                  <th>user name</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(appointment , i) in appointments" :key="i">
                  <td>{{ appointment.app_date }}</td>
                  <td>{{ appointment.app_time }}</td>
                  <td>{{ appointment.username.name }}</td>
             

                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import axios from "axios";
import Sidebar from "./../../components/doctorNavbar.vue";
export default {
  data() {
    return {
      appointments: [],
      isLoggedIn: false,
      token: localStorage.getItem("token"),
    }
  },
  components: {
    Sidebar,
  },
  methods: {
    loadUsers() {
      axios
        .get("/api/doctor/appointments/" + this.$route.params.id , {
          headers: {
            Authorization: "Bearer " + this.token,
          },
        })
        .then((response) => {
          //  const user=response.data
          // this.clinic_name=user.clinic_name
          this.appointments = response.data;
          console.log(this.appointments);
        })
        .catch((error) => {
          console.log("ERROR");
          console.log(error);
        });
    }
  },
  mounted() {
    this.loadUsers();
    this.isLoggedIn = false;
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
.item {
  text-decoration: none !important;
}
</style>