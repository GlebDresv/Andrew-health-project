<html lang="">

<div>
    <form enctype="multipart/form-data" method="post" action="/upload">
        <label for="file">Choose file to upload</label>
        <input type="file" id="file" name="filename" accept=".csv">
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
<div>
    <form method="post" action="/download">
        <input type="submit" class="button" value="Download" name="download">
    </form>
</div>
<div>
    <table>
        <?php foreach ($dbh->query($sql_out) as $row) {
            echo "<tr>";
            echo "<th>" . htmlspecialchars($row['name']) . "</th>";
            echo "<th>" . htmlspecialchars($row['city']) . "</th>";
            echo "<th>" . htmlspecialchars($row['mass']) . "</th>";
            echo "</tr>";
        } ?>
    </table>
</div>
<div>
    <form method="post" action="/">
        <input type="submit" class="button" value="Home page" name="home">
    </form>
</div>
<div>
    <input value="Clients!" onclick="cli()" type="button">
</div>
<div id="clients"></div>
<script>
        function cli() {
            const req = new XMLHttpRequest();

            req.open("GET", "/clients");

            req.onreadystatechange = function () {
                if (req.readyState === 4 && req.status === 200) {
                    let clients=JSON.parse(req.responseText);
                    for(let i =0; i<clients.length;i++){
                        let li = document.createElement("li");
                        document.getElementById("clients").innerHTML +=
                            "<li>"+clients[i]+"</li>";
                    }
                }
            }

            req.send();
    }
</script>
</html>