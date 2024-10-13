<?php
$string['pluginname'] = 'resend password profile';
$string['category'] = "Renvoyer l'email d'activation";
$string['button'] = "Renvoyer";
$string['emailresent'] = "L'email d'activation a été renvoyé avec succès.";
$string['emailnotresent'] = "Erreur lors du renvoi de l'email d'activation.";

$string['credits'] = 'Développé par François Garnier';

$string['subject'] = 'Votre nouveau compte sur';

$string['accountcreatedmessage'] = "
Bonjour {firstname} {lastname},

Un nouveau compte a été créé pour vous sur le site « {sitename} » et un mot de passe temporaire vous a été délivré.

Les informations nécessaires à votre connexion sont maintenant :
nom d’utilisateur : {username}
mot de passe : {newpassword}

Vous devrez changer votre mot de passe lors de votre première connexion.

Pour commencer à travailler sur « {sitename} », veuillez vous connecter en cliquant sur le lien ci-dessous :
{wwwroot}/login/?lang=fr

Dans la plupart des logiciels de courriel, cette adresse devrait apparaître comme un lien de couleur bleue qu’il vous suffit de cliquer. Si cela ne fonctionne pas, copiez ce lien et collez-le dans la barre d’adresse de votre navigateur web.

Si vous avez besoin d’aide, veuillez contacter l’administrateur du site « {sitename} » en cliquant sur ce lien :
<a href='{wwwroot}/user/contactsitesupport.php'>Contacter l’assistance du site</a>.

{sitename}
";
