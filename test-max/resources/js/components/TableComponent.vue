<template>
  <div class="container mt-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Start time</th>
                <th scope="col">End time</th>
                <th scope="col">Time</th>
                <th scope="col">Active</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for ="( task, index ) in tasks" :key="task.id">
                <td>
                    {{ task.id }}
                </td>
                <td>
                    {{ task.name_task }}
                </td>
                <td>
                    {{ task.start_time | moment('HH:mm:ss - DD-MM-YYY') }}
                </td>
                <td>
                    {{ task.end_time | moment('HH:mm:ss - DD-MM-YYY') }}
                </td>
                <td>
                    {{ task.time }}
                </td>
                <td>
                    <button :task="task" @click="deleteTask( task.name_task, task.id, index )" class="btn btn-outline-danger btn-sm" type="button">
                        Delete
                    </button>  
                </td>
            </tr>
            
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td colspan="3"><b>Total</b></td>
                <td colspan="2">{{ sum }}</td>
            </tr>
        </tfoot>
    </table>
  </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: [],
                sum: '20:00'
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
                this.tasks = response.data;
                this.getSum();
            }).catch(e => {}) },
            deleteTask: function(name, id, index) {
                this.$confirm("Do you want delete " + name + " task ?").then(()=>{
                    axios
                    .delete('api/delete/' + id)
                    .then( ()=>{
                        this.$delete(this.tasks, index);
                        this.$alert("Successfully deleted");
                        this.getSum();
                    }).catch(e => {});
                }).catch(e => {});
            },
            getSum: function(){
                let time = 0;
                this.tasks.forEach(function callback(task, index) {
                    let arr_time = task.time.split(':'),
                        hour = arr_time[0],
                        minute = arr_time[1],
                        seconds = arr_time[2],
                        time_seconds = ( parseInt(hour) * 3600 ) + ( parseInt(minute) * 60 ) + parseInt(seconds);
                    
                    time = time +  parseInt(time_seconds)

                });
                let timeFormat = (function (){
                    function num(val){
                        val = Math.floor(val);
                        return val < 10 ? '0' + val : val;
                    }

                    return function (ms/**number*/){
                        let sec = ms / 1000
                        , hours = sec / 3600
                        , minutes = sec / 60 % 60
                        , seconds = sec % 60
                        ;
                        return num(hours) + ":" + num(minutes) + ":" + num(seconds);
                    };
                })();
                

                this.sum = timeFormat(time*1000);
            },
           

        },
    }
</script>