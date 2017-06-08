<template>
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
    export default {
        components : { Lesson },
        data() {
            return {
                lessons: [],
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
            }
        }
    }
</script>
