<template>
  <div class="container">
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
    </table>
    {{ info }}
  </div>
</template>

<script>
    export default {
         data() {
            return {
                info: null
            };
        },
        props: [
            'tasks'
        ],
        
        mounted() {
        },
        methods: {
            del: function (index) {
            // this.arr.splice(index, 1)
                Vue.delete(this.tasks, index)
            },
            deleteTask: function(name, id, index) {
                this.$confirm("Do you want delete " + name + " task ?").then(()=>{
                    axios
                    .delete('delete/' + id)
                    // .then(() => this.tasks.splice(index, 1))
                    .then( ()=>{
                        this.del(index);
                        // this.tasks.splice(index, 1)
                        // this.$delete(this.tasks, index)
                        console.log(this.tasks)
                        console.log(index);
                    }
                    //     this.tasks.splice(index - 1, 1);
                        
                    ).catch(e => {});
                    // .then(this.$alert("Hello Vue Simple Alert."))
                }).catch(e => {});
            }
        },
    }
</script>