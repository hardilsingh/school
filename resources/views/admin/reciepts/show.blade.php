<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>

<body style="display: flex">


    <style>
        .schoolName {
            margin-top: 30px;
        }

        .row {
            padding: 5px 30px;
        }
    </style>



    <div style="width: 50%; border-right:1px solid grey; padding:10px">
        <img src="/images/logo.png" width="50%" alt="" style="position:relative; left:50%; transform:translateX(-50%)">

        <div style="padding: 20px 30px;">
            <p>
                Kalgidhar International Sr. Sec. School
            </p>
            <p>
                VPO Purana Shalla Distt. Gurdaspur<br>
                Phone : 9646155712, 8146060115<br>
                AffiliationNo-1630509<br>

            </p>

            <h3 style="text-align: center">Office Copy</h3>
        </div>

        <div class="row">
            <div class="col-lg-6">
                Reciept No. {{$reciept->id}}
            </div>
            <div class="col-lg-6">
                Date: {{$reciept->created_at}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                Adm No. {{$reciept->getStudent->adm_no}}
            </div>
            <div class="col-lg-6">
                Reg No. {{$reciept->getStudent->adm_no}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                Name: {{$reciept->getStudent->name}}
            </div>
            <div class="col-lg-6">
                Class & Section {{$reciept->getStudent->class == 100 ? 'Pre-Nursery 1' : $reciept->getStudent->class }}-{{$reciept->getStudent->section}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                Father Name: {{$reciept->getStudent->father}}
            </div>
            <div class="col-lg-6">
                Mother Name: {{$reciept->getStudent->mother}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                Telephone: {{$reciept->getStudent->tel1}}
            </div>
            <div class="col-lg-6 text-uppercase">
                Address: {{$reciept->getStudent->address}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Particulars.</th>
                            <th>Amount Payable.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $j = 1
                        @endphp
                        @for($i = 0; $i < count($particulars) ; $i++) <tr>
                            <td>{{$j++}}</td>
                            <td>
                                {{$particulars[$i]}}
                            </td>
                            <td>
                                {{$fee[$i]}}
                            </td>
                            </tr>
                            @endfor
                            <tr>
                                <td></td>
                                <td>Amount Recieved</td>
                                <td>{{$reciept->paid}}</td>
                            </tr>
                    </tbody>
                </table>



            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <p class="text-bold text-uppercase">
                    In Words: {{$converted}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="text-bold text-capitalize">
                    For the Period: @for($i = 0; $i < count($particulars) ; $i++) {{$particulars[$i]}}, @endfor
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <p>
                    Signature:<br>
                    Office Clerk: Rajiv
                </p>
            </div>
        </div>






    </div>
    <div style="width: 50%; border-right:1px solid grey; padding:10px">
        <img src="/images/logo.png" width="50%" alt="" style="position:relative; left:50%; transform:translateX(-50%)">

        <div style="padding: 20px 30px;">
            <p>
                Kalgidhar International Sr. Sec. School
            </p>
            <p>
                VPO Purana Shalla Distt. Gurdaspur<br>
                Phone : 9646155712, 8146060115<br>
                AffiliationNo-1630509<br>

            </p>

            <h3 style="text-align: center">Student Copy</h3>
        </div>

        <div class="row">
            <div class="col-lg-6">
                Reciept No. {{$reciept->id}}
            </div>
            <div class="col-lg-6">
                Date: {{$reciept->created_at}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                Adm No. {{$reciept->getStudent->adm_no}}
            </div>
            <div class="col-lg-6">
                Reg No. {{$reciept->getStudent->adm_no}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                Name: {{$reciept->getStudent->name}}
            </div>
            <div class="col-lg-6">
                Class & Section {{$reciept->getStudent->class == 100 ? 'Pre-Nursery 1' : $reciept->getStudent->class }}-{{$reciept->getStudent->section}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                Father Name: {{$reciept->getStudent->father}}
            </div>
            <div class="col-lg-6">
                Mother Name: {{$reciept->getStudent->mother}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                Telephone: {{$reciept->getStudent->tel1}}
            </div>
            <div class="col-lg-6 text-uppercase">
                Address: {{$reciept->getStudent->address}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Particulars.</th>
                            <th>Amount Payable.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $j = 1
                        @endphp
                        @for($i = 0; $i < count($particulars) ; $i++) <tr>
                            <td>{{$j++}}</td>
                            <td>
                                {{$particulars[$i]}}
                            </td>
                            <td>
                                {{$fee[$i]}}
                            </td>
                            </tr>
                            @endfor
                            <tr>
                                <td></td>
                                <td>Amount Recieved</td>
                                <td>{{$reciept->paid}}</td>
                            </tr>
                    </tbody>
                </table>



            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="text-bold text-uppercase">
                    In Words: {{$converted}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="text-bold text-capitalize">
                    For the Period: @for($i = 0; $i < count($particulars) ; $i++) {{$particulars[$i]}}, @endfor
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <p>
                    Signature:<br>
                    Office Clerk: Rajiv
                </p>
            </div>
        </div>






    </div>
</body>

</html>