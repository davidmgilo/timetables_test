<template>
    <tr>
        <td> {{index }}</td>
        <td> {{lesson.classroom_id }}</td>
        <td> {{lesson.day_id }}</td>
        <td> {{lesson.location_id }}</td>
        <td> {{lesson.timeslot_id }}</td>
        <td> act</td>
    </tr>
</template>

<script>
    export default {
        props: ['lesson','index'],
        mounted() {
            console.log('Component ready.')
        }
    }
</script>
