<template>
<div>
<div class="row justify-content-center" >
  <div class="col-md-6">
<div class="card">
  <div class="card-header">
    new service
  </div>
  <div class="card-body">
    <form action="#" @submit.prevent="createservice">
    <div class="form-group">
      <input type="text" class="form-control" name="service_name" placeholder="service_name" v-model="formData.service_name">
         <p class="text-danger" v-text="errors.service_name"></p>
    </div>
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

</div>
</template>

<script>
import axios from 'axios'
export default {
data(){
  return{
    formData:{
      service_name:'',
        
    },
    token: localStorage.getItem("token"),
    errors:{}
  }
},
methods:{
  createservice(){
      axios.post('/api/services',this.formData,{
            headers: {
            Authorization: "Bearer " + this.token,
          },
      }).then((response)=>{
        console.log(response.data)
      
        this.errors={}
         this.$router.push('/serviceadmin')   
        this.$toaster.success('Account created')
      
      }).catch((errors)=>{
         this.errors=errors.response.data.errors
         console.log(errors.response.data.errors)
      })
  },
}

};
</script>

<style>
.login {
  margin-left: 25rem;
}
</style>