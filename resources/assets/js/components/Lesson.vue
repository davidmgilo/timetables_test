<template>
    <tr>
        <td> {{index }}</td>
        <td> {{lesson }}</td>
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
