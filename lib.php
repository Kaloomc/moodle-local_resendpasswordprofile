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

/**
 * Function local_resend_password_profile_myprofile_navigation
 *
 * @param $tree
 * @param $user
 * @param $iscurrentuser
 * @param $course
 *
 * @throws coding_exception
 * @throws moodle_exception
 */
function local_resend_password_profile_myprofile_navigation($tree, $user, $iscurrentuser, $course) {
    // Creates a new category in the user profile.
    $category = new core_user\output\myprofile\category('category', get_string('category', 'local_resend_password_profile'), null);

    // Creates the form with the button
    $buttonhtml = '
    <form action="' . new moodle_url('/local/resend_password_profile/resend_email.php') . '" method="post">
        <input type="hidden" name="userid" value="' . $user->id . '">
        <button type="submit" class="btn btn-primary">' . get_string('button', 'local_resend_password_profile') . '</button>
    </form>';

    // Creates a new node with the HTML button.
    $node = new core_user\output\myprofile\node('category', 'buttonnode', $buttonhtml, null, null);

    // Adds the node to the category.
    $category->add_node($node);

    // Adds the category to the profile.
    $tree->add_category($category);
}
