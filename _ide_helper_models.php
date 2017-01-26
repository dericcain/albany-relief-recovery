<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App {

    /**
     * App\Group
     *
     * @property int $id
     * @property string $name
     * @property string $slug
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property-read \App\User $user
     * @method static \Illuminate\Database\Query\Builder|\App\Group whereCreatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Group whereId($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Group whereName($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Group whereSlug($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Group whereUpdatedAt($value)
     */
    class Group extends \Eloquent
    {
    }
}

namespace App {

    /**
     * App\Need
     *
     * @property int $id
     * @property string $main_contact
     * @property string $main_number
     * @property string $alt_number
     * @property string $age
     * @property string $other_names
     * @property string $address
     * @property string $zip
     * @property float $lat
     * @property float $lng
     * @property bool $home_is_damaged
     * @property string $owner_renter
     * @property int $number_of_stories
     * @property int $sq_ft
     * @property bool $is_primary_home
     * @property string $insurance_agency
     * @property bool $is_staying_home
     * @property string $home_damage
     * @property bool $has_power
     * @property bool $needs_medical
     * @property bool $has_baby
     * @property string $diaper_size
     * @property bool $needs_formula
     * @property string $formula_type
     * @property bool $needs_milk
     * @property string $over_counter_meds
     * @property string $clothing_needs
     * @property bool $needs_transportation
     * @property bool $needs_home_repair
     * @property bool $needs_trees_cut
     * @property bool $needs_tarp
     * @property bool $needs_debris_cleaned
     * @property string $repair_comments
     * @property int $physical_health_scale
     * @property int $emotional_health_scale
     * @property string $what_to_pray
     * @property bool $attends_local_church
     * @property string $church_attended
     * @property bool $applied_for_disaster_assistance
     * @property bool $applied_for_fema_food_stamps
     * @property bool $agrees_to_terms
     * @property string $digital_signature
     * @property string $volunteers_that_visited
     * @property string $resources_provided
     * @property string $additional_notes
     * @property bool $wants_to_help_long_term
     * @property string $needs_to_be_provided
     * @property string $member_name
     * @property string $member_phone
     * @property string $member_email
     * @property string $member_facebook
     * @property bool $is_associated_with_church
     * @property string $church_association
     * @property bool $can_contact
     * @property bool $is_completed
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\PhysicalNeed[] $physicalNeeds
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\WorkDetail[] $workDetails
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereAdditionalNotes($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereAddress($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereAge($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereAgreesToTerms($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereAltNumber($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereAppliedForDisasterAssistance($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereAppliedForFemaFoodStamps($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereAttendsLocalChurch($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereCanContact($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereChurchAssociation($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereChurchAttended($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereClothingNeeds($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereCreatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereDiaperSize($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereDigitalSignature($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereEmotionalHealthScale($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereFormulaType($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereHasBaby($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereHasPower($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereHomeDamage($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereHomeIsDamaged($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereId($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereInsuranceAgency($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereIsAssociatedWithChurch($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereIsCompleted($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereIsPrimaryHome($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereIsStayingHome($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereLat($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereLng($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereMainContact($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereMainNumber($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereMemberEmail($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereMemberFacebook($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereMemberName($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereMemberPhone($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereNeedsDebrisCleaned($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereNeedsFormula($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereNeedsHomeRepair($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereNeedsMedical($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereNeedsMilk($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereNeedsTarp($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereNeedsToBeProvided($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereNeedsTransportation($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereNeedsTreesCut($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereNumberOfStories($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereOtherNames($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereOverCounterMeds($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereOwnerRenter($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need wherePhysicalHealthScale($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereRepairComments($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereResourcesProvided($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereSqFt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereVolunteersThatVisited($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereWantsToHelpLongTerm($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereWhatToPray($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Need whereZip($value)
     */
    class Need extends \Eloquent
    {
    }
}

namespace App {

    /**
     * App\PhysicalNeed
     *
     * @property int $id
     * @property string $name
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Need[] $needs
     * @method static \Illuminate\Database\Query\Builder|\App\PhysicalNeed whereCreatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\PhysicalNeed whereId($value)
     * @method static \Illuminate\Database\Query\Builder|\App\PhysicalNeed whereName($value)
     * @method static \Illuminate\Database\Query\Builder|\App\PhysicalNeed whereUpdatedAt($value)
     */
    class PhysicalNeed extends \Eloquent
    {
    }
}

namespace App {

    /**
     * App\User
     *
     * @property int $id
     * @property string $name
     * @property string $email
     * @property string $password
     * @property int $group_id
     * @property string $remember_token
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property-read \App\Group $group
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User whereGroupId($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
     */
    class User extends \Eloquent
    {
    }
}

namespace App {

    /**
     * App\WorkDetail
     *
     * @property int $id
     * @property string $name
     * @property string $description
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Need[] $needs
     * @method static \Illuminate\Database\Query\Builder|\App\WorkDetail whereCreatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\WorkDetail whereDescription($value)
     * @method static \Illuminate\Database\Query\Builder|\App\WorkDetail whereId($value)
     * @method static \Illuminate\Database\Query\Builder|\App\WorkDetail whereName($value)
     * @method static \Illuminate\Database\Query\Builder|\App\WorkDetail whereUpdatedAt($value)
     */
    class WorkDetail extends \Eloquent
    {
    }
}

