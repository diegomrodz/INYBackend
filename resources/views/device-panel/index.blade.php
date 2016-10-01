<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>I Need You</title>

    <style type="text/css">
        
        body {
            margin: 0;            
        }

    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    
    <device-panel device="{{ $device->id }}" patient="{{ $patient->id }}"></device-panel>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>