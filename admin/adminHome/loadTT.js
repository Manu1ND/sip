var date = document.getElementById("date");
var sessNO = document.getElementById("sessNO");
$.ajax({
    type: "POST",
    url: "adminHome/loadTT.php",
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
                var ind = 0;
                for (var item in data[date.options[date.selectedIndex].text]) {
                    sessNO.options[ind + 1] = new Option(item, ind + 1);
                }
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
        for (var item in data[key]) {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td >` + key + `</td>`;
            tr.innerHTML += `<td >` + item + `</td>`;

            if (data[key][item]['sessionID'] == sessionID) {
                console.log(sessionID);
                console.log(data[key][item]['sessionID']);
                tr.innerHTML += `
                <td >
                    <button id="startSess" class="login100-form-btn" disabled>
                        Running
                    </button>
                </td>`;
            }
            else {
                tr.innerHTML += `
                <td >
                    <button type="button" id="startSess" class="login100-form-btn">
                        Start
                    </button>
                </td>`;
            }

            timetable.appendChild(tr)
        }
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

$(document).ready(function () {
    $("#search-TT").on('click', '#startSess', function () {
        var $row = $(this).parents('tr');
        var date = encodeURIComponent($row.find('td:eq(0)').html());
        var sessNO = encodeURIComponent($row.find('td:eq(1)').html());
        console.log(date, sessNO);

        var formData = new FormData();
        formData.append('date', date);
        formData.append('sessNO', sessNO);

        $.ajax({
            type: "POST",
            url: "adminHome/currSession.php",
            data: formData,
            contentType: false, // Dont delete this (jQuery 1.6+)
            processData: false, // Dont delete this
            success: function (data) {
                window.location.reload();
            }
        });
    });
});