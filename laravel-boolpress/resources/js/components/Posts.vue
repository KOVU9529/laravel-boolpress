<template>
    <section>
        <h2>
          
        </h2>
    </section>
</template>

<script>
export default {
    name:'Posts', 
    data(){
        return{
            posts:[],
        };
    },
    mounted(){
        axios.get('http://127.0.0.1:8000/api/posts')
        .then((response)=>{
            this.posts = response.data.results;
        });
    },
}
</script>