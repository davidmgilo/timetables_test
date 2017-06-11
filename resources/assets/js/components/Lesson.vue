<template>
    <tr>
        <td> {{index + from }}</td>
        <td> {{lesson.classroom_id }}</td>
        <td> {{lesson.day_id }}</td>
        <td> {{lesson.location_id }}</td>
        <td> {{lesson.timeslot_id }}</td>
        <td> {{lesson.users[0].id }}</td>
        <td>
          <button class="btn btn-md btn-info" @click="updateLesson"><i class="fa fa-fw fa-edit"></i></button>
          <button class="btn btn-md btn-warning" @click="deleteLesson"><i class="fa fa-trash-o"></i></button>
        </td>
    </tr>
</template>

<script>
    export default {
        props: ['lesson','index','from'],
        mounted() {
            console.log('Component ready.')
        },
        methods: {
            deleteLesson: function(){
                this.$emit('lesson-deleted', this.index, this.lesson.id);
            },
            updateLesson: function(){
                this.$emit('lesson-updated', this.index, this.lesson);
            },
        }
    }
</script>
