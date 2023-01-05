<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Receipt example</title>
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 155px;
            max-width: 155px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="ticket">
        <img src="{{asset('graptown.png')}}" alt="Logo">
        <p class="centered">GrapTown
            <br>Dattapara ashulia saver dhaka
        </p>
        {{-- <table>
            <thead>
                <tr>
                    <th class="quantity">nanme</th>
                    <th class="description">month</th>
                    <th class="price">Tk</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td class="quantity">{{$show->bedAssign ? $show->bedAssign->user->name : ""}}</td>
                    <td class="description">{{$show->month}}</td>
                    <td class="price">{{$show->bill_charge}}</td>
                </tr>
            </tbody>
        </table> --}}
        <div>
            <span class="">Name:</span> <span>{{$show->bedAssign ? $show->bedAssign->user->name : ""}}</span> <br>
            <span class="">Email:</span> <span>{{$show->bedAssign ? $show->bedAssign->user->email : ""}}</span> <br>
            <span class="">Phone:</span> <span>{{$show->bedAssign ? $show->bedAssign->user->phone : ""}}</span> <br>
            <span class="">Bill submit:</span> <span>{{$show->day .'-'. $show->month .'-'. $show->year}}</span> 
        </div>
        <p class="centered">Thanks for your purchase!
            <br>GrapTown.com
        </p>
    </div>
    <button id="btnPrint" class="hidden-print">Print</button>
    <script src="script.js"></script>
    <script>
        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
            window.print();
        });
    </script>
</body>

</html>
