<template>
    <div class="container">
        <header>
           <h2>Seleziona la pagina</h2>
           <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <router-link to="/" class="nav-link">
                                    <h3 class="btn btn-warning">Home</h3>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/about" class="nav-link">
                                    <h3 class="btn btn-danger">About</h3>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/blog" class="nav-link">
                                    <h3 class="btn btn-primary">Blog</h3>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/contact" class="nav-link">
                                    <h3 class="btn btn-success">Contattaci</h3>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
       </header>
    </div>
</template>

<script>
export default {
    name:'Header',
}
</script>