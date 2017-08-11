<!doctype html>
<html lang="en-US">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <title>Temp App</title>
        
    <script>
        function lookupTemp() {
            console.log("looking up temp...");
        }
    </script>
    </head>

    <body>
        <header>
            <h1>Temperature App</h1>
        </header>

        <section>
            <form action="">
                <input id="inCity" placeholder="Search a location..." type="search" maxlength="35" autofocus>
                <input id="inSubmit" type="submit" onclick="lookupTemp();">
            </form>
        </section>

    </body>

</html>