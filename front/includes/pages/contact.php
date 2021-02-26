<?php
require_once('../commons/header.php');
?>

<!-- Put your code here my friend ;) -->


<div class="contactblock">

    <div class="container-contact">
        <div>
            <h1>Nous Contacter</h1>
        </div>
        <div class="block">
            <div class="content">

                <form class="form-connexion" action="./login.php" method="post">
                    <div class="infoutilisateur">
                        <div class="form-group">
                            <input type="input" id="" name="" placeholder=" ">
                            <label>Nom<label>
                        </div>
                        <div class="form-group mail">
                            <input type="input" id="" name="" placeholder=" ">
                            <label>Adresse mail<label>
                        </div>
                    </div>
                    <div class="infomessage">
                        <div class="form-group">
                            <textarea id="story" name="story" rows="5" cols="33"placeholder="Votre message"></textarea>
                            
                                
                        </div>
                    </div>

                    <button class="btnenvoyer">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php
require_once('../commons/footer.php');
?>