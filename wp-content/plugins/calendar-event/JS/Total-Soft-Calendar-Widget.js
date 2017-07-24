(function ($) {

    var eCalendar = function (options, object) {
        // Initializing global variables
        var adDay = new Date().getDate();
        var adMonth = new Date().getMonth();
        var adYear = new Date().getFullYear();
        var dDay = adDay;
        var dMonth = adMonth;
        var dYear = adYear;
        var instance = object;

        var settings = $.extend({}, $.fn.eCalendar.defaults, options);

        function lpad(value, length, pad) {
            if (typeof pad == 'undefined') {
                pad = '0';
            }
            var p;
            for (var i = 0; i < length; i++) {
                p += pad;
            }
            return (p + value).slice(-length);
        }

        var mouseOver = function () {
            $(this).addClass('c-nav-btn-over');
        };
        var mouseLeave = function () {
            $(this).removeClass('c-nav-btn-over');
        };
        var mouseOverEvent = function () {
            $(this).addClass('c-event-over');
            var d = $(this).attr('data-event-day');
            $('div.c-event-item[data-event-day="' + d + '"]').addClass('c-event-over');
        };
        var mouseLeaveEvent = function () {
            $(this).removeClass('c-event-over');
            var d = $(this).attr('data-event-day');
            $('div.c-event-item[data-event-day="' + d + '"]').removeClass('c-event-over');
        };
        var mouseOverDay = function () {
            $(this).addClass('c-event-over');
        };
        var mouseLeaveDay = function () {
            $(this).removeClass('c-event-over');
        };
        var mouseOverItem = function () {
            $(this).addClass('c-event-over');
            var d = $(this).attr('data-event-day');
            $('div.c-event[data-event-day="' + d + '"]').addClass('c-event-over');
        };
        var mouseLeaveItem = function () {
            $(this).removeClass('c-event-over')
            var d = $(this).attr('data-event-day');
            $('div.c-event[data-event-day="' + d + '"]').removeClass('c-event-over');
        };
        var nextMonth = function () {
            if (dMonth < 11) {
                dMonth++;
            } else {
                dMonth = 0;
                dYear++;
            }
            print();
        };
        var previousMonth = function () {
            if (dMonth > 0) {
                dMonth--;
            } else {
                dMonth = 11;
                dYear--;
            }
            print();
        };

        function loadEvents() {
            if (typeof settings.url != 'undefined' && settings.url != '') {
                $.ajax({url: settings.url,
                    async: false,
                    success: function (result) {
                        settings.events = result;
                    }
                });
            }
        }

        function print() {
            loadEvents();
            var dWeekDayOfMonthStart = new Date(dYear, dMonth, 1).getDay() - settings.firstDayOfWeek;
            if (dWeekDayOfMonthStart < 0) {
                dWeekDayOfMonthStart = 6 - ((dWeekDayOfMonthStart + 1) * -1);
            }
            var dLastDayOfMonth = new Date(dYear, dMonth + 1, 0).getDate();
            var dLastDayOfPreviousMonth = new Date(dYear, dMonth + 1, 0).getDate() - dWeekDayOfMonthStart + 1;

            var cBody = $('<div/>').addClass('c-grid');
            var cEvents = $('<div/>').addClass('c-event-grid');
            var cEventsBody = $('<div/>').addClass('c-event-body');
            cEvents.append($('<div/>').addClass('c-event-title c-pad-top').html(settings.eventTitle));
            cEvents.append(cEventsBody);
            var cNext = $('<div/>').addClass('c-next c-grid-title c-pad-top');
            var cMonth = $('<div/>').addClass('c-month c-grid-title c-pad-top');
            var cPrevious = $('<div/>').addClass('c-previous c-grid-title c-pad-top');
            cPrevious.html(settings.textArrows.previous);
            cMonth.html(settings.months[dMonth] + ' ' + dYear);
            cNext.html(settings.textArrows.next);

            cPrevious.on('mouseover', mouseOver).on('mouseleave', mouseLeave).on('click', previousMonth);
            cNext.on('mouseover', mouseOver).on('mouseleave', mouseLeave).on('click', nextMonth);

            cBody.append(cPrevious);
            cBody.append(cMonth);
            cBody.append(cNext);
            var dayOfWeek = settings.firstDayOfWeek;
            for (var i = 0; i < 7; i++) {
                if (dayOfWeek > 6) {
                    dayOfWeek = 0;
                }
                var cWeekDay = $('<div/>').addClass('c-week-day c-pad-top');
                cWeekDay.html(settings.weekDays[dayOfWeek]);
                cBody.append(cWeekDay);
                dayOfWeek++;
            }
            var day = 1;
            var dayOfNextMonth = 1;
            for (var i = 0; i < 42; i++) {
                var cDay = $('<div/>');
                if (i < dWeekDayOfMonthStart) {
                    cDay.addClass('c-day-previous-month c-pad-top');
                    cDay.html(dLastDayOfPreviousMonth++);
                } else if (day <= dLastDayOfMonth) {
                    cDay.addClass('c-day c-pad-top');
                    cDay.on('mouseover', mouseOverDay).on('mouseleave', mouseLeaveDay);

                    if (day == dDay && adMonth == dMonth && adYear == dYear) {
                        cDay.addClass('c-today');
                        cDay.on('mouseover', mouseOverDay).on('mouseleave', mouseLeaveDay);
                    }
                    for (var j = 0; j < settings.events.length; j++) {
                        var d = settings.events[j].datetime;
                        if (d.getDate() == day && d.getMonth() == dMonth && d.getFullYear() == dYear) {
                            cDay.addClass('c-event').attr('data-event-day', d.getDate());
                            cDay.on('mouseover', mouseOverEvent).on('mouseleave', mouseLeaveEvent);
                        }
                    }
                    cDay.html(day++);
                } else {
                    cDay.addClass('c-day-next-month c-pad-top');
                    cDay.html(dayOfNextMonth++);
                }
                cBody.append(cDay);
            }
            var eventList = $('<div/>').addClass('c-event-list');
            for (var i = 0; i < settings.events.length; i++) {
                var d = settings.events[i].datetime;
                var endtime = settings.events[i].endtime;
                var eventurl = settings.events[i].eventurl;
                var eventnewtab = settings.events[i].eventnewtab;
                var enddateyear = settings.events[i].enddateyear;
                var enddatemonth = settings.events[i].enddatemonth;
                var enddateday = settings.events[i].enddateday;
                var timeformat = settings.events[i].timeformat;
                var enddatereal = settings.events[i].enddatereal;
                var timestartPeriod = 'AM';
                var timeendPeriod = 'AM';
                var timesimcalreal = '';
                var eventimg = settings.events[i].eventimg;
                var eventvid = settings.events[i].eventvid;
                var eventvidpos = settings.events[i].eventvidpos;
                var realstarttime = settings.events[i].realstarttime;
                if(realstarttime)
                {
                    if(timeformat == '12')
                    {
                        var timestartSplit = realstarttime.split(':');
                        if(parseInt(timestartSplit[0]) >= 12) {
                            if(parseInt(timestartSplit[0]) >= 22)
                            {
                                var SimCstartTime = (timestartSplit[0] - 12)+':'+timestartSplit[1];
                            }
                            else
                            {
                                var SimCstartTime = '0'+(timestartSplit[0] - 12)+':'+timestartSplit[1];
                            }
                            var timestartPeriod = 'PM';
                        }
                        else
                        {
                            var SimCstartTime = timestartSplit[0]+':'+timestartSplit[1];
                        }
                        if(parseInt(SimCstartTime) == 0) {
                            var SimCstartTime = '12:'+timestartSplit[1];
                        }
                        timesimcalreal = SimCstartTime + ' ' + timestartPeriod;
                        if(endtime)
                        {
                            var timeendSplit = endtime.split(':');
                            if(parseInt(timeendSplit[0]) >= 12) {
                                if(parseInt(timeendSplit[0]) >= 22)
                                {
                                    var SimCendTime = (timeendSplit[0] - 12)+':'+timeendSplit[1];
                                }
                                else
                                {
                                    var SimCendTime = '0'+(timeendSplit[0] - 12)+':'+timeendSplit[1];
                                }
                                var timeendPeriod = 'PM';
                            }
                            else
                            {
                                var SimCendTime = endtime;
                            }
                            if(parseInt(SimCendTime) == 0) {
                                var SimCendTime = '12:'+timeendSplit[1];
                            }
                            timesimcalreal += ' - ' + SimCendTime + ' ' + timeendPeriod;
                        }
                    }
                    else
                    {
                        timestartPeriod = '';
                        timeendPeriod = '';

                        timesimcalreal = realstarttime;
                        if(endtime)
                        {
                            timesimcalreal += ' - ' + endtime;
                        }
                    }
                }

                if (d.getMonth() == dMonth && d.getFullYear() == dYear) {

                    if(enddatereal == '--' || enddatereal == '')
                    {
                        var date = lpad(d.getDate(), 2) + '.' + lpad(d.getMonth() + 1, 2) + '.' + d.getFullYear() + ' ' + timesimcalreal;
                    }
                    else
                    {
                        if(lpad(d.getDate(), 2)==lpad(enddateday, 2) && lpad(d.getMonth() + 1, 2)==lpad(parseInt(enddatemonth) + 1, 2) && d.getFullYear()==enddateyear)
                        {
                            var date = lpad(d.getDate(), 2) + '.' + lpad(d.getMonth() + 1, 2) + '.' + d.getFullYear() + ' ' + timesimcalreal;
                        }
                        else
                        {
                            var date = lpad(d.getDate(), 2) + '.' + lpad(d.getMonth() + 1, 2) + '.' + d.getFullYear() + ' - ' + lpad(enddateday, 2) + '.' + lpad(parseInt(enddatemonth) + 1, 2) + '.' + enddateyear + ' ' + timesimcalreal;
                        }
                    }
                        
                    var item = $('<div/>').addClass('c-event-item');
                    if(eventurl != '' && eventnewtab == '_blank')
                    {
                        var title = $('<div/>').addClass('title').html(date + ' ' + '<a href="'+eventurl+'" target="_blank">'+settings.events[i].title + '</a>');
                    }
                    else if(eventurl != '' && eventnewtab == '')
                    {
                        var title = $('<div/>').addClass('title').html(date + ' ' + '<a href="'+eventurl+'" target="">'+settings.events[i].title + '</a>');
                    }
                    else
                    {
                        var title = $('<div/>').addClass('title').html(date + ' ' + settings.events[i].title);
                    }
                    if(eventimg)
                    {
                        if(!eventvid)
                        {
                            var simplecalmedia = '<div style="position: relative; width: 99%; margin: 10px auto; text-align: center;"><img src="'+eventimg+'" class="TotalSoftcalEvent_2_Media"></div>';
                        }
                        else
                        {
                            var simplecalmedia = '<div style="position: relative; width: 99%; margin: 10px auto; text-align: center;"><div class="TotalSoftcalEvent_2_Mediadiv"><iframe src="'+eventvid+'" class="TotalSoftcalEvent_2_Mediaiframe" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
                        }
                    }
                    else
                    {
                        var simplecalmedia = '';
                    }
                    if(settings.events[i].description)
                    {
                        var description = $('<div/>').addClass('description').html(settings.events[i].description);
                    }
                    item.attr('data-event-day', d.getDate());
                    item.on('mouseover', mouseOverItem).on('mouseleave', mouseLeaveItem);
                    if(eventvidpos == 'before')
                    {
                        item.append(title).append(simplecalmedia).append(description);
                    }
                    else if(eventvidpos == 'after')
                    {
                        item.append(title).append(description).append(simplecalmedia);
                    }
                    eventList.append(item);
                }
            }
            $(instance).addClass('TotalSoftSimpleCalendar');
            cEventsBody.append(eventList);
            $(instance).html(cBody).append(cEvents);
        }

        return print();
    }

    $.fn.eCalendar = function (oInit) {
        return this.each(function () {
            return eCalendar(oInit, $(this));
        });
    };

    // plugin defaults
    $.fn.eCalendar.defaults = {
        weekDays: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        textArrows: {previous: '<', next: '>'},
        eventTitle: 'Eventos',
        url: '',
        events: [
            {title: 'Evento de Abertura', description: 'Abertura das Olimpíadas Rio 2016', datetime: new Date(2016, new Date().getMonth(), 12, 17)},
            {title: 'Tênis de Mesa', description: 'BRA x ARG - Semifinal', datetime: new Date(2016, new Date().getMonth(), 23, 16)},
            {title: 'Ginástica Olímpica', description: 'Classificatórias de equipes', datetime: new Date(2016, new Date().getMonth(), 31, 16)}
        ],
        firstDayOfWeek: 0
    };

}(jQuery));