<template>
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <messages id="messages" ref="messages"></messages>

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
                            <div class="form-group has-feedback" :class="{ 'has-error': createForm.errors.has('classroom_id') }">
                                <label> Classroom ID:</label>
                                <input type="text" class="form-control" placeholder="" name="classroom_id" value="" v-model="createForm.classroom_id" autofocus/>
                                <span class="help-block" v-if="createForm.errors.has('classroom_id')" v-text="createForm.errors.get('classroom_id')"></span>
                            </div>
                            <div class="form-group has-feedback" :class="{ 'has-error': createForm.errors.has('day_id') }">
                                <label> Day ID:</label>
                                <input type="text" class="form-control" placeholder="" name="day_id" value="" v-model="createForm.day_id"/>
                                <span class="help-block" v-if="createForm.errors.has('day_id')" v-text="createForm.errors.get('day_id')"></span>
                            </div>
                            <div class="form-group has-feedback" :class="{ 'has-error': createForm.errors.has('location_id') }">
                                <label> Location ID:</label>
                                <input type="text" class="form-control" placeholder="" name="location_id" v-model="createForm.location_id"/>
                                <span class="help-block" v-if="createForm.errors.has('location_id')" v-text="createForm.errors.get('location_id')"></span>
                            </div>
                            <div class="form-group has-feedback" :class="{ 'has-error': createForm.errors.has('timeslot_id') }">
                                <label> Timeslot ID:</label>
                                <input type="text" class="form-control" placeholder="" name="timeslot_id" v-model="createForm.timeslot_id"/>
                                <span class="help-block" v-if="createForm.errors.has('timeslot_id')" v-text="createForm.errors.get('timeslot_id')"></span>
                            </div>
                            <div class="form-group has-feedback" :class="{ 'has-error': createForm.errors.has('user_id') }">
                                <label> User ID:</label>
                                <input type="text" class="form-control" placeholder="" name="user_id" v-model="createForm.user_id"/>
                                <span class="help-block" v-if="createForm.errors.has('user_id')" v-text="createForm.errors.get('user_id')"></span>
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

                <div class="box box-default" id="updateBox" ref="updateBox">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Lesson</h3>

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

                        <form method="post" @submit.prevent="updateLesson" @keydown="updateForm.errors.clear($event.target.name)">
                            <div class="form-group has-feedback" :class="{ 'has-error': updateForm.errors.has('classroom_id') }">
                                <label> Classroom ID:</label>
                                <input type="text" class="form-control" placeholder="" name="classroom_id" value="" v-model="updateForm.classroom_id" autofocus/>
                                <span class="help-block" v-if="updateForm.errors.has('classroom_id')" v-text="updateForm.errors.get('classroom_id')"></span>
                            </div>
                            <div class="form-group has-feedback" :class="{ 'has-error': updateForm.errors.has('day_id') }">
                                <label> Day ID:</label>
                                <input type="text" class="form-control" placeholder="" name="day_id" value="" v-model="updateForm.day_id"/>
                                <span class="help-block" v-if="updateForm.errors.has('day_id')" v-text="updateForm.errors.get('day_id')"></span>
                            </div>
                            <div class="form-group has-feedback" :class="{ 'has-error': updateForm.errors.has('location_id') }">
                                <label> Location ID:</label>
                                <input type="text" class="form-control" placeholder="" name="location_id" v-model="updateForm.location_id"/>
                                <span class="help-block" v-if="updateForm.errors.has('location_id')" v-text="updateForm.errors.get('location_id')"></span>
                            </div>
                            <div class="form-group has-feedback" :class="{ 'has-error': updateForm.errors.has('timeslot_id') }">
                                <label> Timeslot ID:</label>
                                <input type="text" class="form-control" placeholder="" name="timeslot_id" v-model="updateForm.timeslot_id"/>
                                <span class="help-block" v-if="updateForm.errors.has('timeslot_id')" v-text="updateForm.errors.get('timeslot_id')"></span>
                            </div>
                            <div class="form-group has-feedback" :class="{ 'has-error': updateForm.errors.has('user_id') }">
                                <label> User ID:</label>
                                <input type="text" class="form-control" placeholder="" name="user_id" v-model="updateForm.user_id"/>
                                <span class="help-block" v-if="updateForm.errors.has('user_id')" v-text="updateForm.errors.get('user_id')"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-1">
                                </div><!-- /.col -->
                                <div class="col-xs-6">
                                </div><!-- /.col -->
                                <div class="col-xs-4 col-xs-push-1">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat" :disabled="updateForm.errors.any()"><i class="fa fa-refresh fa-spin" v-if="updateForm.submitting"></i>Update</button>
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
                                :index="index"
                                :from="from"
                                @lesson-updated="passUpdate"
                                @lesson-deleted="deleteLesson"></lesson>
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer clearfix">
                        <span class="pull-left">Showing {{ from }} to {{ to }} of {{ total }} entries.</span>
                        <pagination
                                :current-page="page"
                                :items-per-page="perPage"
                                :total-items="total"
                                @page-changed="pageChanged"
                        ></pagination>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Lesson from './Lesson.vue'
    import Messages from './Messages.vue'
    import Pagination from './Pagination.vue'
    import Form from 'acacha-forms'
    import EventBus from './../eventBus'
    export default {
        components : { Lesson, Messages, Pagination },
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
                ),
                from: 0,
                to: 0,
                total: 0,
                page: 1,
                perPage: 2,
                updateForm: new Form(
                        {
                            classroom_id: '',
                            day_id : '',
                            location_id : '',
                            timeslot_id : '',
                            user_id: ''
                        }
                ),
                updateId: "",
                bufferedId: ""
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
                    this.to = response.data.data.to;
                    this.from = response.data.data.from;
                    this.total = response.data.data.total;
                    this.perPage = response.data.data.per_page;
                }, (error) => {
                    console.log(error);
                });
            },
            createLesson : function(){
                var that = this
                this.createForm.post('/api/v1/lessons')
                        .then(response => {
                            console.log(response)
                            EventBus.$emit('created', response.data.message)
                        })
                        .catch(error => {
                            console.log(error.response.data)
                            EventBus.$emit('errored', that.createForm.errors)
                        })
                window.scrollTo(0,this.$refs.messages.scrollTop);
                this.fetchData(this.page)
            },
            deleteLesson: function(index, id) {
                var funct = this;
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this lesson!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel plx!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            axios.delete('/api/v1/lessons/' + id).then((response) => {
                                console.log(response)
                                swal("Deleted!", "Your lesson has been deleted.", "success");
                            }, (response) => {
                                sweetAlert("Oops...", "Something went wrong!", "error");
                                console.log(response);
                            });
                        } else {
                            swal("Cancelled", "Your lesson is safe :)", "error");
                        }
                        funct.fetchData(funct.page)
                    });
            },
            passUpdate: function(index, lesson) {
                this.updateId = lesson.id
                this.updateForm.classroom_id = lesson.classroom_id
                this.updateForm.day_id = lesson.day_id
                this.updateForm.location_id  = lesson.location_id
                this.updateForm.timeslot_id  = lesson.timeslot_id
                this.updateForm.user_id = lesson.users[0].id
                this.bufferedId = lesson.users[0].id
                location.href = "#updateBox";
            },
            updateLesson: function () {
                var that = this
                if(this.bufferedId == this.updateForm.user_id){
                    this.updateForm.user_id = ""
                }
                this.updateForm.put('/api/v1/lessons/' + that.updateId)
                        .then(response => {
                            console.log(response)
                            EventBus.$emit('updated', response.data.message)
                        })
                        .catch(error => {
                            console.log(error.response.data)
                            EventBus.$emit('errored', that.updateForm.errors)
                        })
                window.scrollTo(0,this.$refs.messages.scrollTop);
                this.fetchData(this.page)
            },
            pageChanged : function (pageNum) {
                this.page = pageNum;
                this.fetchData(pageNum);
            }
        }
    }
</script>
