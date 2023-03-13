@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="row" style="padding: 5px;">
        <div class="d-sm-flex justify-content-between align-items-center">
            <h3 class="text-dark">Timetable Info</h3>
            <div class="d-none d-sm-inline-block">
                <button class="btn btn-primary btn-sm" type="button" id="create_button">Create Timetable</button>
                {{-- <button class="btn btn-primary btn-sm">Generate Timetable</button> --}}
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
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>09.00-10.00</td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>10.00-11.00</td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>11.00-12.00</td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>12.00-13.00</td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>13.00-14.00</td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>14.00-15.00</td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>15.00-16.00</td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                            </tr>
                            <tr>
                                <td>16.00-17.00</td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
                                <td><input name="event[]" class="form-control" type="text"></td>
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
        $('#create_button').click(function (e) { 
            e.preventDefault();
            var content = [];
            var title = $('#timetable_title').val();
            var semester = $('#timetable_semester').val();
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
                type: "POST",
                url: "../api/timetables",
                data: {
                    title: title,
                    semester: semester
                },
                success: function (response) {
                    // console.log(response);
                    $.ajax({
                        type: "POST",
                        url: "../api/events",
                        data: {
                            content: content,
                            timetable_id: response['id']
                        },
                        success: function (resp) {
                            alert('success to make a timetable');
                            location.href="{{ url('home') }}";
                        }
                    });
                }
            });
        });
    });
</script>
@endsection