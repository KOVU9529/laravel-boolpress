<template>
    <section>
        <div class="container">
            <h2>
                Lista post
            </h2>
            <div class="row row-cols-3">
            <div v-for="singlepost in posts" :key="singlepost.id" class="col">
                <!--post=props singlepost=variabile-->
                <PostDetails :post="singlepost"/>
            </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination mt-3">
                    <!--previus button-->
                    <li class="page-item" :class="{'disabled' : currentPage == 1}">
                      <a class="page-link" @click.prevent="getPosts(currentPage - 1)" href="#">Previous</a>
                    </li>
                     <!--number page-->
                    <li  v-for="pageNumber in lastPage" :key="pageNumber" class="page-item" :class="{'active' : pageNumber == currentPage}">
                      <a @click.prevent="getPosts(pageNumber)" class="page-link" href="#">{{pageNumber}}</a>
                    </li>
                    <!--next button-->
                    <li class="page-item" :class="{'disabled' : currentPage == lastPage }">
                      <a class="page-link" @click.prevent="getPosts(currentPage + 1)" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</template>

<script>
import PostDetails from './PostDetails.vue';
export default {
    name:'Posts', 
    components:{
        PostDetails
    },
    data(){
        return{
            posts:[],
            currentPage:1,
            lastPage: null

        };
    },
    methods:{
        //per passare da una pagina all'altra
        //passo 'pageNumber' come argomento
        //tramite il metodo params aggiungo '?page=NUMERO DELLA PAGINA'
        getPosts(pageNumber){
            axios.get('http://127.0.0.1:8000/api/posts', 
            {
                params:{
                    page:pageNumber
                }
            })
            .then((response)=>{
                //aggiungo .data per la paginazione
                this.posts = response.data.results.data;
                this.currentPage = response.data.results.current_page;
                this.lastPage = response.data.results.last_page;

            });
        }
    },
    mounted(){
        this.getPosts(1);
    }
}
</script>