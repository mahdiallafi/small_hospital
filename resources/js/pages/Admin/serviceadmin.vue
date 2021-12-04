<template>
  <div class="container">
    <div class="row">
             <Sidebar/>
        <div class="col-md-8 col-md-offset-2">
           <v-row class="mb-2 mt-3">
               <div class="panel-heading">List of services</div>
            
                
                <v-row justify="end">
                 
                   <router-link class="item"
              :to="{ name: 'CreateService' }"
            >
             New              <v-icon
      large
      text 
      color="teal darken-2"
    >
 
      mdi-open-in-new
    </v-icon> </router-link>          
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
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="service in services" v-bind:key="service.id">
                            <td>{{service.service_name}}</td>
                           
                            <td><router-link class="item"
              :to="{ name: 'UpdateService', params: { id: service.id } }"
            >
              <v-icon
      large
      text 
      color="teal darken-2"
    >
 
      mdi-application-edit
    </v-icon> </router-link> </td>
                            <td><v-btn @click="DeleteService(service.id)"><v-icon
      large
      color="teal darken-2"
    >
      mdi-delete
    </v-icon></v-btn></td>
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
import Sidebar from "./../../components/Sidebar.vue";
export default {
  data: function () {
    return {
      services: {},
       isLoggedIn: false,
       
       
 token: localStorage.getItem("token"),
    };
  },
  components: {
    Sidebar,
  },
  methods: {
    loadUsers() {
      axios.get("api/services").then(({ data }) => (this.services = data.data));
       this.isLoggedIn= false
      console.log(this.services)
    },
    DeleteService(id){
      axios.delete('/api/services/'+ id,{
      headers: {
      Authorization: "Bearer " + this.token,
      }
     
    }).then(response=>{
      console.log(response)
      Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your Account have been deleted',
  showConfirmButton: false,
  timer: 1500
})
       this.$router.push('/admin')
    }).catch(error =>{
      console.log(error)
    })
   }
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
.item{
    text-decoration: none !important;
}
</style>