<template>
<div>
<div class="row justify-content-center" >
  <div class="col-md-6">
<div class="card">
  <div class="card-header">
    Register
  </div>
  <div class="card-body">
    <form action="#" @submit.prevent="register">
    <div class="form-group">
      <input type="text" class="form-control" name="name" placeholder="name" v-model="formData.name">
         <p class="text-danger" v-text="errors.name"></p>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="email" placeholder="email" v-model="formData.email">
    <p class="text-danger" v-text="errors.email"></p>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="password" placeholder="password" v-model="formData.password">
    <p class="text-danger" v-text="errors.password"></p>
    </div>
     <div class="form-group">
      <input type="password" class="form-control" name="password_confirmation" placeholder="password_confirmation" v-model="formData.password_confirmation">
    <p class="text-danger" v-text="errors.password"></p>
    </div>
    <div class="form-group">
     <select name="role" v-model="formData.role">
       <option value="user">patient</option>
       <option value="doctor">doctor</option>
     </select>
     {{formData.role}}
      <p class="text-danger" v-text="errors.role"></p>
    </div>
    <div class="row">
      <div class="col-md-6">
        <button type="submit"  class="btn btn-primary">Register</button>
      </div>
    </div>
    </form>
  </div>
</div>

  </div>
</div>

<pre>
  {{formData}}
</pre>

</div>
</template>

<script>
import axios from 'axios'
export default {
data(){
  return{
    formData:{
      name:'',
      email:'',
      password:'',
      password_confirmation:'',
      role:'',
    },
    errors:{}
  }
},
methods:{
  register(){
      axios.post('/api/register',this.formData).then((response)=>{
        console.log(response.data)
        
        this.errors={}
        var $statues=this.formData.role
        console.log($statues)
        if($statues == 'doctor'){
            this.$router.push('/hello')   
        }else {
        this.$router.push('/')
        }
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