<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="nameTask">Name task</label>
                    <input type="input" v-model="message" class="form-control" id="nameTask" placeholder="Name task">
                </div>  
            </div>
            <div class="col-lg-6 d-flex align-items-center">


                <h1 class="mb-0">{{ time }}</h1>

                <button 
                    type="button" 
                    class="btn ml-3" 
                    :class="isActiveBtn ? 'btn-outline-danger':'btn-outline-success' " 
                    @click="toggleBtn()">
                    {{isActiveBtn? 'Stop': 'Start'}}
                </button>

            </div>
        </div>      

        <div class="row">    
            <my-table-component 
                v-bind:message="message"
            ></my-table-component>
        </div>
    </div>
</template>
<script>
export default {
    data () {
        return {
            isActiveBtn: false,
            message: '',
            startTime:'',

            // secondomer
            time:'00:00:00',
            seconds: 0, 
            minutes: 0, 
            hours: 0,
            t:''
            
        };
    },
    methods: {
        toggleBtn: function(){
            if(this.message.length === 0){
                this.$alert('Pls input name task')
            }
            else{
                if(this.isActiveBtn){
                    this.isActiveBtn = false
                    this.addTask(this.message, this.startTime, this.$moment().format('YYYY-MM-DD h:mm:ss'), this.time)
                    this.message = ''
                    this.stop()
                    this.clear()

                }else{
                    this.isActiveBtn = true
                    this.startTime = this.$moment().format('YYYY-MM-DD h:mm:ss')
                    this.start()

                }
                
            }
            
        },
        addTask: function(message,startTime,endTime,time){
            axios.post('api/save', {
                message: message,
                startTime: startTime,
                endTime: endTime,
                time: time
            }).then(res => {
                console.log('otpravilo')
            })
        },

        //secondomer 

 

        addTime: function () {
            this.seconds++;
            if (this.seconds >= 60) {
                this.seconds = 0;
                this.minutes++;
                if (this.minutes >= 60) {
                    this.minutes = 0;
                    this.hours++;
                }
            }
            this.time = (this.hours ? (this.hours > 9 ? this.hours : "0" + this.hours) : "00") + ":" + (this.minutes ? (this.minutes > 9 ? this.minutes : "0" + this.minutes) : "00") + ":" + (this.seconds > 9 ? this.seconds : "0" + this.seconds);
            this.timer();
        },
        timer: function () {
            this.t = setTimeout(this.addTime, 1000);
        },

        /* Start time */
        start: function(){
            this.timer()
        },

        /* Stop time  */
        stop:  function() {
            clearTimeout(this.t);
        },

        /* Clear time  */
        clear: function() {
            this.time = "00:00:00";
            this.seconds = 0; this.minutes = 0; this.hours = 0;
        }

    },
    
}

</script>

