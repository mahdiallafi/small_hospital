<template>
  <div>
    hello {{$route.params.id}}
  <div class="row justify-content-center" >
  <div class="col-md-6">
<div class="card">
  <div class="card-header">
    Register
  </div>
  <div class="card-body">
    <form action="#" @submit.prevent="updateservice">
    <div class="form-group">
      <label for="">Clinic name</label>
      <input type="text" class="form-control" name="clinic_name"  v-model="clinic_name">     
    </div>
    <div class="form-group">
      <label for="">Clinic location</label>
      <input type="text" class="form-control" name="clinic_location"  v-model="clinic_location">     
    </div>
    <div class="form-group">
      <label for="">work days</label>
      <input type="text" class="form-control" name="Free_days"  v-model="Free_days">     
    </div>
    <div class="row">
      <div class="col-md-6">
        <button type="submit"  class="btn btn-primary">Update</button>
      </div>
    </div>
    </form>
     


  </div>
</div>

  </div>
</div>


</div>
</template>

<script>

import axios from "axios";

export default {
  data() {
    return {   
        clinic_name:'',
        clinic_location:'',
        Free_days:'',
      token: localStorage.getItem("token"),
     
    };
  },
 
  methods:{
   updateservice(){
    axios.put('/api/doctor/'+ this.$route.params.id,{
      clinic_name:this.clinic_name,
      clinic_location:this.clinic_location,
      Free_days:this.Free_days,
 
    },{
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
       this.$router.push('/DoctorHome')
    }).catch(error =>{
      console.log(error)
    })
   },
  
  }, 
  ///here we mounted when activity start 
  mounted(){
    axios.get('/api/doctor/'+ this.$route.params.id, {
      headers: {
      Authorization: "Bearer " + this.token,
      }
    }).then(response=>{
      const user=response.data


      this.clinic_name=user.clinic_name
      this.clinic_location=user.clinic_location
      this.Free_days=user.Free_days
    
    
      console.log(user.clinic_name)
    }).catch(error =>{
      console.log(error)
    })
  }
  

  
}
</script>

<style>

</style>