<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="nameTask">Name task</label>
                    <input type="input" class="form-control" id="nameTask" placeholder="Name task">
                </div>  
            </div>
            <div class="col-lg-6">
                <button type="button">Start</button>
            </div>
        </div>      


        <my-table-component></my-table-component>

    </div>
</template>
<script>
export default {
 
}

</script>