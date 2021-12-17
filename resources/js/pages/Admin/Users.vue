<template>
  <div class="container">
     
    <div class="row">
         <Sidebar/>
        <div class="col-md-8 col-md-offset-2 container">
            <div class="panel panel-default">
                <div class="panel-heading">List of users</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                          <tr>


                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <!-- <th>Edit</th>
                            <th>delete</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="user in users" v-bind:key="user.id">
                            <td>{{user.name}}</td>
                            <td>{{user.email}}</td>
                            <td>{{user.role}}</td>
                           
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
import Sidebar from "../../components/Sidebar.vue";
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