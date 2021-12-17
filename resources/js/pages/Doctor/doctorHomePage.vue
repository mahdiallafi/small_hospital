<template>
  <div class="container">
     
    <div class="row">
         <Sidebar/>
    </div>
</div> 
  
</template>

<script>
import axios from "axios";
import Sidebar from "../../components/doctorNavbar.vue";
export default {
  data: function () {
    return {
      users: {},
       isLoggedIn: false,
             token: localStorage.getItem("token"),
    };
  },
  components: {
    Sidebar,
  },
  methods: {
    loadUsers() {
      axios.get("api/users",{
        headers: {
            Authorization: "Bearer " + this.token,
          },
      }
         
    ).then(({ data }) => (this.users = data.data));
       this.isLoggedIn= false
      console.log(this.users)
    },
    
  },
  created() {
    this.loadUsers();
    this.isLoggedIn= false
  
  },
  /* mounted() {
        axios.get('/api/users')
            .then(function (response) {
              this.users=response.data
            console.log(response);
        })
        .catch(function (error) {
            console.log(error.message);
        });
    } */

}
</script>

<style>
</style>