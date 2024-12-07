<?php
include "../config.php";
include "../utils.php";
$dbConn =  connect($db);

$sql = $dbConn->prepare("SELECT * FROM libros;");
   $sql->execute();
   $sql->setFetchMode(PDO::FETCH_ASSOC);
  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VersaBooks</title>
    <link rel="stylesheet" href="..\css/style.css">
    <link rel="stylesheet" href="..\css/change.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>


    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo">
                VersaBooks
            </div>
            <nav class="menu">
                <a href="..\index.html">Inicio</a>
                <a href="#acerca">Acerca</a>
                <a href="change.html" class="active">Intercambio</a>
                <a href="#lectura">Lectura</a>
            </nav>
            <a href="login.html" class="user-icon">
                <i class="fa fa-user-circle"></i>
            </a>
        </div>
    </header>

    <section class="books-section">
        <h2 class="section-title">Intercambio de Libros</h2>
        <div class="books-list">
        <?php 
        while($array=$sql->fetch(PDO::FETCH_ASSOC)) {
            ?>
            
            <div class="book">
                <img src="data:image/jpg;base64,<?php echo base64_encode($array['portada'])?>" alt="Libro 1" class="book-image">
                <h3 class="book-title"><?php print($array['titulo']); ?></h3>
                <?php
                $autors=explode(",", $array['autores']);
                for($i=0;$i<count($autors);$i++){
                    ?>
                    <p class="book-author"><?php print($autors[$i]); ?></p>
                <?php
                } 

                ?>
                
                <a href="#" class="book-button">Detalles</a>
            </div>

            <?php
        }

        ?>
        
            <div class="book">
                <img src="..\img/book1.jpg" alt="Libro 1" class="book-image">
                <h3 class="book-title">The Great Gatsby</h3>
                <p class="book-author">F. Scott Fitzgerald</p>
            </div>
            <div class="book">
                <img src="..\img/book1.jpg" alt="Libro 1" class="book-image">
                <h3 class="book-title">The Great Gatsby</h3>
                <p class="book-author">F. Scott Fitzgerald</p>
            </div>
            <div class="book">
                <img src="..\img/book1.jpg" alt="Libro 1" class="book-image">
                <h3 class="book-title">The Great Gatsby</h3>
                <p class="book-author">F. Scott Fitzgerald</p>
            </div>
            <div class="book">
                <img src="..\img/book1.jpg" alt="Libro 1" class="book-image">
                <h3 class="book-title">The Great Gatsby</h3>
                <p class="book-author">F. Scott Fitzgerald</p>
            </div>
            <div class="book">
                <img src="..\img/book1.jpg" alt="Libro 1" class="book-image">
                <h3 class="book-title">The Great Gatsby</h3>
                <p class="book-author">F. Scott Fitzgerald</p>
            </div>
            <div class="book">
                <img src="..\img/book1.jpg" alt="Libro 1" class="book-image">
                <h3 class="book-title">The Great Gatsby</h3>
                <p class="book-author">F. Scott Fitzgerald</p>
            </div>
        </div>
    </section>
    




    <!-- Footer -->
    <!--  <footer class="footer">
        <p>2024 VersaBooks. All rights reserved.</p>
      </footer> -->

</body>

</html>