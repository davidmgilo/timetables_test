<template>
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <messages></messages>

                <div class="box box-default" id="createBox">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create Lesson</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form method="post" @submit.prevent="createLesson" @keydown="createForm.errors.clear($event.target.name)">
                            <div class="form-group has-feedback">
                                <label> Classroom ID:</label>
                                <input type="text" class="form-control" placeholder="" name="classroom_id" value="" v-model="createForm.classroom_id" autofocus/>
                            </div>
                            <div class="form-group has-feedback">
                                <label> Day ID:</label>
                                <input type="text" class="form-control" placeholder="" name="day_id" value="" v-model="createForm.day_id"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label> Location ID:</label>
                                <input type="text" class="form-control" placeholder="" name="location_id" v-model="createForm.location_id"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label> Timeslot ID:</label>
                                <input type="text" class="form-control" placeholder="" name="timeslot_id" v-model="createForm.timeslot_id"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label> User ID:</label>
                                <input type="text" class="form-control" placeholder="" name="user_id" v-model="createForm.user_id"/>
                            </div>
                            <div class="row">
                                <div class="col-xs-1">
                                </div><!-- /.col -->
                                <div class="col-xs-6">
                                </div><!-- /.col -->
                                <div class="col-xs-4 col-xs-push-1">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat" :disabled="createForm.errors.any()"><i class="fa fa-refresh fa-spin" v-if="createForm.submitting"></i>Create</button>
                                </div><!-- /.col -->
                            </div>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lessons</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Classroom</th>
                                <th>Day</th>
                                <th>Location</th>
                                <th>Timeslot</th>
                                <th>User</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <lesson v-for="(lesson,index) in lessons"
                                        :key="lesson.id"
                                    :lesson="lesson"
                                :index="index"></lesson>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Lesson from './Lesson.vue'
    import Messages from './Messages.vue'
    import Form from 'acacha-forms'
    import store from './../store'
    export default {
        components : { Lesson, Messages },
        data() {
            return {
                lessons: [],
                createForm: new Form(
                        {
                            classroom_id: '',
                            day_id : '',
                            location_id : '',
                            timeslot_id : '',
                            user_id: ''
                        }
                )
            }
        },
        created() {
            console.log('Component created');
            this.fetchData(1);
        },
        methods: {
            fetchData: function (page){
                axios.get('api/v1/lessons?page=' + page).then((response) => {
                    console.log(response.data)
                    this.lessons = response.data.data.data
                }, (error) => {
                    console.log(error);
                });
            },
            createLesson : function(){
                this.createForm.post('/lessons')
                        .then(response => {
                            console.log(response)
                            this.$myStore.createdOk = true
                        })
                        .catch(error => {
                            console.log(error.response.data)
                            this.$myStore.errorCreating = true
                        })
            }
        }
    }
</script>
