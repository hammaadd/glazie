<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Glazie Email</title>
</head>    
<style>
    .container{
        width:80%;
        margin:0 auto;
        padding:10px;
    }
    .clear{
        clear: both;
    }
    .name{
        width: 160px;
       
        float: left;
    }
    .name1{
        width: 400px;
        float: left;
    }
    
    

</style>
<body>
    <div class="container">
        <h2>GlazieLtd</h2>
        <div class="clear"></div>
        <div class="name">
            <h3><b>Name</b></h3>
            <h3 style="margin-top: 30px" ><b>Email:</b></h3>
            <h3 style="margin-top: 30px" ><b>Address:</b></h3>
            <h3 style="margin-top: 30px" ><b>Message/<br>Question:</b></h3>
        </div>
        <div class="name1">
            <h3>{{$details['name']}}</h3>
            <h3 style="margin-top:30px;">{{$details['email']}}</h3>
            <h3 style="margin-top:30px;">{{$details['address']}}</h3>
            <h4 style="margin-top: 30px">{{$details['message']}}</h4>
        </div>
    </div>
</body>
</html>