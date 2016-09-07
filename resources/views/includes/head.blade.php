<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Wayfinding')}}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <script type="text/javascript">
            window.Laravel = <?php echo json_encode([
                'crsfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
<body>
