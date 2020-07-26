<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: Phetsarath OT;
        }

        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 10px;
            padding: 0;
            width: 100%;
            table-layout: fixed;

        }

        caption {
            font-size: 16px;
            margin: .5em .5em .75em;
        }

        table thead tr {
            /*  background-color: #ddd; */
        }

        table tr {
            /*  background-color: #f8f8f8; */
            border: 1px solid #ddd;
            padding: .35em;
        }

        table th,
        table td {
            padding: .625em;
            text-align: center;
        }

        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }


            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .25em;
                padding: 0em;
            }

            table tr:nth-child(1) {
                /*background-color: #ddd;*/
            }

            table tbody tr.active-tr td:nth-child(1) {
                background-color: #c8004c;
                color: #fefefe;
                font-weight: bold;
            }

            table td {
                /*     border-bottom: 1px solid #ddd; */
                display: block;
                font-size: 12px;
                font-family: Phetsarath OT;
                text-align: right;
            }

            table td:nth-child(1) {
                /*  background-color: #ddd; */
            }

            table td::before {

                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }

            table tbody tr:not(:nth-child(1)) {
                /*background-color: blue;*/
                /*margin-top: 0;*/
            }

            table tbody tr:nth-child(1) {
                table tbody tr td:not(:nth-child(1)) {
                    /*background-color: green;*/
                    display: none;
                }

                table tbody tr.active-tr td {
                    display: block;
                }
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
                /*   background: #c8004c; */
                width: 15%;
                height: 120px;
                float: left;
            }

            .block-2 {
                /*   background: yellow; */
                width: 20%;
                height: 120px;
                float: left;
                margin-top: 5px;
                padding: 0;

            }

            .block-3 {
                /*  background: blue; */
                width: 65%;
                height: 120px;
                float: left;
                margin-top: 20px;
                margin-left: 5px;
            }

            h1 {
                font-size: 16px;

            }

            h2 {
                font-size: 12px;
            }

            h3 {
                font-size: 11px;
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
        <h1>ລາຍງານຂໍ້ມູນອາຈານ</h1>
        <h1>Teacher Report</h1>
    </div>

    <div class=" table-responsive">
        <caption text-center>ຈຳນວນອາຈານທັງໝົດມີ {{$teachers->count()}} ອາຈານ</caption>
        <table>
            <thead>
                <tr class="active-tr">
                    <th scope="col">ລະຫັດ</th>
                    <th scope="col">ຮູບພາບ</th>
                    <th scope="col">ຊື່ອາຈານ</th>
                    <th scope="col">ນາມສະກຸນ</th>
                    <th scope="col">ເພດ</th>
                    <th scope="col">ອີເມວ</th>
                    <th scope="col">ເບີໂທ</th>
                    <th scope="col">ປະຫວັດການສຶກສາ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                <tr>
                    <td>{{$teacher->t_id}}</td>
                    <td>
                        <img src="storage/{{$teacher->image}}" alt="" width="90px" height="90px">
                    </td>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->surname}}</td>
                    <td>{{$teacher->gender}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>{{$teacher->phone}}</td>
                    <td>{{$teacher->education}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
