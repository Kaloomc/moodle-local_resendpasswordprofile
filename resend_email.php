<?php
// This file is part of Moodle - https://moodle.org/.
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
 * Resend email file is defined here.
 *
 * @package     local_resend_password_profile
 * @copyright   2025 François Garnier <francoisjgarnier@icloud.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php'); // Load the Moodle configuration.
require_once($CFG->libdir . '/moodlelib.php'); // Include necessary libraries.
require_once($CFG->libdir . '/authlib.php'); // Include authentication libraries.

require_login(); // Check that the user is logged in.
require_capability('moodle/user:create', context_system::instance()); // Check permissions.
require_sesskey(); // Validate the sesskey for CSRF protection.

// Configuration page.
$PAGE->set_url('/local/resend_password_profile/resend_email.php');
$PAGE->set_context(context_system::instance());

// Retrieve the ID of the user to whom the email will be sent.
$userid = required_param('userid', PARAM_INT);

// Load the user's information.
$user = $DB->get_record('user', ['id' => $userid], '*', MUST_EXIST);

// Check that the user is not deleted.
if ($user->deleted) {
    throw new moodle_exception('invaliduser', 'error'); // Display an error if the user is deleted.
}

// Generate a new password.
$newpassword = generate_password(8); // Generate a random password of 8 characters.

// Hash and update the user's password.
$hashedpassword = hash_internal_user_password($newpassword);
$DB->set_field('user', 'password', $hashedpassword, ['id' => $user->id]);

set_user_preference('auth_forcepasswordchange', 1, $user);

// Retrieve the full name of the site.
$sitename = format_string($SITE->fullname);

// Create the email content with the username.
$subject = get_string('subject', 'local_resend_password_profile') . " {$sitename}";
$messagetemplate = get_string('existingusernewpasswordtext', 'local_resend_password_profile');

// Replace variables in the message.
$message = str_replace(
    ['{firstname}', '{lastname}', '{sitename}', '{username}', '{newpassword}', '{wwwroot}'],
    [$user->firstname, $user->lastname, $sitename, $user->username, $newpassword, $CFG->wwwroot],
    $messagetemplate
);

// Define the site's "noreply" user.
$noreplyuser = core_user::get_noreply_user();

// Send the email to the user.
if (email_to_user($user, $noreplyuser, $subject, $message)) {
    // Redirect with a success message if the email is sent.
    redirect(
        new moodle_url(
            '/user/profile.php',
            [
                'id' => $userid,
            ]
        ),
        get_string('emailresent', 'local_resend_password_profile'),
        3
    );
} else {
    // Redirect with an error message if the email is not sent.
    redirect(
        new moodle_url(
            '/user/profile.php',
            [
                'id' => $userid,
            ]
        ),
        get_string('emailnotresent', 'local_resend_password_profile'),
        3
    );
}

