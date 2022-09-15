<template>
   <div class="container">
       <div v-if="post">
            <h2>Titolo: <h2 class="btn btn-success">{{post.title}}</h2></h2>
            <img class="w-50" v-if="post.cover" :src="post.cover" :alt="post.title">
            <p class="btn btn-light">Contenuto: {{post.content}}</p>
            <div>  
                <h3 v-if="post.category"> Categoria: <h5  class="btn btn-warning">{{post.category.name}}</h5></h3>
            </div>
            <div v-if="post.tags.length > 0"> 
                <h3>Tags: <h5 class="btn btn-info mr-2" v-for="tag in post.tags" :key="tag.id">{{tag.name}}</h5></h3> 
            </div>
       </div>
   </div>
</template>

<script>
export default {
    name:'SinglePost',
    data(){
        return{
            post:null
        }
    },
    mounted(){
        axios.get('http://127.0.0.1:8000/api/posts/' + this.$route.params.slug)
        .then((response)=>{
            
            if(response.data.results){
                //il post c'è
                this.post=response.data.results; 
            }else{
                //il post non c'è
                this.$router.push({name:'notfound'}); 
            }
            
            
        });
    }
}
</script>