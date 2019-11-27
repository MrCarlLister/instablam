<template>
  <div>
    <button class="ml-2 btn btn-primary btn-sm" @click="followUser" v-text="buttonText"></button>
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],
  mounted() {
    console.log("Component mounted.");
  },

  data: function() {
    return {
      status: this.follows
    };
  },

  methods: {
    followUser() {
      // make calls to api from vue
      axios
        .post("/follow/" + this.userId)
        .then(response => {
          console.log(response.data);
          this.status = !this.status;
        })
        .catch(errors => {
          if (errors.response.status == 401) {
            window.location = "/login";
          }
        });
    }
  },
  computed: {
    buttonText() {
      console.log(this.status);
      return this.status ? "Unfollow" : "Follow";
    }
  }
};
</script>

