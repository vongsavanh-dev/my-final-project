<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RegisterReport</title>


    <style>
        body {
            font-family: 'phetsarath_ot';
        }

        table {
            width: 100%;
            margin: 0px auto;
            border-collapse: collapse;
        }

        thead {
            background-color: #1c87c9;
            color: #ffffff;

        }

        th,
        td {
            padding: 3px;
            border: 1px solid #666666;
            font-size: 12px;

        }

        .header h2 {
            text-align: center;
            font-size: 12px;
            font-style: normal;
        }

        .title h1 {
            padding-bottom: 50px;
            text-align: center;
            font-size: 16px;
        }

        .block-1 {
            /* background: #c8004c; */
            width: 15%;
            height: 120px;
            float: left;
        }

        .block-2 {
            /* background: yellow; */
            width: 20%;
            height: 120px;
            float: left;
            margin-top: 5px;
            padding: 0;

        }

        .block-3 {
            /* background: blue; */
            width: 65%;
            height: 120px;
            float: left;
            margin-top: 20px;
            margin-left: 5px;
        }

        h1 {
            font-size: 22px;

        }

        h2 {
            font-size: 12px;
        }

        h3 {
            font-size: 12px;
        }

        h5 {
            font-size: 14px;
            font-weight: bold;

        }

        .center {
            text-align: center;
        }



        .column-left {
            float: left;
            width: 33.333%;

        }

        .column-right {
            float: right;
            width: 33.333%;


        }

        .column-center {
            float: left;
            width: 33.333%;

        }



        @page {
            header: page-header;
            footer: page-footer;
        }
    </style>


</head>

<body>


    <div class="header">
        <h2>ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</h2>
        <h2>ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</h2>
    </div>

    <div class="block-1">
        <img src="{{ public_path('/fontend/images/laovieng.png') }}" style="width: 100px;height:100px;">
        <br>
        <span style="font-size: 12px;">ວັນທີ:<?php echo date("d/m/Y") ?></span>
    </div>
    <div class="block-2">
        <h3>ກະຊວງສຶກສາທິການແລະກິລາ</h3>
        <h3>ກົມການສຶກສາຊັ້ນສູງ</h3>
        <h3>ວິທະຍາໄລ ລາວວຽງ</h3>
    </div>

    <div class="block-3">
        <h1>ໃບລົງທະບຽນນັກສຶກສາ</h1>
    </div>
    <div class="container">
        <div class="column-left">
            <h5>ເລກທະບຽນ ນສ: {{$resgister->reg_id}}</h5>
        </div>
        <div class="column-center">
            <h5>ຊື່ ແລະ ນາມສະກຸນ:{{$resgister->st_gender}} {{$resgister->st_name}} &ensp;
                {{$resgister->st_surname}} </h5>
        </div>
        <div class="column-right">
            <h5>ເບີໂທລະສັບ: {{$resgister->st_tel}}</h5>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th colspan="3" class="text-center">ລາຍວິຊາລົງທະບຽນຮຽນສາຂາ
                    {{$resgister->major->major_name}} {{$resgister->year_name}} ສົກຮຽນ
                    {{$resgister->academic->Ac_name}}
                </th>
                {{--  <th>{{$subjects->year_name}}</th> --}}
            </tr>
        </thead>
        <thead>
            <tr>
                <th>ລະຫັດວິຊາ</th>
                <th>ຊື່ວິຊາ</th>
                <th>ຈຳນວນໜ່ວຍກິດ</th>




            </tr>
        </thead>
        <tbody>
            @php
            $credit = 0;
            $total = 0;
            @endphp
            @foreach ($subjects as $row)
            @php
            $credit += $row->credit;
            $total += $row->total_price;
            @endphp
            <tr>
                <td>{{$row->sub_id}}</td>
                <td>{{$row->sub_name}}</td>
                <td>{{$row->credit}}</td>



            </tr>
            @endforeach
            {{--   <tr>
                <td>
                      <p>Credit {{ $credit }}</p>
            </td>
            <td>
                <p>Total {{ $total }}</p>
            </td>
            </tr> --}}

            <tr>
                <td colspan="2">ລວມໜ່ວຍກິດ</td>
                <td>{{$credit}} ໜ່ວຍກິດ</td>

            </tr>
            <tr>
                <td colspan="2">ລວມຈຳນວນເງິນ</td>
                <td>{{$total}} ກີບ</td>
            </tr>


        </tbody>
    </table>


</body>

</html>
