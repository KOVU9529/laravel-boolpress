<template>
   <div class="container">
        <h3>Sono la ContactPage</h3>
        <div v-if="success" class="alert alert-success" role="alert">
            Grazie per averci contattato
        </div>
        <!--Non si utilizza action perchè non bisogna mandare l'utente ad un altro URL
            Di conseguenza anche name perde la sua utilità-->
        <form @submit.prevent="sendMessage">
        <div class="form-group">
            <label for="user-name">Nome utente</label>
            <input v-model="userName" type="text" class="form-control" id="user-name" >
            <div v-if="errors.name">
                <div v-for="error,index in errors.name" :key="index" class="alert alert-danger" role="alert">
                    {{error}}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="user-email">Indirizzo email utente</label>
            <input v-model="userEmail" type="text" class="form-control" id="user-email">
            <div v-if="errors.email">
                <div v-for="error,index in errors.email" :key="index" class="alert alert-danger" role="alert">
                    {{error}}
               </div>
            </div>
        </div>
        <div class="form-group">
            <label for="user-message">Messaggio utente</label>
            <textarea v-model="userMessage"  class="form-control" id="user-message" rows="10"></textarea>
            <div v-if="errors.message">
                <div v-for="error,index in errors.message" :key="index" class="alert alert-danger" role="alert">
                    {{error}}
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-warning" :disabled="sending">
        </form>  
   </div>
</template>

<script>
export default {
    name:'ContactPage',
    //come si prendono i dati da un oggetto? v-model
    data(){
        return{
            userName:'',
            userEmail:'',
            userMessage:'',
            success:false,
            errors:{},
            sending:false
        }
    },
    methods:{
        sendMessage(){
            this.sending = true;
            
            axios.post('/api/leads', {
                name: this.userName,
                email: this.userEmail,
                message: this.userMessage
            })
            .then((response)=>{
                if(response.data.success){
                    //la chiamata è positiva
                    this.success=true;
                    this.userName='';
                    this.userEmail='';
                    this.userMessage='';
                    //gli errori si azzerano se la chiamata è positiva
                    this.errors={};
                }else{
                this.errors=response.data.errors;
                }
                this.sending=false;
            });
        }
    }
}
</script>