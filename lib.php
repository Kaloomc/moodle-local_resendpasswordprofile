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

defined('MOODLE_INTERNAL') || die(); // phpcs:ignore moodle.Files.MoodleInternal.MoodleInternalNotNeeded

/**
 * This file contains the code for the plugin integration.
 *
 * @package     local_resend_password_profile
 * @copyright   2025 François Garnier <francoisjgarnier@icloud.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Adds a "Resend password" button to the user's profile navigation
 * if the viewer is a site administrator.
 *
 * @param core_user\output\myprofile\tree $tree     The navigation tree.
 * @param stdClass $user                           The user whose profile is being viewed.
 * @param bool $iscurrentuser                      True if the user is the current user.
 * @param stdClass|null $course                    The course object if available.
 *
 * @return void
 */
function local_resend_password_profile_myprofile_navigation($tree, $user, $iscurrentuser, $course) {
    if (!isloggedin() || !is_siteadmin()) {
        return;
    }

    $category = new core_user\output\myprofile\category(
        'category',
        get_string('category', 'local_resend_password_profile'),
        null
    );

    $resendbutton = new single_button(
        new moodle_url('/local/resend_password_profile/resend_email.php', [
            'userid' => $user->id,
            'sesskey' => sesskey(),
        ]),
        get_string('button', 'local_resend_password_profile'),
        'post'
    );

    global $OUTPUT;
    $buttonhtml = $OUTPUT->render($resendbutton);

    $node = new core_user\output\myprofile\node(
        'category',
        'buttonnode',
        $buttonhtml
    );

    $category->add_node($node);
    $tree->add_category($category);
}
