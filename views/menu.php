      <ul id="menu">
            <li><a href="index.php"><img src="img/logo.png"></a></li>
            <li><a href="#">On en parle !</a>
              <ul>
                <li><a href="P16.php">2016</a>
                  <ul>
                  <li><a href="#">A16</a></li>
                    <li><a href="P16.php">P16</a></li>
                  </ul>
                </li>
                <li><a href="#">2015</a>
                  <ul>
                    <li><a href="#">A15</a></li>
                    <li><a href="#">P15</a></li>
                  </ul>
                </li>
                <li><a href="#">2014</a>
                  <ul>
                    <li><a href="#">A14</a></li>
                    <li><a href="#">P14</a></li>
                  </ul>
                </li>
                <li><a href="#">2013</a></li>
                <li><a href="#">2012</a></li>
                <li><a href="#">2011</a></li>
                <li><a href="#">2010</a></li>
                <li><a href="#">2009</a></li>
                <li><a href="#">2008</a></li>
                <li><a href="#">2007</a></li>
                <li><a href="#">2006</a></li>
                <li><a href="#">2005</a></li>
                <li><a href="#">2004</a></li>
                <li><a href="#">2003</a></li>
                <li><a href="#">2002</a></li>
                <li><a href="#">2001</a></li>
                <li><a href="#">2000</a></li>
                <li><a href="#">1999</a></li>
                <li><a href="#">1998</a></li>
                <li><a href="#">1997</a></li>
                <li><a href="#">1996</a></li>
              </ul>
            </li>
            <li><a href="#">Réservation salle</a></li>
            <li><a href="#">L'association</a></li>
            <li><a href="#">Plateforme collaborative</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Partenaires</a></li>
            <li><a href="#">Banque de partition</a>
              <ul>
                <li><a href="#">Piano</a></li>
                <li><a href="#">Guitare</a></li>
                <li><a href="#">Basse</a></li>
                <li><a href="#">Batterie</a></li>
                <li><a href="#">Triangle</a></li>
                <li><a href="#">Saxophone</a></li>
                <li><a href="#">Trompette</a></li>
                <li><a href="#">Cornemuse</a></li>
              </ul>
            </li> 
            <?php
              if (isset($_SESSION['user'])){
                echo "<li><a href=\"index.php?section=logout\"> "; echo $_SESSION['user']; echo " logout </a></li>";
              }
              else echo "<li><a href=\"index.php?section=login\">Connexion CAS</a>";
            ?>
          </ul><br/><br/><br/>