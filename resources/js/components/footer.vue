<template>
<!--   <div>
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
  </div> -->
   <v-footer
    dark
  bottom fixed
    padless
  >
    <v-card
      flat
      tile
      class="indigo lighten-1 white--text text-center"
    >
      <v-card-text>
        <v-btn
          v-for="icon in icons"
          :key="icon"
          class="mx-4 white--text"
          icon
        >
          <v-icon size="24px">
            {{ icon }}
          </v-icon>
        </v-btn>
      </v-card-text>

      <v-card-text class="white--text pt-0">
        Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit amet. Mauris cursus commodo interdum. Praesent ut risus eget metus luctus accumsan id ultrices nunc. Sed at orci sed massa consectetur dignissim a sit amet dui. Duis commodo vitae velit et faucibus. Morbi vehicula lacinia malesuada. Nulla placerat augue vel ipsum ultrices, cursus iaculis dui sollicitudin. Vestibulum eu ipsum vel diam elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
      </v-card-text>

      <v-divider></v-divider>

      <v-card-text class="white--text">
        {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<script>
  export default {
    data: () => ({
      icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-linkedin',
        'mdi-instagram',
      ],
    }),
  }
/* export default {
  data() {
    return {
      items: [{ it: "serice" }, { it: "About us" }, { it: "Contact us" }],
    };
  },
}; */
</script>

