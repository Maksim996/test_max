<template>
  <div class="container mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Start time</th>
                <th scope="col">End time</th>
                <th scope="col">Sum time</th>
                <th scope="col">Active</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for ="(task, index) in tasks" :key="task.id">
                <td>
                    {{task.id}}
                </td>
                <td>
                    {{task.name_task}}
                </td>
                <td>
                    {{task.start_time}}
                </td>
                <td>
                    {{task.end_time}}
                </td>
                <td>
                    {{task.sum_time}}
                </td>
                <td>
                    <button :task="task" @click="deleteTask(task.name_task, task.id, index )" class="btn btn-outline-danger btn-sm" type="button">
                        Delete
                    </button>  
                </td>
            </tr>
            
        </tbody>
        <tfoot>
            <tr>
            <td>Sum</td>
            <td>$180</td>
            </tr>
        </tfoot>
    </table>
    {{ info }}
  </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: {},
            };
        },
        mounted() {
            
        },
        created() {
            this.getApp();
        },
        methods: {
            getApp : function() {
                axios.get("api/").then(response => {
                this.tasks = response.data
            })},
            deleteTask: function(name, id, index) {
                this.$confirm("Do you want delete " + name + " task ?").then(()=>{
                    axios
                    .delete('api/delete/' + id)
                    .then( ()=>{
                        this.$delete(this.tasks, index);
                        this.$alert("Successfully deleted")
                    }).catch(e => {});
                }).catch(e => {});
            }
        },
    }
</script>