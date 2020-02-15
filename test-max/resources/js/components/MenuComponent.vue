<template>
    <div class="container mt-1">
        <ul class="nav  nav-pills justify-content-end">
            <li class="nav-item">
                <router-link class="nav-link mr-2" active-class="active" :to="{path: '/Home'}" >Home</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" active-class="active" :to="{path: '/Arhive'}"  >Arhive</router-link>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
   
        
}

</script>