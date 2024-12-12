<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * FR Lang file is defined here.
 *
 * @package     local_resend_password_profile
 * @copyright   2024 François Garnier <francoisjgarnier@icloud.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['button'] = "Renvoyer";
$string['category'] = "Renvoyer l'email d'activation";
$string['credits'] = 'Développé par François Garnier';
$string['emailnotresent'] = "Erreur lors du renvoi de l'email d'activation.";
$string['emailresent'] = "L'email d'activation a été renvoyé avec succès.";
$string['existingusernewpasswordtext'] = "Bonjour {firstname} {lastname},

Votre compte a été mis à jour sur le site « {sitename} » et un mot de passe temporaire vous a été délivré.

Les informations nécessaires à votre connexion sont maintenant :
nom d’utilisateur : {username}
mot de passe : {newpassword}

Vous devrez changer votre mot de passe lors de votre première connexion.

Pour commencer à travailler sur « {sitename} », veuillez vous connecter en cliquant sur le lien ci-dessous :
{wwwroot}/login/?lang=fr

Dans la plupart des logiciels de courriel, cette adresse devrait apparaître comme un lien de couleur bleue qu’il vous suffit de cliquer. Si cela ne fonctionne pas, copiez ce lien et collez-le dans la barre d’adresse de votre navigateur web.

Si vous avez besoin d’aide, veuillez contacter l’administrateur du site « {sitename} » en cliquant sur ce lien :
<a href='{wwwroot}/user/contactsitesupport.php'>Contacter l’assistance du site</a>.

{sitename}";
$string['pluginname'] = 'resend password profile';
$string['privacy:metadata'] = 'Le plugin Resend Password Profile ne stocke aucune donnée personnelle.';
$string['subject'] = 'Votre compte sur';


