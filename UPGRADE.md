# Upgrade guide

Versions not listed here need no action. Back up the database before upgrading.

## Upgrading To 2.0.1

Requires October CMS 2.x and PHP 7.3. Upgrading from 1.5.0 needs a reinstall or `php artisan formbuilder:patch 2.0`.

## Upgrading To 3.0.0

Requires October CMS 3.0 and PHP 8.0.

## Upgrading To 3.1.0

Field types are rewritten for Bootstrap 5; forms rendered with an older framework need their markup adjusted.
Permissions are now granular, so review the roles after the upgrade. Validation uses the AJAX Framework extras
(`{% framework extras %}` in the layout).

## Upgrading To 4.0.0

Upgrade to 3.1.3 first and back up the database. The `responsiv/uploader-plugin` integration is replaced by native
AJAX file uploads: the migration adds the new upload field type and moves the old upload fields to it. Check the forms
with uploads afterwards.

## Upgrading To 5.0.1

Requires October CMS 4.x.

## Upgrading To 5.1.0

Field IDs are now unique per form. Restore the field types to the default markup to pick this up; customised field
types need the `field_id` variable added by hand.

## Upgrading To 5.1.4

Forms and field types are duplicated with native `duplicate()` methods instead of `bkwld/cloner`, so the `cloner::cloning` and `cloner::cloned` events are no longer fired.

## Upgrading To 5.1.5

Run `php artisan october:migrate`. Field type markup receives only `settings.site_key`, `settings.version`,
`settings.theme` and `settings.lang`; customised reCAPTCHA markup must be restored to default or updated by hand to
support v3. The autoresponder is saved as its own form submission, so a form with both switches on produces two
entries per submission.

## Upgrading To 5.2.0

**Security release. Upgrade every installation running 5.1.x.** Submitted values are now escaped in the submission
preview, and every backend AJAX handler checks its permission on the server. Requires PHP 8.2. Run
`php artisan october:migrate`.

Users who duplicate forms or field types, toggle field visibility or restore the default markup now need the matching
**Create** or **Update** permission; **Clear form submissions** needs **Truncate form submissions**. Review the roles
under **Settings → Administrators → Roles**.

Field names must be unique within the form and use only letters, digits, dashes and underscores; rename an older field
that breaks this rule (and its variable in the mail template) when saving it fails. Field HTML is inserted after the
form template is parsed, so Twig syntax typed into a label or a default value is rendered literally. Merge the changes
into `form.js` if you ship a customised copy: validation errors now clear as the visitor corrects the field, and a
second submit is blocked while the first is pending.

## Upgrading To 5.3.0

Run `php artisan october:migrate`. Field types still on the default markup are refreshed automatically; restore
customised ones under **Form Builder → Field types** or add the error and help ids, `aria-*` attributes and the new
`required` variable by hand. Required fields now show an asterisk, checkbox and radio lists render as a `fieldset`
with a `legend` and option ids `{field_id}-option-{key}`, and the Section heading is an `h2` styled as `h4`, so check
theme CSS and JS that target these elements.
Merge the `form.js` changes if you ship a customised copy.
