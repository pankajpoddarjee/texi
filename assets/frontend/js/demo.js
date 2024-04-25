var defaultTheme = getRandom(4);

var today = new Date();

var events = [ {
    id: "imwyx6S",
    name: "Event #3",
    description: "Lorem ipsum dolor sit amet.",
    date: today.getMonth() + 1 + "/18/" + today.getFullYear(),
    type: "event"
}, {
    id: "9jU6g6f",
    name: "Holiday #1",
    description: "Lorem ipsum dolor sit amet.",
    date: today.getMonth() + 1 + "/10/" + today.getFullYear(),
    type: "holiday"
}, {
    id: "0g5G6ja",
    name: "Event #1",
    description: "Lorem ipsum dolor sit amet.",
    date: [ today.getMonth() + 1 + "/2/" + today.getFullYear(), today.getMonth() + 1 + "/5/" + today.getFullYear() ],
    type: "event",
    everyYear: !0
}, {
    id: "y2u7UaF",
    name: "Holiday #3",
    description: "Lorem ipsum dolor sit amet.",
    date: today.getMonth() + 1 + "/23/" + today.getFullYear(),
    type: "holiday"
}, {
    id: "dsu7HUc",
    name: "Birthday #1",
    description: "Lorem ipsum dolor sit amet.",
    date: new Date(),
    type: "birthday"
}, {
    id: "dsu7HUc",
    name: "Birthday #2",
    description: "Lorem ipsum dolor sit amet.",
    date: today.getMonth() + 1 + "/27/" + today.getFullYear(),
    type: "birthday"
} ];

var active_events = [];

var week_date = [];

var curAdd, curRmv;

function getRandom(a) {
    return Math.floor(Math.random() * a);
}

function getWeeksInMonth(a, b) {
    var c = [], d = new Date(b, a, 1), e = new Date(b, a + 1, 0), f = e.getDate();
    var g = 1;
    var h = 7 - d.getDay();
    while (g <= f) {
        c.push({
            start: g,
            end: h
        });
        g = h + 1;
        h += 7;
        if (h > f) h = f;
    }
    return c;
}

week_date = getWeeksInMonth(today.getMonth(), today.getFullYear())[2];

$(document).ready(function() {
    $("#demoEvoCalendar").evoCalendar({
        format: "MM dd, yyyy",
        titleFormat: "MM",
        calendarEvents: [{
            id: "d8jai7s",
            name: "Author's Birthday",
            description: "Author's note: Thank you for using EvoCalendar! :)",
            date: "February/15/1999",
            type: "birthday",
            everyYear: !0
        }, {
            id: "sKn89hi",
            name: "1-Week Coding Bootcamp",
            description: "Lorem ipsum dolor sit amet.",
            badge: "5-day event",
            date: [ today.getMonth() + 1 + "/" + week_date.start + "/" + today.getFullYear(), today.getMonth() + 1 + "/" + week_date.end + "/" + today.getFullYear() ],
            type: "event",
            everyYear: !0
        }, {
            id: "in8bha4",
            name: "Holiday #2",
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            date: today,
            type: "holiday"
        }, {
            id: "in8bha4",
            name: "Event #2",
            date: today,
            type: "event"
        }]
    });
    $("[data-set-theme]").click(function(b) {
        a(b.target);
    });
    $("#addBtn").click(function(a) {
        curAdd = getRandom(events.length);
        $("#demoEvoCalendar").evoCalendar("addCalendarEvent", events[curAdd]);
        active_events.push(events[curAdd]);
        events.splice(curAdd, 1);
        if (0 === events.length) a.target.disabled = !0;
        if (active_events.length > 0) $("#removeBtn").prop("disabled", !1);
    });
    $("#removeBtn").click(function(a) {
        curRmv = getRandom(active_events.length);
        $("#demoEvoCalendar").evoCalendar("removeCalendarEvent", active_events[curRmv].id);
        events.push(active_events[curRmv]);
        active_events.splice(curRmv, 1);
        if (0 === active_events.length) a.target.disabled = !0;
        if (events.length > 0) $("#addBtn").prop("disabled", !1);
    });
    a($("[data-set-theme]")[defaultTheme]);
    function a(a) {
        var b = a.dataset.setTheme;
        $("[data-set-theme]").removeClass("active");
        $(a).addClass("active");
        $("#demoEvoCalendar").evoCalendar("setTheme", b);
    }
    var b = getRandom($("[data-settings]").length);
    var c = $("[data-settings]")[b];
    var d = getRandom($("[data-method]").length);
    var e = $("[data-method]")[d];
    var f = getRandom($("[data-event]").length);
    var g = $("[data-event]")[f];
    showSettingsSample($(c).data().settings);
    showMethodSample($(e).data().method);
    showEventSample($(g).data().event);
    $("[data-settings]").on("click", function(a) {
        var b = $(a.target).closest("[data-settings]");
        var c = b.data().settings;
        showSettingsSample(c);
    });
    $("[data-method]").on("click", function(a) {
        var b = $(a.target).closest("[data-method]");
        var c = b.data().method;
        showMethodSample(c);
    });
    $("[data-event]").on("click", function(a) {
        var b = $(a.target).closest("[data-event]");
        var c = b.data().event;
        showEventSample(c);
    });
});

