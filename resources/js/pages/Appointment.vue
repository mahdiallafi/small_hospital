<template>
<div>
      <Navbar/>
<div class="row justify-content-center" >
  <div class="col-md-6">
<div class="card">
  <div class="card-header">
    new service  ssss
  </div>
  <div class="card-body">
    <form action="#" @submit.prevent="createserviceDoctor">
   <b-form-datepicker v-model="formData.app_date" locale="en"></b-form-datepicker>
     <p class="text-danger" v-text="errors.app_date"></p>
     <b-form-timepicker v-model="formData.app_time" locale="en"></b-form-timepicker>
     <p class="text-danger" v-text="errors.app_time"></p>
     <br>
   
    <!--   <div class="form-group">
      <input type="text" class="form-control" name="Fre_places"  placeholder="Fre_places" v-model="formData.Fre_places"  >
         <p class="text-danger" v-text="errors.Fre_places"></p>
    </div>
 
   {{this.$route.params.id}} -->
       
  <div class="row">
      <div class="col-md-6">
        <button type="submit"   class="btn btn-primary">Add</button>
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
import Navbar from "../components/Navbar.vue";
export default {
data(){
  return{
      currentUser: {},
    
    formData:{
      app_date:'',
      app_time:'',
      Fre_places:12,
      user_id:'',
      doctor_id:this.$route.params.id,

    },
     
    token: localStorage.getItem("token"),
    errors:{}
  }
},
  components: {
    Navbar,
  },
methods:{
    send(){
axios.post('/api/email',{
                app_date: this.app_date,
                app_time: this.app_time,
                Fre_places: this.Fre_places

      },{
     headers: {
            Authorization: "Bearer " + this.token,
          },
}).then((response)=>{
         

/* axios.post('/api/email',{
                app_date: this.app_date,
                app_time: this.app_time,
                Fre_places: this.Fre_places

      },{
     headers: {
            Authorization: "Bearer " + this.token,
          }
          }), */
        console.log(response.data)
      
        this.errors={}
         this.$router.push('/')   
        this.$toaster.success('Account created')
      
      }).catch((errors)=>{
         this.errors=errors.response.data.errors
         console.log(errors.response.data.errors)
      })
    },
  createserviceDoctor(){
 this.formData.user_id=this.currentUser.id
 ///this.formData.doctor_id=this.currentUser.id
      axios.post('/api/appointment',this.formData,{
            headers: {
            Authorization: "Bearer " + this.token,
          },
          
      }).then((response)=>{
         


        console.log(response.data)
      
        this.errors={}
         this.$router.push('/')   
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
        .get("/api/user", {
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
  
},
 mounted() {
    this.checkLoginStatus();
    
  },

};
</script>