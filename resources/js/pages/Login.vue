<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">login</div>
          <div class="card-body">
            <form action="#" @submit.prevent="login">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  name="email"
                  placeholder="email"
                  v-model="formData.email"
                />
                <p class="text-danger" v-text="errors.email"></p>
              </div>
              <div class="form-group">
                <input
                  type="password"
                  class="form-control"
                  name="password"
                  placeholder="password"
                  v-model="formData.password"
                />
                <p class="text-danger" v-text="errors.password"></p>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary">login</button>
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
      formData: {
        email: "",
        password: "",
        device_name: "browser",
      },
      errors: {},
    };
  },
  methods: {
    login() {
      axios
        .post("api/login", this.formData)
        .then((response) => {
          console.log(response.data.token);
          localStorage.setItem("token", response.data.token);
          axios
            .get("/api/user", {
              headers: {
                Authorization: "Bearer " + response.data.token,
              },
            })
            .then((response) => {
              console.log(response);
              if (response.data.role == "doctor") {
                this.$router.push({
                  path: "/DoctorHome",
                  params: response.data,
                });
              }
              if (response.data.role == "user") {
                this.$router.push({
                  path: "/service",
                  params: response.data,
                });
              }
              if (response.data.role == "admin") {
                this.$router.push({
                  path: "admin",
                  params: response.data,
                });
              }
            });
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors;
        });
    },
  },
};
</script>


<style>
</style>