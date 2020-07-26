<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {

            line-height: 1.25;
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
            background-color: #ddd;
        }

        table tr {
            background-color: #f8f8f8;
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
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }

            table td:nth-child(1) {
                background-color: #ddd;
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

            @page {
                header: page-header;
                footer: page-footer;
            }
    </style>
</head>

<body>
    <span>ວັນທີ:<?php echo date("d/m/Y") ?></span>
    <h2 align="center">ລາຍງານຂໍ້ມູນສາຂາຮຽນ</h2>
    <caption>ຈຳນວນສາຂາຮຽນທັງໝົດມີ {{$majors->count()}} ສາຂາ</caption>
    <div class="table-responsive">
        <table>
            <thead>
                <tr class="active-tr">
                    <th scope="col">ລະຫັດສາຂາ</th>
                    <th scope="col">ຊື່ສາຂາ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($majors as $major)
                <tr>
                    <td>{{$major->major_id}}</td>
                    <td>{{$major->major_name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
