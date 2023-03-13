@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="row" style="padding: 5px;">
        <div class="d-sm-flex justify-content-between align-items-center">
            <h3 class="text-dark">Timetable Info</h3>
            <div class="d-none d-sm-inline-block">
                <button class="btn btn-primary btn-sm" type="button" id="update_button">Update Timetable</button>
                <button class="btn btn-success btn-sm" id="pdf_button">Generate Timetable (PDF)</button>
                <button class="btn btn-success btn-sm" id="excel_button">Generate Timetable (Excel)</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h3>Build your Timetable</h3>
            <hr>
            <form id="create_timetable">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control col-md-4" name="timetable_title" id="timetable_title" width="10%" placeholder="Insert your timetable title here">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control col-md-4" name="timetable_semester" id="timetable_semester" width="10%" placeholder="Insert your timetable semester here">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>Time</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Friday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>08.00-09.00</td>
                                <td><input id="Mon-0" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Tue-0" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Wed-0" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Thu-0" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Fri-0" name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>09.00-10.00</td>
                                <td><input id="Mon-1" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Tue-1" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Wed-1" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Thu-1" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Fri-1" name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>10.00-11.00</td>
                                <td><input id="Mon-2" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Tue-2" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Wed-2" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Thu-2" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Fri-2" name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>11.00-12.00</td>
                                <td><input id="Mon-3" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Tue-3" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Wed-3" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Thu-3" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Fri-3" name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>12.00-13.00</td>
                                <td><input id="Mon-4" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Tue-4" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Wed-4" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Thu-4" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Fri-4" name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>13.00-14.00</td>
                                <td><input id="Mon-5" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Tue-5" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Wed-5" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Thu-5" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Fri-5" name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>14.00-15.00</td>
                                <td><input id="Mon-6" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Tue-6" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Wed-6" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Thu-6" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Fri-6" name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>15.00-16.00</td>
                                <td><input id="Mon-7" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Tue-7" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Wed-7" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Thu-7" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Fri-7" name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>16.00-17.00</td>
                                <td><input id="Mon-8" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Tue-8" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Wed-8" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Thu-8" name="event[]" class="form-control" type="text"></td>
                                <td><input id="Fri-8" name="event[]" class="form-control" type="text"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $.urlParam = function(name){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results==null) {
            return null;
            }
            return decodeURI(results[1]) || 0;
        }
        var idParam = $.urlParam('id');
        var idEvent = [];
        // alert(idParam);
        $.ajax({

            type: "GET",
            url: "../api/timetables/"+idParam,
            success: function (response) {
                // console.log(response);
                var timetable = response[0];
                $('#timetable_title').val(timetable['title']);
                $('#timetable_semester').val(timetable['semester']);
                $.each(response, function (key, value) { 
                    // console.log(value);
                    $(`#${value['day']}-${value['time']}`).val(value['name']);
                    idEvent.push(value['id']);
                });
            }
        });

        $('#pdf_button').click(function (e) { 
            e.preventDefault();
            window.open("../generate/"+idParam, "_blank");
        });
        $('#excel_button').click(function (e) { 
            e.preventDefault();
            window.open("../excel/"+idParam, "_blank");
        });
        
        $("#update_button").click(function (e) { 
            e.preventDefault();
            var title = $("#timetable_title").val();
            var semester = $("#timetable_semester").val();
            var content = [];
            var day = ["Mon", "Tue", "Wed", "Thu", "Fri"];
            var time = [0, 1, 2, 3, 4, 5 ,6 ,7, 8];
            var values = $("input[name='event[]']").map(function()
            {
                return $(this).val();
            }).get();
            var i = 0;
            var j = 0;
            $.each(values, function (key, value) { 
                if (value != "")
                {
                    content.push(value + "-" + day[i] + "-" + time[j]);
                }
                i++;
                if ( i == 5)
                {
                    j++;
                    i = 0;
                }
                if (j == 9)
                {
                    j = 0;
                }
            });
            $.ajax({
                type: "PUT",
                url: "../api/timetables/"+idParam,
                data: {
                    title: title,
                    semester: semester,
                },
                success: function (response) {
                    $.ajax({
                        type: "PUT",
                        url: "../api/events",
                        data: {
                            content: content,
                            timetable_id: idParam,
                        },
                        success: function (resp) {
                            alert("success to update");
                            location.href = "info?id="+idParam;
                        }
                    });
                }
            });
        });
    });
</script>
@endsection