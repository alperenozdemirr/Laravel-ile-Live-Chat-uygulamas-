<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        let ajax_url = "{{ route('ajax') }}",
            token = "{{ csrf_token() }}";


    </script>
    <script src="{{asset('frontend')}}/app/ajax.js" ></script>

    <title>ajax denme page</title>
</head>
<body>
<ul id="veri">

</ul>
</body>
</html>
