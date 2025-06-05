<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="css/styles.css?v=1.0">
    
    <!-- --------------------------------------------------------------------------------------------------------- -->
    <script>
        function sendMail(event) {
            event.preventDefault(); // Empêche l'envoi du formulaire traditionnel

            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;
            
            // Encodage des paramètres pour éviter les problèmes avec les caractères spéciaux
            const subject = encodeURIComponent('Nouveau message du formulaire de contact');
            const body = encodeURIComponent(`Email: ${email}\n\nMessage:\n${message}`);

            const mailtoLink = `mailto:alexandre.baudouin161@gmail.com?subject=${subject}&body=${body}`;

            // Ouvre le client de messagerie par défaut
            window.location.href = mailtoLink;
        }
    </script>  
<!-- --------------------------------------------------------------------------------------------------------- --> 
</head>
<!-- --------------------------------------------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------------------------------------- -->
    <!-- HEADER -->
    <?php require_once('header.php'); ?>
<!-- --------------------------------------------------------------------------------------------------------- -->
   <!-- Contact Section -->
   <div class="container_mail">
        <h1>contactez nous</h1>
        <form onsubmit="sendMail(event)">
            <div class="mb-3">
                <label for="email" class="form-label">Votre e-mail:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Votre message:</label>
                <textarea id="message" name="message" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
<!-- --------------------------------------------------------------------------------------------------------- -->
    <!-- FOOTER -->
    <?php require_once('footer.php'); ?>
<!-- --------------------------------------------------------------------------------------------------------- -->  
</body>
</html>