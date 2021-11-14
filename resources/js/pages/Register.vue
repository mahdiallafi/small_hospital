<template>
<div class="d-flex justify-content-center pt-10">


  <div style="max-width: 19rem; min-width: 19rem; background-color: #E5E5E5;" class="p-3">
    <v-form ref="form" v-model="valid" lazy-validation>
      <v-text-field label="User name"></v-text-field>
      <v-text-field type="email" label="E-mail" required></v-text-field>
      <v-text-field label="Password"></v-text-field>
      <v-text-field label="Confirm password"></v-text-field>
    </v-form>
  </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
.login {
  margin-left: 25rem;
}
</style>