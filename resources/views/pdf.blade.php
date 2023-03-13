<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>TimeTable Project</title>
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"> --}}
        <script src="https://code.jquery.com/jquery-latest.min.js"></script>
        {{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"> --}}
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    </head>
    <body id="page-top">
        <div id="wrapper">
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <div class="container-fluid p-5">
                        <div class="card">
                            <div class="card-body">
                                <h3>Your Timetable</h3>
                                <hr>
                                <form id="create_timetable">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span>Title: {{ $title }} </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>Semester: {{ $semester }}</span>
                                        </div>
                                        <br>
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
                                                    <td id="Mon-0">{{ $Mon_0 }}</td>
                                                    <td id="Tue-0">{{ $Tue_0 }}</td>
                                                    <td id="Wed-0">{{ $Wed_0 }}</td>
                                                    <td id="Thu-0">{{ $Thu_0 }}</td>
                                                    <td id="Fri-0">{{ $Fri_0 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>09.00-10.00</td>
                                                    <td id="Mon-1">{{ $Mon_1 }}</td>
                                                    <td id="Tue-1">{{ $Tue_1 }}</td>
                                                    <td id="Wed-1">{{ $Wed_1 }}</td>
                                                    <td id="Thu-1">{{ $Thu_1 }}</td>
                                                    <td id="Fri-1">{{ $Fri_1 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>10.00-11.00</td>
                                                    <td id="Mon-2">{{ $Mon_2 }}</td>
                                                    <td id="Tue-2">{{ $Tue_2 }}</td>
                                                    <td id="Wed-2">{{ $Wed_2 }}</td>
                                                    <td id="Thu-2">{{ $Thu_2 }}</td>
                                                    <td id="Fri-2">{{ $Fri_2 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>11.00-12.00</td>
                                                    <td id="Mon-3">{{ $Mon_3 }}</td>
                                                    <td id="Tue-3">{{ $Tue_3 }}</td>
                                                    <td id="Wed-3">{{ $Wed_3 }}</td>
                                                    <td id="Thu-3">{{ $Thu_3 }}</td>
                                                    <td id="Fri-3">{{ $Fri_3 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>12.00-13.00</td>
                                                    <td id="Mon-4">{{ $Mon_4 }}</td>
                                                    <td id="Tue-4">{{ $Tue_4 }}</td>
                                                    <td id="Wed-4">{{ $Wed_4 }}</td>
                                                    <td id="Thu-4">{{ $Thu_4 }}</td>
                                                    <td id="Fri-4">{{ $Fri_4 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>13.00-14.00</td>
                                                    <td id="Mon-5"> {{ $Mon_5 }} </td>
                                                    <td id="Tue-5"> {{ $Tue_5 }} </td>
                                                    <td id="Wed-5"> {{ $Wed_5 }} </td>
                                                    <td id="Thu-5"> {{ $Thu_5 }} </td>
                                                    <td id="Fri-5"> {{ $Fri_5 }} </td>
                                                </tr>
                                                <tr>
                                                    <td>14.00-15.00</td>
                                                    <td id="Mon-6"> {{ $Mon_6 }} </td>
                                                    <td id="Tue-6"> {{ $Tue_6 }} </td>
                                                    <td id="Wed-6"> {{ $Wed_6 }} </td>
                                                    <td id="Thu-6"> {{ $Thu_6 }} </td>
                                                    <td id="Fri-6"> {{ $Fri_6 }} </td>
                                                </tr>
                                                <tr>
                                                    <td>15.00-16.00</td>
                                                    <td id="Mon-7"> {{ $Mon_7 }} </td>
                                                    <td id="Tue-7"> {{ $Tue_7 }} </td>
                                                    <td id="Wed-7"> {{ $Wed_7 }} </td>
                                                    <td id="Thu-7"> {{ $Thu_7 }} </td>
                                                    <td id="Fri-7"> {{ $Fri_7 }} </td>
                                                </tr>
                                                <tr>
                                                    <td>16.00-17.00</td>
                                                    <td id="Mon-8"> {{ $Mon_8 }} </td>
                                                    <td id="Tue-8"> {{ $Tue_8 }} </td>
                                                    <td id="Wed-8"> {{ $Wed_8 }} </td>
                                                    <td id="Thu-8"> {{ $Thu_8 }} </td>
                                                    <td id="Fri-8"> {{ $Fri_8 }} </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </body>
</html>