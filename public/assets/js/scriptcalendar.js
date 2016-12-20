YUI().use(
    'aui-scheduler',
    function(Y) {
        var events = [
            {
                content: 'Partial Lunar Eclipse',
                endDate: new Date(2016, 11, 25, 5),
                startDate: new Date(2016, 11, 25, 1)
            },
            {
                color: "#8d8",
                content: 'Earth Day Lunch',
                disabled: true,
                endDate: new Date(2016, 11, 22, 13),
                meeting: true,
                reminder: true,
                startDate: new Date(2016, 11, 22, 12)
            },
            {
                content: "Weeklong",
                endDate: new Date(2016, 11, 27),
                startDate: new Date(2016, 11, 21)
            }
        ];

        var agendaView = new Y.SchedulerAgendaView();
        var dayView = new Y.SchedulerDayView();
        var weekView = new Y.SchedulerWeekView();
        var monthView = new Y.SchedulerMonthView();

        var eventRecorder = new Y.SchedulerEventRecorder();

        new Y.Scheduler(
            {
                activeView: weekView,
                boundingBox: '#myScheduler',
                eventRecorder: eventRecorder,
                items: events,
                render: true,
                views: [dayView, weekView, monthView, agendaView]
            }
        );
    console.log(eventRecorder.event);
    }
);
