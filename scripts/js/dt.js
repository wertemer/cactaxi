    // Зададим стартовую дату
    var start = new Date(),
        prevDay,
        startHours = 0;

    // 00:00
    start.setHours(0);
    start.setMinutes(0);

    // Если сегодня суббота или воскресенье - 10:00
    if ([6,0].indexOf(start.getDay()) != -1) {
        start.setHours(0);
        startHours = 0
    }

    $('.datepicker-here').datepicker({
        timepicker: true,
        startDate: start,
        minHours: startHours,
        maxHours: 23,
        onSelect: function(fd, d, picker) {
            // Ничего не делаем если выделение было снято
            if (!d) return;

            var day = d.getDay();

            // Обновляем состояние календаря только если была изменена дата
            if (prevDay != undefined && prevDay == day) return;
            prevDay = day;

            // Если выбранный день суббота или воскресенье, то устанавливаем
            // часы для выходных, в противном случае восстанавливаем начальные значения
            if (day == 6 || day == 0) {
                picker.update({
                    minHours: 0,
                    maxHours: 23
                })
            } else {
                picker.update({
                    minHours: 0,
                    maxHours: 23
                })
            }
        }
    })