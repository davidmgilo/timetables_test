<template>
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Alerts</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <div class="box-body">
            <div class="alert alert-success alert-dismissible" v-if="messageOk">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Done!</h4>
                <p>{{message}} successfully!</p>
            </div>
            <div class="alert alert-danger alert-dismissible" v-if="errored">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-times"></i> Error</h4>
                <ul>
                    <li v-for="error in errors">
                        {{ error[0]}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import EventBus from './../eventBus'
    export default {
        data() {
            return {
                messageOk: false,
                errored: false,
                message: '',
                errors: []
            }
        },
        mounted() {
            EventBus.$on('created', event => {
                console.log(event)
                this.messageOk = true
                this.errored = false
                this.message = event
            })
            EventBus.$on('updated', event => {
                console.log(event)
                this.messageOk = true
                this.errored = false
                this.message = event
            })
            EventBus.$on('errored', event => {
                console.log(event)
                this.errors = event.errors
                this.messageOk = false
                this.errored = true
            })
        }
    }
</script>
