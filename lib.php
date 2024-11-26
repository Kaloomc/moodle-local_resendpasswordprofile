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
 * Lib file is defined here.
 *
 * @package     local_resend_password_profile
 * @copyright   2024 François Garnier <francoisjgarnier@icloud.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Function local_resend_password_profile_myprofile_navigation
 *
 * Adds a button to the user's profile navigation if the user is an administrator.
 *
 * @param core_user\output\myprofile\tree $tree         The navigation tree to which the new nodes will be added.
 * @param stdClass $user                                 The user object containing user details.
 * @param bool $iscurrentuser                             True if the user is the current user, false otherwise.
 * @param stdClass|null $course                           The course object if available, null otherwise.
 *
 * @throws coding_exception                                 If there is a coding error.
 * @throws moodle_exception                                 If there is a Moodle related error.
 */
function local_resend_password_profile_myprofile_navigation($tree, $user, $iscurrentuser, $course) {
    // Check if the user is logged in and an administrator.
    if (!isloggedin() || !is_siteadmin()) {
        return;
    }

    // Creates a new category in the user profile.
    $category = new core_user\output\myprofile\category(
        'category',
        get_string('category', 'local_resend_password_profile'),
        null
    );

    // Generate the form with the button.
    $buttonhtml = '
    <form action="' . new moodle_url('/local/resend_password_profile/resend_email.php') . '" method="post">
        <input type="hidden" name="userid" value="' . $user->id . '">
        <input type="hidden" name="sesskey" value="' . sesskey() . '">
        <button type="submit" class="btn btn-primary">' . get_string('button', 'local_resend_password_profile') . '</button>
    </form>';

    // Creates a new node with the HTML button.
    $node = new core_user\output\myprofile\node(
        'category',
        'buttonnode',
        $buttonhtml,
        null,
        null
    );

    // Adds the node to the category.
    $category->add_node($node);

    // Adds the category to the profile tree.
    $tree->add_category($category);
}
 