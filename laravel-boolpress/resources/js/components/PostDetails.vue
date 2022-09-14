<template>
    <div class="container">
        <div class="card mt-3" >
             <!--<img src="..." class="card-img-top" alt="...">-->
            <div class="card-body">
               <h5 class="card-title"><h5 class="btn btn-success">{{post.title}}</h5></h5>
               <p class="card-text">{{truncateText(post.content)}} </p>
               <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
            </div>
            <router-link 
             :to="{name:'single-post',
             params:{slug : post.slug}}" 
             class="btn btn-info m-1">Dettagli
            </router-link>
        </div>
    </div>
</template>
<script>
export default {
    name:'PostDetails',
    props:{
        //per stampare gli elementi si necessita dell'oggeto post
        post:Object
    },
    methods:{
        //funzione per regolare la lunghezza da visualixzzare
        truncateText(text){
            if(text.length >75){
                return text.slice(0,75) + '...';
            }
            return text;
        },
    }

    
    
}
</script>
