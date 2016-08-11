      <ul id="menu">
            <li><a href="index.php"><img src="img/logo.png"></a></li>
            <li><a href="index.php">On en parle !</a>
              <ul>
                <li><a href="index.php?annee=2016">2016</a>
                  <ul>
                  <li><a href="index.php?sem=A16">A16</a></li>
                    <li><a href="index.php?sem=P16">P16</a></li>
                  </ul>
                </li>
                <li><a href="index.php?annee=2015">2015</a>
                  <ul>
                    <li><a href="index.php?sem=A15">A15</a></li>
                    <li><a href="index.php?sem=P15">P15</a></li>
                  </ul>
                </li>
                <li><a href="index.php?annee=2014">2014</a>
                  <ul>
                    <li><a href="index.php?sem=A14">A14</a></li>
                    <li><a href="index.php?sem=P14">P14</a></li>
                  </ul>
                </li>
                <li><a href="index.php?annee=2013">2013</a></li>
                <li><a href="index.php?annee=2012">2012</a></li>
                <li><a href="index.php?annee=2011">2011</a></li>
                <li><a href="index.php?annee=2010">2010</a></li>
                <li><a href="index.php?annee=2009">2009</a></li>
                <li><a href="index.php?annee=2008">2008</a></li>
                <li><a href="index.php?annee=2007">2007</a></li>
                <li><a href="index.php?annee=2006">2006</a></li>
                <li><a href="index.php?annee=2005">2005</a></li>
                <li><a href="index.php?annee=2004">2004</a></li>
                <li><a href="index.php?annee=2003">2003</a></li>
                <li><a href="index.php?annee=2002">2002</a></li>
                <li><a href="index.php?annee=2001">2001</a></li>
                <li><a href="index.php?annee=2000">2000</a></li>
                <li><a href="index.php?annee=1999">1999</a></li>
                <li><a href="index.php?annee=1998">1998</a></li>
                <li><a href="index.php?annee=1997">1997</a></li>
                <li><a href="index.php?annee=1996">1996</a></li>
                <li><a href="index.php?annee=1990">1990</a></li>
              </ul>
            </li>
            <li><a href="index.php?section=salle">Réservation salle</a></li>
            <li><a href="index.php?section=asso">L'association</a></li>
            <li><a href="index.php?section=plateforme">Plateforme collaborative</a></li>
            <li><a href="index.php?section=contact">Contact</a></li>
            <li><a href="index.php?section=partenaires">Partenaires</a></li>
            <li><a href="index.php?section=partitions">Banque de partitions</a>
              <ul>
                <li><a href="index.php?section=partitions&instru=piano">Piano</a></li>
                <li><a href="index.php?section=partitions&instru=guitare">Guitare</a></li>
                <li><a href="index.php?section=partitions&instru=basse">Basse</a></li>
                <li><a href="index.php?section=partitions&instru=batterie">Batterie</a></li>
                <li><a href="index.php?section=partitions&instru=triangle">Triangle</a></li>
                <li><a href="index.php?section=partitions&instru=saxophone">Saxophone</a></li>
                <li><a href="index.php?section=partitions&instru=trompette">Trompette</a></li>
                <li><a href="index.php?section=partitions&instru=cornemuse">Cornemuse</a></li>
              </ul>
            </li>
            <?php
              if (isset($_SESSION['user'])){
                echo "<li><a href=\"index.php?section=logout\"> "; echo $_SESSION['user']; echo " logout </a></li>";
              }
              else echo "<li><a href=\"index.php?section=login\">Connexion CAS</a>";
              if ((isset($_SESSION['user'])) and ($_SESSION['role']=="Président" or $_SESSION['role']=="Vice-président" or $_SESSION['role']=="Resp Communication" or $_SESSION['role']=="Resp Info")){
                echo "<li><a href=\"adm/index.php\">Administration</a></li>";
              }
            ?>
          </ul><br/><br/><br/>