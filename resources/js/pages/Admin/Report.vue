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


                            <th>title</th>
                            <th>body</th>
                            <th>writter</th>
                         
                           
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="report in reports" v-bind:key="report.id">
                            <td>{{report.title}}</td>
                            <td>{{report.body}}</td>
                            <td>{{report.userreport.name}}</td>
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
      reports: {},
       isLoggedIn: false,
       token: localStorage.getItem("token"),
    };
  },
  components: {
    Sidebar,
  },
  methods: {
    loadUsers() {
      axios.get("api/reports",{
        headers: {
            Authorization: "Bearer " + this.token,
          },
      }
         
    ).then(({ data }) => (this.reports = data.data));
       this.isLoggedIn= false
      console.log(this.reports)
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