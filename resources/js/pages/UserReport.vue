<template>
<div>
  <!--   hello {{$route.params.id}} -->
  <div class="row justify-content-center my-4" >
  <div class="col-md-6">
<div class="card">
  <div class="card-header">
   Report problem 
  </div>
  <div class="card-body">
    <form action="#" @submit.prevent="createReport">
    <div class="form-group">
      <label for="">Title</label>
      <input type="text" class="form-control" name="title" placeholder="title" v-model="formData.title">
        
    </div>
    <div class="form-group">
      <label for="">body</label>
      <input type="text" class="form-control" name="body" placeholder="body" v-model="formData.body">
    </div>
    

   
   
   
    <div class="row">
      <div class="col-md-6">
        <button type="submit"  class="btn btn-primary">submit</button>
      </div>
    </div>
    </form>

  </div>
</div>

  </div>
</div>
<pre>
 
</pre>

</div>
</template>

<script>
import axios from "axios";
import Navbar from "../components/Navbar.vue"
export default {
  data() {
    return {
        
       formData:{
      title:'',
      body:'',
      user_id:this.$route.params.id,
        
    },
      token: localStorage.getItem("token"),
     
    };
  },
  components:{
       Navbar
  },
  methods:{
   createReport(){
    axios.post('/api/reports/',this.formData,{
      headers: {
      Authorization: "Bearer " + this.token,
      }
     
    }).then(response=>{
      console.log(response)
      Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'we recived your report',
  showConfirmButton: false,
  timer: 1500
})
 this.$router.push('/service')
    }).catch(error =>{
      console.log(error)
    })
   },
  
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




