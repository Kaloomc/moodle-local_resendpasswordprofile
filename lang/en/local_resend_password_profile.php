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
 * EN Lang file is defined here.
 *
 * @package     local_resend_password_profile
 * @copyright   2025 François Garnier <francoisjgarnier@icloud.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['button'] = "Resend";
$string['category'] = "Resend activation email";
$string['credits'] = 'Developped by François Garnier';
$string['emailnotresent'] = "Error while resending the activation email.";
$string['emailresent'] = "The activation email has been successfully resent.";
$string['existingusernewpasswordtext'] = "Hello {firstname} {lastname},

Your account has been updated for you on the site « {sitename} » and a temporary password has been issued to you.

The information required for your login is now:
username: {username}
password: {newpassword}

You will need to change your password during your first login.

To start working on « {sitename} », please log in by clicking the link below:
{wwwroot}/login/?lang=en

In most email clients, this address should appear as a blue clickable link. If it doesn't work, copy this link and paste it into the address bar of your web browser.

If you need help, please contact the administrator of the site « {sitename} » by clicking this link:
<a href='{wwwroot}/user/contactsitesupport.php'>Contact site support</a>.

{sitename}";
$string['pluginname'] = 'resend password profile';
$string['privacy:metadata'] = 'The Resend Password Profile plugin does not store any personal data.';
$string['subject'] = 'Your account on';
