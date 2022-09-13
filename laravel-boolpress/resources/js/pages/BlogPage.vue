<template>
   <div class="container">
       <h3>Sono la BlogPage</h3>
      <Posts/>
   </div>
</template>
<script>
import Posts from '../components/Posts.vue';

export default {
    name:'HomePage',
    components:{
        Posts
    }
}
</script>