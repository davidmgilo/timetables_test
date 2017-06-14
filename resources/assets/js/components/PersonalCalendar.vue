<template>
    <div class="box box-success box-solid">
        <div class="box-body">
            <calendar></calendar>
        </div>
        <!-- /.box-body -->
    </div>
</template>

<script>
    import Calendar from './Calendar.vue'
    export default {
        components : { Calendar },
        data() {
            return {
                lessons: [],
                days: [],
                timeslots: [],
                events: []
            }
        },
        mounted() {
            axios.get('/api/user').then((response) => {
                this.lessons = response.data.lessons
                console.log(response.data.lessons)
                this.buildEvents()
                this.getDays()
                this.getTimeslots()
            }, (error) => {
                console.log(error);
            });
        },
        methods: {
            getDays : function () {
                var that = this
                for (var i = 0; i < this.lessons.length; i++) {
                    console.log(this.lessons[i].day_id)
                    this.events[i] = {
                        title: '',
                        day:''
                    }
                    that.i = i
                    this.events[i].title = this.lessons[i].id
                    axios.get('/api/days', {
                        params: {
                            id: this.lessons[i].day_id
                        }
                    }).then(function (response) {
                                console.log(response);
                                that.days.push(response.data)
                                that.events[that.i].day = response.data.name
                            })
                            .catch(function (error) {
                                console.log(error);
                            });

                }
            },
            getTimeslots : function () {
                var that = this
                for (var i = 0; i < this.lessons.length; i++) {
                    console.log(this.lessons[i].timeslot_id)
                    axios.get('/api/timeslots', {
                        params: {
                            id: this.lessons[i].timeslot_id
                        }
                    }).then(function (response) {
                        that.timeslots.push(response.data)
                    })
                            .catch(function (error) {
                                console.log(error);
                            });
                }
            },
            buildEvents: function () {
                this.events.length = this.lessons.length
            }
        }
    }
</script>
