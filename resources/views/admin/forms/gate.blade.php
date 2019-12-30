<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gate Pass</title>
</head>

<body>

    <style>
        table {
            border-collapse: collapse;
        }

        body {
            font-size: 15px;
        }

        tr {
            padding: 5px;
        }

        td {
            padding: 5px;

        }
    </style>
    <table border="1" style="width:100%">
        <tbody>
            <tr>
                <td>Admission No:</td>
                <td> {{$gate->adm_no}}</td>
                <td></td>
                <td></td>
            </tr>
            <br>
            <br>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    {{$gate->name}}
                </td>
                <td>
                    Class and Section:
                </td>
                <td>
                    {{$gate->class}}
                </td>
            </tr>
            <tr>
                <td>
                    Father Name:
                </td>
                <td>
                    {{$gate->father_name}}
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    Village:
                </td>
                <td>
                    {{$student->station !== 0 ? $student->stationName->name : 'N/A'}}
                </td>
                <td>
                    Bus No:
                </td>
                <td>
                    {{$student->station !== 0 ? $student->stationName->bus : 'N/A'}}
                </td>
            </tr>

            <tr>
                <td>
                    With Whom:
                </td>
                <td>
                    {{$gate->with_whom}}
                </td>
                <td>
                    Relation:
                </td>
                <td>
                    {{$gate->relation}}
                </td>
            </tr>
            <tr>
                <td>
                    Reason:
                </td>
                <td>
                    {{$gate->reasons}}
                </td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>
    <table border="1" style="width:100%">
        <tbody>
            <tr>
                <td>Admission No:</td>
                <td> {{$gate->adm_no}}</td>
                <td></td>
                <td></td>
            </tr>
            <br>
            <br>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    {{$gate->name}}
                </td>
                <td>
                    Class and Section:
                </td>
                <td>
                    {{$gate->class}}
                </td>
            </tr>
            <tr>
                <td>
                    Father Name:
                </td>
                <td>
                    {{$gate->father_name}}
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    Village:
                </td>
                <td>
                    {{$student->station !== 0 ? $student->stationName->name : 'N/A'}}
                </td>
                <td>
                    Bus No:
                </td>
                <td>
                    {{$student->station !== 0 ? $student->stationName->bus : 'N/A'}}
                </td>
            </tr>

            <tr>
                <td>
                    With Whom:
                </td>
                <td>
                    {{$gate->with_whom}}
                </td>
                <td>
                    Relation:
                </td>
                <td>
                    {{$gate->relation}}
                </td>
            </tr>
            <tr>
                <td>
                    Reason:
                </td>
                <td>
                    {{$gate->reasons}}
                </td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>
</body>

</html>