<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print CR| FAMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 50px;
        }
        .header h1 {
            margin: 0;
            font-size: 1.2em;
            color: gray
        }
        .content {
            line-height: 1.6;
        }
        .content h2 {
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 1.0em;
            color: #333;
        }
        .content p {
            margin: 10px 0;
            font-size: 1em;
            color: #555;
        }
        .signature-section {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .signature {
            width: 45%;
            text-align: center;
            margin-top: 60px;
        }
        .signature p {
            margin: 0;
            font-size: 1em;
            color: #555;
        }
        .signature .name {
            margin-top: 80px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Form Change Request</h1>
        </div>

        <div class="content">
            <h2>User Status</h2>
            <p>{{ $proposal->user_request }}</p>
        </div>

        <div class="content">
            <h2>User Status</h2>
            <p>{{ $proposal->user_status }}</p>
        </div>

        <div class="content">
            <h2>Departement</h2>
            <p>{{ $proposal->departement }}</p>
        </div>

        <div class="content">
            <h2>Ext / Phone</h2>
            <p>{{ $proposal->ext_phone }}</p>
        </div>

        <div class="content">
            <h2>Facility</h2>
            <p>{{ $proposal->facility }}</p>
        </div>

        <div class="objectives">
            <h2>Notes :</h2>
            <p>{{ $proposal->user_note }}</p>
        </div>


        <!-- <div class="objectives">
            <h2>IT Analyst :</h2>
            <p>{{ $proposal->it_analys }}</p>
        </div> -->

        <div class="signature-section">
            <div class="signature">
                <p>Approved By:</p>
                <p class="name">Jana</p>
                <p>Administrator</p>
            </div>
        </div>
    </div>
    
</body>
</html>