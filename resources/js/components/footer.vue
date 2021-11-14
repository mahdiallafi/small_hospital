<template>
  <div>
    <v-row justify="center" >
      <v-col>
        <v-img
          class="logoimage"
          max-height="50"
          max-width="150"
          src="./asset/app.png"
        >
        </v-img>
        <p class="ml-5">
          our application help you to find the <br />service you look for and
          book appointment.
        </p>
      </v-col>

      <v-col>
        <h4 class="mt-2">Address</h4>
        <ul>
          <p><font-awesome-icon icon="phone-volume" />   +123456789</p>
          <p><font-awesome-icon icon="envelope-square"/>  clin@info.lt</p>
          <p><font-awesome-icon icon="home" />   kaunas,lithunia</p>
        </ul>
      </v-col>
      <v-col>
        <h4 class="mt-2">Links</h4>
        <ul>
          <li v-for="item in items" v-bind:key="item">{{ item.it }}</li>
        </ul>
      </v-col>

      <v-col class="py-4 text-center black--text" cols="12">
        <v-divider></v-divider>
        {{ new Date().getFullYear() }} <strong>clin@copyright</strong>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [{ it: "serice" }, { it: "About us" }, { it: "Contact us" }],
    };
  },
};
</script>

