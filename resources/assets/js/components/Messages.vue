<template>
    <div class="box box-default">
        <div class="box-body">
            <div class="alert alert-success alert-dismissible" v-if="createdOk">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Done!</h4>
                <p>Created successfully!</p>
            </div>
            <div class="alert alert-danger alert-dismissible" v-if="errored">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-times"></i> Error creating</h4>
                <p>There has been an error!</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            createdOk: function () {
                return this.$myStore.createdOk
            },
            errored: function () {
                return this.$myStore.errorCreating
            }
        }
    }
</script>
