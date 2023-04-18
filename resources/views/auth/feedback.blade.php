
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        @media (min-width: 768px) {
            .md\:mt-44 {
                margin-top: 11rem/* 176px */;
            }
            .md\:mx-auto {
                margin-left: auto;
                margin-right: auto;
                max-width: 32rem;
            }
            .md\:mb-14 {
                margin-bottom: 3.5rem/* 56px */;
            }
         }
         :root{
            font-family: Inter,  "sans-serif";
         }

    </style>

    @vite('resources/css/app.css')
    <title>Coronatime</title>
</head>
<body class=" min-h-screen font-inter text-slate-970 relative">

   
    <a
    style="   width: 90%;  padding: 1rem;  position: relative; display: block; margin-inline: auto;"
    class="md:mx-auto md:mb-14 md:mt-44">
        <img src="{{ asset('assets/preview.png') }}" alt="w-full" >
    </a>

    <div 
    style="text-align:center;">
        <h1 
        style="font-weight: 900; font-size: 1.5rem;line-height: 2rem;margin-bottom: 0.5rem "
        >{{ $title }}</h1>
        <h3 
        style="font-weight: 400; font-size: 1.125rem;line-height: 1.75rem; margin-bottom: 1.5rem"
        >{{ $hint }}</h3>
        <a
        href="{{ $href }}"
        style="cursor: pointer; text-transform: uppercase; background-color: rgb(15 186 104 );
        border-radius: 8px; color: rgb(255 255 255 );font-weight: 900;
        font-size: 0.875rem;line-height: 1.25rem; text-align: center; padding: 1rem 7rem"
        >{{ $content }}</a>    
    </div>
</body>
</html>