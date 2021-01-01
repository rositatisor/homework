<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input id="pick-type" name="hidden">
        <button type="submit" id="pick">Skinti</button>
        <button type="submit" id="pick-all">Skinti visus</button>
    </form>

    <script>
        let pick = document.getElementById('pick');
        if(pick) {
            pick.addEventListener('click', () => document.getElementById('pick-type').value = 1);
        }
    </script>
    
</body>
</html>