@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row" style="padding: 5px;">
        <div class="d-sm-flex justify-content-between align-items-center">
            <h3 class="text-dark">List of Timetable</h3>
            <div class="d-none d-sm-inline-block">
                <form id="import_form" enctype="multipart/form-data">
                    <button class="btn btn-primary" onclick="window.location.href='{{ url('table/create') }}'" type="button"><i class="fa fa-plus fa-sm"></i>&nbsp;Create Timetable</button>
                    <input accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" type="file" name="file_upload" id="excel_file" class="btn btn-primary btn-sm">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-download fa-sm"></i>&nbsp;Import Timetable</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card shadow ">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Timetable Info</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0 display" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name of Timetable</th>
                            <th>Semester</th>
                            <th>Action Button</th>
                        </tr>
                    </thead>
                    <tbody id="content">
                        {{-- list of timetable goes here --}}
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <button class="btn btn-danger btn-sm p-2" onclick="window.open('storage/template.xlsx')" align='center'>download template</button>
            </div>
        </div>
    </div>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function delete_timetable(id)
    {
        $.ajax({
            type: "DELETE",
            url: `api/timetables/${id}`,
            data: "data",
            success: function (response) {
                alert('success to delete timetable');
                location.href= "{{ url('home') }}";
            }
        });
    }

    function redirect(id)
    {
        var url = 'table/info?id='+id;
        location.href="{{ url("url") }}";
    }
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "api/timetables/",
            success: function (response) {
                $.each(response, function (key, value) {
                    var url = 'table/info/'+value['id'];
                    $('tbody').append(
                        '<tr>' +
                            '<td>'+ value['title'] + '</td>' +
                            '<td>'+ value['semester'] + '</td>' +
                            "<td><button onclick='window.location.href=`table/info?id="+ value['id'] +"`' class='btn btn-info' type='button'><i class='fa fa-info-circle'></i></button> <button class='btn btn-danger' onclick='delete_timetable(`"+ value['id'] +"`)' type='button'><i class='fa fa-trash'></i></button></td>" +
                        '</tr>'
                    );
                });
                $('#myTable').DataTable();
            }           
        });

        $('#import_form').submit(function (e) { 
            e.preventDefault();
            // alert("yes");
            var form_data = new FormData(this);
            // console.log(form_data);
            var event_data = [];
            $.ajax({
                type: "POST",
                url: "import",
                data: form_data,
                contentType: false,
                processData: false,
                success: function (response) {
                    event_data = response[1];
                    $.ajax({
                        type: "POST",
                        url: "api/timetables",
                        data: {
                            title: response[0][0],
                            semester: response[0][1],
                        },
                        success: function (resp) {
                            $.ajax({
                                type: "POST",
                                url: "api/events",
                                data: {
                                    content: event_data,
                                    timetable_id: resp['id']
                                },
                                success: function (result) {
                                  alert("success to import data");
                                  location.href="{{ url('home') }}";  
                                }
                            });
                        }
                    });
                }
            });
        });
    });
</script>
@endsection