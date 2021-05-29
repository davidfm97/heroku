<html >
<head>
    <meta charset="UTF-8">
    <title>CSS Konser Bileti</title>
<style></style>
</head>

<body>

            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->generate($codigoqr)) !!} ">




</body>
</html>
