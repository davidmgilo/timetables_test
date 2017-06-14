<template>
    <div id="calendar"></div>
</template>

<script>
//    import  from 'moment'
    export default {
        mounted() {
            console.log('Component Calendar mounted.')
            $('#calendar').fullCalendar({
                theme: true,
                editable: false,
                droppable: false,
                defaultView: 'agendaWeek',
                header: false,
                events: [
                    {
                        title: 'MP07',
                        start: moment().format(),
                        end: moment().add(1,'hours').format()
                    },
                    {
                        title: 'MP07',
                        start: moment().add(1,'days').format(),
                        end: moment().add({days:1,hours:1}).format()
                    }
                ]
            })
        }
    }
</script>
