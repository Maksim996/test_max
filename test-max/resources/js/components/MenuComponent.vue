<template>
    <div class="container">
        <ul class="nav  nav-pills justify-content-end">
            <li class="nav-item">
                <router-link class="nav-link" active-class="active" :to="{path: '/Home', props: { tasks } }" >Home</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" active-class="active" :to="{path: '/Arhive', props: { tasks } }"  >Arhive</router-link>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    props: [
        'tasks'
    ],
        
}

</script>