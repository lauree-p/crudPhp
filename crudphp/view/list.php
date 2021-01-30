<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crud en php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <div class="row">
            <h2>Crud en Php</h2>
        </div>
        <div class="row">
            <a href="index.php?action=edit" class="btn btn-success">Ajouter un user</a>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>Firstname</th>
                        <th>birthDate</th>
                        <th>Tel</th>
                        <th>Pays</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>metier</th>
                        <th>Url</th>
                        <th>Edition</th>
                    </thead>
                    <tbody>
                        <?php 
                        //include_once 'database.php';
                        //on inclut notre fichier de connection 
                        $pdo = Database::connect(); 
                        //on se connecte à la base
                        $sql = 'SELECT * FROM crudPhp_user ORDER BY id DESC';
                        //on formule notre requete 
                        foreach ($pdo->query($sql) as $row) { 
                            //on cree les lignes du tableau avec chaque valeur retournée
                            echo '<br /><tr>';
                            echo'<td>' . $row['name'] . '</td>';
                            echo'<td>' . $row['firstname'] . '</td>';
                            echo'<td>' . $row['birthDate'] . '</td>';
                            echo'<td>' . $row['tel'] . '</td>';
                            echo'<td>' . $row['email'] . '</td>';
                            echo'<td>' . $row['pays'] . '</td>';
                            echo'<td>' . $row['comment'] . '</td>';
                            echo'<td>' . $row['metier'] . '</td>';
                            echo'<td>' . $row['url'] . '</td>';
                            echo '<td>';
                            echo '<a class="btn" href="index.php?action=read&id=' . $row['id'] . '">Read</a>';// un autre td pour le bouton d'edition
                            echo '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-success" href="index.php?action=edit&id=' . $row['id'] . '">Update</a>';// un autre td pour le bouton d'update
                            echo '</td>';
                            echo'<td>';
                            echo '<a class="btn btn-danger" href="index.php?action=delete&id=' . $row['id'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect(); //on se deconnecte de la base
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>

</html>