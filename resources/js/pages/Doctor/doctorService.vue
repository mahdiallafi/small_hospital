<template>
  <div class="container">
    <div class="row">
      <Sidebar />
      <div class="col-md-8 col-md-offset-2">
        <v-row class="mb-2 mt-3">
          <div class="panel-heading">List of services</div>

          <v-row justify="end">
            <router-link class="item" :to="{ name: 'CreateDoctorService' }">
              New
              <v-icon large text color="teal darken-2">
                mdi-open-in-new
              </v-icon>
            </router-link>
          </v-row>
        </v-row>
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table">
              <thead>
                <tr>
                  <th>service_name</th>

                  <th>Edit</th>
                  <th>delete</th>
                  <th>Check appointments</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(doctor, i) in doctors" :key="i">
                  <td>{{ doctor.servicenames.service_name }}</td>
                   <td><router-link class="item"
              :to="{ name: 'UpdateDoctorService', params: { id: doctor.id } }"
            >
              <v-icon
      large
      text 
      color="teal darken-2"
    >
 
      mdi-application-edit
    </v-icon> </router-link> </td>

<!--
 <b-button id="show-btn" class="btn btn-danger" @click="$bvModal.show('bv-modal-example')">Delete</b-button>

  <b-modal id="bv-modal-example" hide-footer>
    <template #modal-title>
      Delete account
    </template>
    <div class="d-block text-center">
      <h3>Do you want to delete your account</h3>
    </div>
    <b-button class="btn btn-primary mt-3" block @click="$bvModal.hide('bv-modal-example')">Cancel</b-button>
    <b-button class="btn btn-danger mt-3" block   @click="deleteUser($route.params.id)">delete</b-button>
  </b-modal>

-->

                            <td>
                              
                        <b-button class="mod"  @click="$bvModal.show('bv-modal-example')"><v-icon
      large
      color="teal darken-2"
    >
      mdi-delete
    </v-icon></b-button>
    <b-modal id="bv-modal-example" hide-footer>
    <template #modal-title>
      Delete service
    </template>
    <div class="d-block text-center">
      <h3>Do you want to delete your service</h3>
    </div>
    <b-button class="btn btn-primary mt-3" block @click="$bvModal.hide('bv-modal-example')">Cancel</b-button>
    <b-button class="btn btn-danger mt-3" block   @click="DeleteService(doctor.id)">delete</b-button>
  </b-modal></td>
<td><router-link class="item"
              :to="{ name: 'DoctorAppointment', params: { id: doctor.id } }"
            >
              <v-icon
      large
      text 
      color="teal darken-2"
    >
 
      mdi-ticket-account
    </v-icon> </router-link> </td>

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
      doctors: [],
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
        .get("/api/doctor/" + this.$route.params.id + "/services", {
          headers: {
            Authorization: "Bearer " + this.token,
          },
        })
        .then((response) => {
          //  const user=response.data
          // this.clinic_name=user.clinic_name
          this.doctors = response.data;
          console.log(this.doctors);
        })
        .catch((error) => {
          console.log("ERROR");
          console.log(error);
        });
    },
    DeleteService(id) {
      axios
        .delete("/api/doctor/" + id, {
          headers: {
            Authorization: "Bearer " + this.token,
          },
        })
        .then((response) => {
          console.log(response);
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your Account have been deleted",
            showConfirmButton: false,
            timer: 1500,
          });
          this.$router.push("/DoctorHome");
        })
        .catch((error) => {
          console.log(error);
        });
    },
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
.mod{
  padding: 0;
border: none;
color:black;
background: none;
}
</style>