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
      <input type="text" class="form-control" name="service_name"  v-model="service_name">
        
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
 {{service_name}}

</div>
</template>

<script>

import axios from "axios";

export default {
  data() {
    return {   
        service_name:'',
      token: localStorage.getItem("token"),
     
    };
  },
 
  methods:{
   updateservice(){
    axios.put('/api/services/'+ this.$route.params.id,{
      service_name:this.service_name,
 
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
       this.$router.push('/serviceadmin')
    }).catch(error =>{
      console.log(error)
    })
   },
  
  }, 
  ///here we mounted when activity start 
  mounted(){
    axios.get('/api/service/'+ this.$route.params.id, {
      headers: {
      Authorization: "Bearer " + this.token,
      }
    }).then(response=>{
      const user=response.data
      this.service_name=user.service_name
    
      console.log(user.service_name)
    }).catch(error =>{
      console.log(error)
    })
  }
  

  
}
</script>

<style>

</style>