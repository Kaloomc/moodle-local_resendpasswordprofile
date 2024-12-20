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
 * Privacy API implementation for local_resend_password_profile.
 *
 * @package     local_resend_password_profile
 * @copyright   2024 François Garnier
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_resend_password_profile\privacy;

defined('MOODLE_INTERNAL') || die();

/**
 * Privacy provider implementation for local_resend_password_profile.
 *
 * This plugin does not store any personal data.
 */
class provider implements \core_privacy\local\metadata\null_provider {
    /**
     * Returns a language string identifier explaining why this plugin stores no data.
     *
     * @return  string
     */
    public static function get_reason(): string {
        return 'privacy:metadata';
    }
}
