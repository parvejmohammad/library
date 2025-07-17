<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3 style="color:pink">This is a reminder to deposit your monthly fees.</h3>
    <p>Entrollment Id : {{$details['Enrollment_id']}}</p>
    <p>Name : {{$details['Name']}}</p>
    <p>Father Name : {{$details['Father_name']}}</p>
    <p style="color:pink">Shift : {{$details['Shift']}}</p>
    <p>Seat Number : {{$details['Seat']}}</p>
    <p>Monthly Fees : {{$details['Fees']}}</p>
    <p style="color:red;">Last Deposit : {{$details['Payed_till']}}</p>

    <p>You're always welcome to Our Library</p>

</body>
</html>