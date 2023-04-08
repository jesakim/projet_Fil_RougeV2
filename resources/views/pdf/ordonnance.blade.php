<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ma page</title>
</head>
<body>
    <h1>{{$patientName}}</h1>
    <h1>{{$created_at}}</h1>

<!-- Saut de page -->
<div style="page-break-before: always;" >brek</div>

@forelse ($drugs as $drug)

<h1>{{$drug}}</h1>
@empty
<h1>no drug</h1>
@endforelse
</body>
</html>


