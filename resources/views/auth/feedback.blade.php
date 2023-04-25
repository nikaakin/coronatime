
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Email</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    <style>
        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            /* Set image width to 90% */
        
            .img-container img {
                width: 90%;
            }
            /* Center button */
            .btn-container {
                text-align: center;
            }

            .title{
                font-size: 24px;
                line-height: 32px;
                margin: 16px 0 8px 0;
            }
        }
      
        :root{
            font-family: Inter,  "sans-serif";
         
        }

         @vite('resources/css/app.css')
    </style>
</head>
<body>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
        <tr>
            <td align="center" bgcolor="#ffffff" style="padding: 40px 0 30px 0;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 520px;">
                    <tr>
                        <td class="img-container" align="center">
                            <img src="{{ asset('assets/preview.png')  }}" alt="Example Image" style="display: block; width: 100%; max-width: 520px;">
                        </td>
                    </tr>
                    <tr>
                        <td align="center" >
                            <p style="font-weight: 900; font-size: 24px;line-height: 32px;margin: 16px 0 8px 0;">{{ $title }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" >
                            <p style="font-weight: 400; font-size: 18px;line-height: 28px; ;margin: 0 0 24px 0">{{ $hint }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" class="btn-container" >
                            <a href="{{ $href }}" style="padding:16px 0;  margin:0 auto; text-align: center; cursor: pointer; text-transform: uppercase; background-color: 	#0FBA68;border-radius: 8px; color: #ffffff;font-weight: 900;font-size: 14px;line-height: 18px; text-align: center;max-width: 390px; width:100%; text-decoration:none;display:block;">
                            {{ $content }}</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>