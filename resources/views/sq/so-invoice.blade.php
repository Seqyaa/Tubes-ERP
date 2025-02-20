<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>INVOICE</title>

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('assets/img/among us.png') }}" alt="" width="150px">
                            </td>

                            @if($sq->count())
                            @foreach($sq as $item)
                            <td>
                                Invoice #: {{$item->kode_sq}}<br>
                                Created: {{$item->tanggal_order}}<br>
                            </td>
                            @endforeach
                            @endif
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                PT. ART<br>
                                Kec.Butnik, Jawa Timur<br>
                                Situbondo, 99999
                            </td>

                            @if($sq->count())
                            @foreach($sq as $item)
                            <td>
                                {{$item->nama}}<br>
                                {{$item->alamat}}<br>
                            </td>
                            @endforeach
                            @endif
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Metode Pembayaran
                </td>
                <td>
                    Status
                </td>
            </tr>

            @if($sq->count())
            @foreach($sq as $item)
            <tr class="details">
                <td>{{$item->metode_pembayaran == 1 ? 'Cash' : 'Transfer'}}</td>
                <td>{{$item->status < 4 ? 'Draft Invoice' : 'Invoice Paid'}}</td>
            </tr>
            @endforeach
            @endif

            <tr class="heading">
                <td>
                    Item
                </td>

                <td>
                    Harga
                </td>
            </tr>

            @if($sqlist->count())
            @foreach($sqlist as $item)
            <tr class="item">
                <td>{{$item->nama}} ({{$item->kuantitas}})</td>
                @php
                    {{
                      $total = $item->harga * $item->kuantitas;
                    }}
                @endphp
                <td>Rp. {{$total}}</td>
            </tr>
            @endforeach
            @endif

            @if($sq->count())
            @foreach($sq as $item)
            <tr class="total">
                <td></td>
                
                <td>
                    <label for="text_harga"> Total Harga : </label>
                    <label for="total_harga"> Rp. {{$item->total_harga}}</label>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>