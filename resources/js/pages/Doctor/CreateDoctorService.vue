<template>
<div>
<div class="row justify-content-center" >
  <div class="col-md-6">
<div class="card">
  <div class="card-header">
    new service  ssss
  </div>
  <div class="card-body">
    <form action="#" @submit.prevent="createserviceDoctor">
 
    <div class="form-group">
      <input type="text" class="form-control" name="clinic_name" placeholder="clinic_name" v-model="formData.clinic_name">
         <p class="text-danger" v-text="errors.clinic_name"></p>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="clinic_location" placeholder="clinic_location" v-model="formData.clinic_location">
         <p class="text-danger" v-text="errors.clinic_location"></p>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="Free_days" placeholder="Free_days" v-model="formData.Free_days" >
         <p class="text-danger" v-text="errors.Free_days"></p>
    </div>
   <div class="form-group">
     <select name="service_name" v-model="formData.service_id" style="width:15rem;" >
       <option value="">Choose</option>
       <option v-for="service in services" v-bind:key="service.id" :value="service.id" >{{service.service_name}}</option>
  
     </select>

          
    
      <p class="text-danger" v-text="errors.service_id"></p>
    </div>
   <!--  <div class="form-group">
      <input type="text" class="form-control" name="user_id"  placeholder="user_id" v-model="formData.user_id"  >
         <p class="text-danger" v-text="errors.user_id"></p>
    </div> -->
  <div class="row">
      <div class="col-md-6">
        <button type="submit"  class="btn btn-primary">Add</button>
      </div>
    </div>

    
      
    </form>
  </div>
</div>

  </div>
</div>
<!-- <pre>{{formData}}</pre> -->

</div>
</template>

<script>
import axios from 'axios'
export default {
data(){
  return{
      currentUser: {},
     services: {},
    formData:{
      clinic_name:'',
      clinic_location:'',
      Free_days:'',
      service_id:'',
      user_id:'',
        
    },
     
    token: localStorage.getItem("token"),
    errors:{}
  }
},
methods:{
  createserviceDoctor(){
       this.formData.user_id=this.currentUser.id
      axios.post('/api/doctor',this.formData,{
            headers: {
            Authorization: "Bearer " + this.token,
          },
          
      }).then((response)=>{
         
        console.log(response.data)
      
        this.errors={}
         this.$router.push('/DoctorHome')   
        this.$toaster.success('Account created')
      
      }).catch((errors)=>{
         this.errors=errors.response.data.errors
         console.log(errors.response.data.errors)
      })
  },
  checkLoginStatus() {
      this.loading = true;
      // this.loading = true
      axios
        .get("api/user", {
          headers: {
            Authorization: "Bearer " + this.token,
          },
        })
        .then((response) => {
          
          this.currentUser = response.data;
          console.log("LOGGED IN");
          this.isLoggedIn = true;
		  console.log( this.currentUser.id)
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
    loadUsers() {
      axios.get("api/services").then(({ data }) => (this.services = data.data));
       this.isLoggedIn= false
      console.log(this.services)
    },
},
 mounted() {
    //  axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
    this.loadUsers();
    this.checkLoginStatus();
    
  },

};
</script>