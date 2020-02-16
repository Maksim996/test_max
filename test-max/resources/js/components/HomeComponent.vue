<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="nameTask">Name task</label>
                    <input type="input" v-model="message" class="form-control" id="nameTask" placeholder="Name task">
                </div>  
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn" 
                :class="isActiveBtn ? 'btn-outline-danger':'btn-outline-success' " 
                @click="toggleBtn()" >
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
                    this.message =''
                }else{
                    this.isActiveBtn = true
                    this.addTask(this.message)
                }
                
            }
            
        },
        addTask: function(message){
            axios.post('api/save', {
                message: this.message,
            }).then(res => {
                console.log('otpravilo')
                // this.quotes[index].quote_id = res.data.quote_id
            })
        }


    },
    
}

</script>