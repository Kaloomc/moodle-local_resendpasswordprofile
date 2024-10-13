<?php
require_once(__DIR__ . '/../../config.php'); // Charger la configuration Moodle
require_once($CFG->libdir . '/moodlelib.php'); // Inclure les bibliothèques nécessaires
require_once($CFG->libdir . '/authlib.php'); // Inclure les bibliothèques d'authentification

require_login(); // Vérifier que l'utilisateur est connecté
require_capability('moodle/user:create', context_system::instance()); // Vérifier les permissions

// Configuration de la page
$PAGE->set_url('/local/resend_password_profile/resend_email.php');
$PAGE->set_context(context_system::instance());

// Récupérer l'ID de l'utilisateur à qui envoyer l'email
$userid = required_param('userid', PARAM_INT);

// Charger les informations de l'utilisateur
$user = $DB->get_record('user', array('id' => $userid), '*', MUST_EXIST);

// Vérifier que l'utilisateur n'est pas supprimé
if ($user->deleted) {
    print_error('invaliduser'); // Affiche une erreur si l'utilisateur est supprimé
}

// Générer un nouveau mot de passe
$newpassword = generate_password(8); // Générer un mot de passe aléatoire de 8 caractères

// Hacher et mettre à jour le mot de passe de l'utilisateur
$hashedpassword = hash_internal_user_password($newpassword);
$DB->set_field('user', 'password', $hashedpassword, ['id' => $user->id]);

// Récupérer le nom complet du site
$sitename = format_string($SITE->fullname);

// Créer le contenu de l'email avec le nom d'utilisateur
$subject = get_string('subject','local_resend_password_profile') ." {$sitename}";
$message_template = get_string('accountcreatedmessage', 'local_resend_password_profile');

// Remplace les variables dans le message
$message = str_replace(
    ['{firstname}', '{lastname}', '{sitename}', '{username}', '{newpassword}', '{wwwroot}'],
    [$user->firstname, $user->lastname, $sitename, $user->username, $newpassword, $CFG->wwwroot],
    $message_template
);


// Envoyer l'email à l'utilisateur
if (email_to_user($user, get_admin(), $subject, $message)) {
    // Rediriger avec un message de succès si l'email est envoyé
    redirect(new moodle_url('/user/profile.php', ['id' => $userid]), get_string('emailresent', 'local_resend_password_profile'), 3);
} else {
    // Rediriger avec un message d'erreur si l'email n'est pas envoyé
    redirect(new moodle_url('/user/profile.php', ['id' => $userid]), get_string('emailnotresent', 'local_resend_password_profile'), 3);
}
