<?php

require_once '_connec.php';


$pdo = new \PDO(DSN, USER, PASS);
                                 
                    // A exécuter afin d'afficher vos lignes déjà insérées dans la table friends

                    $query = "SELECT * FROM friend";

                    $statement = $pdo->query($query);

                    // On veut afficher notre résultat via un tableau associatif (PDO::FETCH_ASSOC)

                    $friendsArray = $statement->fetchAll(PDO::FETCH_ASSOC);


                    foreach($friendsArray as $friend) {

                        echo $friend['firstname'] . ' ' . $friend['lastname'] . '<br>';

                    }
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
        
    $errors = [];
    
    
        
            // nettoyage et validation des données soumises via le formulaire 
            if(!isset($firstname) || trim($firstname) === '') {
                $errors[] = "First name is required";}else{$firstname=trim($firstname);}
            if(!isset($lastname) || trim($lastname) === '') { 
                $errors[] = "Last name is required";}else{$lastname=trim($lastname);}
            if ((strlen($firstname))>45 ) {
                $errors[] = "First name too long";}
            if ((strlen($lastname))>45 ) {
                $errors[] = "Last name too long";}
        if(empty($errors)) {        
                    // On prépare notre requête d'insertion

                    $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';

                    $statement = $pdo->prepare($query);


                    // On lie les valeurs saisies dans le formulaire à nos placeholders

                    $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);

                    $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);


                    $statement->execute();
                
                    // A exécuter afin d'afficher vos lignes déjà insérées dans la table friends

                    $query = "SELECT * FROM friend";

                    $statement = $pdo->query($query);

                    // On veut afficher notre résultat via un tableau associatif (PDO::FETCH_ASSOC)

                    $friendsArray = $statement->fetchAll(PDO::FETCH_ASSOC);


                    foreach($friendsArray as $friend) {

                        echo $friend['firstname'] . ' ' . $friend['lastname'] . '<br>';

                    }
        }else{
                
            echo($errors);
        }
        header('Location: index.php');
        
                
                
                
                
                
                
}
                    
?>