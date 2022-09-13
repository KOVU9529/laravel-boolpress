<template>
    <div class="container">
        <header>
           <h2>Header</h2>
           <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                               <router-link to="/" class="nav-link">Home</router-link>
                            </li>
                            <li class="nav-item">
                               <router-link to="/about" class="nav-link">About</router-link>
                            </li>
                            <li class="nav-item">
                               <router-link to="/blog" class="nav-link">Blog</router-link>
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