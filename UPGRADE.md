# Upgrade guide

Versions not listed here need no action. Back up the database before upgrading.

## Upgrading to 1.1.0

From version 1.1.0 plugin requires October build 300 and above.

## Upgrading to 1.1.4

Added wrapper_class to field properties. Update fields type manually if you want to use this.

## Upgrading to 1.2.7

Plugin will register Contact Form Template and Default Form Template. If you would like to use new mail layout you need
to create it manually from the source /plugins/renatio/formbuilder/updates/mail/layouts/formbuilder/. Layout code should
be specified as form_builder. Assign newly created layout to the templates by updating them manually.

## Upgrading to 2.0.1

Plugin requires OctoberCMS version 2.x with Laravel 6.x and PHP >=7.3.

Drop support for OctoberCMS version 1.x.

If you upgrade from version 1.5.0, then you should reinstall plugin or apply patch with following command:

```
php artisan formbuilder:patch 2.0
```

## Upgrading to 3.0.0

Plugin requires October CMS version 3.0 or higher, Laravel 9.0 or higher and PHP >=8.0.

Drop support for October CMS version 2.x.

## Upgrading to 3.1.0

Major refactor of the code to use PHP 8, Laravel 9 and October CMS 3.1 features.

Please review documentation for more information about new features.

List of changes:

- Default support for Bootstrap 5
- Rewrite of field types to use Bootstrap 5
- Floating labels (only available when using Bootstrap 5)
- Custom template for the form
- Full support for RainLab Translate 2.0 and Multisite
- Rework form validation to use AjaxFramework extra features
- Multiple forms on the same page
- Improve error handling
- Improve form logs
- Granular permissions (please review them after upgrade)
- Import/Export forms
- Import/Export field types
- Export form logs
- New field types: email, phone, url, numeric, datetime, date, time, color picker
- Restore all field types to default markup
- New event `formBuilder.extendFormData` to allow change of submitted form data
- Spam Protection plugin support

## Upgrading to 4.0.0

Before making the update please check if you are currently on 3.1.3 version of the plugin. If no, then make previous upgrades first.

Also before upgrading and running migrations please make the database backup.

This version removes `responsiv/uploader-plugin` support with native October ajax file upload.

The migration will add new upload field type and remove old ones. The new field type will be assigned to all old upload fields.

Please check your forms after upgrading.

For more details about new upload field type please read documentation.

## Upgrading to 5.1.0

Version 5.1.0 introduces improved unique `field_id` generation for fields.
If you want to take advantage of the corrected and fully unique field IDs in your forms, you should reset Field Types to their default markup via the backend UI.

This ensures that the updated `field_id` logic is applied to all field types, including those previously customized.

If you have manually modified any field types or their markup, it is recommended to review and update them manually instead of resetting them to default.
