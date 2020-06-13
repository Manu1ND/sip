var date = document.getElementById("date");
var sessNO = document.getElementById("sessNO");
$.ajax({
    type: "POST",
    url: "timetable/loadTT.php",
    contentType: false, // Dont delete this (jQuery 1.6+)
    processData: false, // Dont delete this
    success: function (data) {
        var data = JSON.parse(data);
        var index = 1;
        for (var key in data) {
            date.options[index] = new Option(key, index);
            index++;
        }
        // loads table
        loadTable(data);

        date.onchange = function () {
            sessNO.length = 1; // remove all options bar first

            var dateIndex = date.options[date.selectedIndex].value;
            if (dateIndex == 0) {
                // loads table
                loadTable(data);
            } else {
                data[date.options[date.selectedIndex].text].forEach(function (item, index) {
                    sessNO.options[index + 1] = new Option(item, index + 1);
                })
                // loads table by date filter
                loadDate();
            }
        }

        sessNO.onchange = function () {
            var sessIndex = sessNO.options[sessNO.selectedIndex].value;
            if (sessIndex == 0) {
                // loads table by date filter
                loadDate();
            } else {
                // loads table by sess filter
                loadSess();
            }
        }
    }
    //Other options
});

function loadTable(data) {
    const timetable = document.getElementById('timetable');
    timetable.innerHTML = ''; //empties TT
    for (var key in data) {
        // loads table
        data[key].forEach(function (item) {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td >` + key + `</td>`;
            tr.innerHTML += `<td >` + item + `</td>`;
            tr.innerHTML += `
            <td >
                <button type="submit" class="login100-form-btn">
                    Delete
                </button>
            </td>`;

            timetable.appendChild(tr)
        })
    }
}

function loadDate() {
    // loads table by data filter
    var dateValue = date.options[date.selectedIndex].text.toLowerCase();
    $("#timetable tr").filter(function () {
        $(this).toggle($(this).children(":eq(" + "0" + ")").text().toLowerCase().indexOf(dateValue) > -1);
    });
}

function loadSess() {
    // loads table by sess filter
    var dateValue = date.options[date.selectedIndex].text.toLowerCase();
    var sessValue = sessNO.options[sessNO.selectedIndex].text.toLowerCase();
    $("#timetable tr").filter(function () {
        $(this).toggle(($(this).children(":eq(" + "0" + ")").text().toLowerCase().indexOf(dateValue) > -1) &&
            ($(this).children(":eq(" + "1" + ")").text().toLowerCase().indexOf(sessValue) > -1));
    });
}