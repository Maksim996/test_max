<template>
    <div>
        
        <my-table-component :tasks="tasks" ></my-table-component>

    </div>
</template>
<script>
export default {
    props: [
        'tasks'
    ],
    mounted() {
        this.updat()
    },
    methods:{
        updat: function(){
            console.log(this.tasks + 'sdsds')
        }
    }   
}

</script>