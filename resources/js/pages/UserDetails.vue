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
    <form action="#" @submit.prevent="updateUser">
    <div class="form-group">
      <input type="text" class="form-control" name="name" placeholder="name" v-model="name">
        
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="email" placeholder="email" v-model="email">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="password" placeholder="password" v-model="password">
   
    </div>
   
   
    <div class="row">
      <div class="col-md-6">
        <button type="submit"  class="btn btn-primary">Update</button>
      </div>
    </div>
    </form>
    <button type="submit" @click="deleteUser($route.params.id)">Delete</button>
  </div>
</div>

  </div>
</div>
 {{id}}

</div>
</template>

<script>
import axios from "axios";
import Navbar from "../components/Navbar.vue"
export default {
  data() {
    return {
        
        name:'',
      email:'',
      password:'',
      id:'',
   
    


      token: localStorage.getItem("token"),
     
    };
  },
  components:{
       Navbar
  },
  methods:{
   updateUser(){
    axios.put('/api/users/'+ this.$route.params.id,{
      name: this.name,
     email:this.email
    },{
      headers: {
      Authorization: "Bearer " + this.token,
      }
     
    }).then(response=>{
      console.log(response)
    }).catch(error =>{
      console.log(error)
    })
   },
   deleteUser(id){
      axios.delete('/api/user/'+ id,{
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
       this.$router.push('/')
    }).catch(error =>{
      console.log(error)
    })
   }
  }, 
  mounted(){
    axios.get('/api/users/'+ this.$route.params.id, {
      headers: {
      Authorization: "Bearer " + this.token,
      }
    }).then(response=>{
      const user=response.data
      this.name=user.name
      this.email=user.email
      console.log(user.email)
    }).catch(error =>{
      console.log(error)
    })
  }
}

</script>

<style>

</style>




