# Form Builder Plugin

Build forms for your [October CMS](https://octobercms.com) site without code — with file uploads, reCAPTCHA and a log
of every submission.

**Demo URL:** https://october-demo.renatio.com/backend/backend/auth/signin  
**Login:** formbuilder  
**Password:** formbuilder

Contact forms, quote requests, job applications or surveys: put the form together from ready field types, place it on
a page, and every submission lands in your inbox and in the backend.

## Features

* Build and manage forms in the October CMS backend, reorder fields with drag and drop
* 21 field types out of the box, editable HTML markup for each of them and custom field types
* Custom form template with the `form_field()` helper for any layout
* Native AJAX file uploads with attachments in the submission and in the mail
* Google reCAPTCHA v2 and v3, [Spam Protection Plugin](https://octobercms.com/plugin/renatio-spamprotection) support
* Reply-to and autoresponder with their own mail templates
* Form submissions log with e-mail preview, filters, CSV/JSON export and automatic pruning
* Import and export of forms and field types
* Granular backend permissions for forms, field types and submissions
* Events to override the form, the fields, the submitted data and the message
* RainLab Translate with Multisite, RainLab Location and RainLab Pages (form as a snippet) support
* Multilingual: English, Polish, German, French, Spanish, Brazilian Portuguese, Italian, Russian, Dutch and Czech translations included — more available on request

## Requirements

This plugin requires October CMS 4.x and PHP 8.2 or newer.

If you are running October CMS 3.x, use the 4.x version of this plugin.

## Why is this a paid plugin?

Something that is free has little or no perceived value. Users do not commit to free products and only use them until
something else that looks nice and is free comes along. When I invest my time in the development of a new plugin I commit to
supporting and maintaining it. I ask my customers to do the same. I do not make money from this plugin by
advertisements, upgrades or additional services like hosting or setup.

Did you know that 30% of your purchase or donation goes to help fund the October Project?

My plugins take many hours to develop (40-120+) and even more hours to document and maintain. My paid plugins have to
pay for both this time, and the time I am spending on free plugins and less successful paid plugins. This means that it
will take even a successful plugin years to become profitable. Please consider buying an extended license if you want me
to continue to maintain these plugins for the very small fee I ask in return or hire me for adding functionality that
you feel is missing but valuable.

## Like this plugin?

If you like this plugin, give this plugin a like or make a donation with [PayPal](https://www.paypal.me/mplodowski).

## My other plugins

Please check my other [plugins](https://octobercms.com/author/Renatio).

## Support

Please use [GitHub Issues Page](https://github.com/mplodowski/formbuilder-plugin-public/issues) to report any issues with
the plugin.

> Reviews should not be used for getting support or reporting bugs, if you need support please use the Plugin support
> link.

Icon made by [Darius Dan](https://www.flaticon.com/authors/darius-dan)
from [www.flaticon.com](https://www.flaticon.com/).

# Documentation

## Usage

After installation the plugin registers the **Form Builder** backend menu with four items: **Forms**, **Field types**,
**Form submissions** and **Settings**. Two example forms are installed: a simple contact form and a default form that
demonstrates every field type.

Place the `renderForm` component on a CMS page, inspect it and choose the form.

The form is submitted through the AJAX Framework, so the layout must load it next to the page styles:

```
<head>
    {% styles %}
</head>
<body>
    ...
    {% framework extras %}
    {% scripts %}
</body>
```

### Example of placing form component on CMS page

`/themes/demo/pages/contact.htm`

```
url = "/contact"
layout = "default"

[renderForm contactForm]
formCode = "contact-form"
==
{% component 'contactForm' %}
```

### Example of placing form component on CMS partial

`/themes/demo/pages/contact.htm`

```
url = "/contact"
layout = "default"

[renderForm contactForm]
formCode = "contact-form"
==
{% ajaxPartial "contact" %}
```

`/themes/demo/partials/contact.htm`

```
{% component 'contactForm' %}
```

> **Important note:** The form handler works only inside `{% ajaxPartial %}`, not inside a plain `{% partial %}`.

## Forms

### Spam Protection

Install the [Spam Protection Plugin](https://octobercms.com/plugin/renatio-spamprotection) to protect every Form Builder
form with a honeypot, content rules, a single-use form token and a per-visitor rate limit. It works out of the box.

A submission identical to one accepted within the last minute is answered with the success message but is neither
logged nor mailed again, so a double click or a page refresh after sending does not produce duplicates.

### Custom template

The plugin generates the form template while the **Custom Template** field is empty. To replace that markup, write your
own template there and render each field with the `form_field()` function, which takes the field name.

Example that will display two fields in one row:

```
<div class="row">
    <div class="col-6">{{ form_field('first_name') }}</div>
    <div class="col-6">{{ form_field('last_name') }}</div>
</div>
```

### Floating labels

Turn on **Floating labels** in the form's **Options** tab to render
[Bootstrap floating labels](https://getbootstrap.com/docs/5.3/forms/floating-labels/). The theme must use Bootstrap 5.

## Fields

### Custom HTML markup for fields

You can change HTML markup for each field type under **Form Builder → Field types**. The recommended approach is to
duplicate the field type and modify the copy.

### Custom field types

Create a field type under **Form Builder → Field types** with the **New field type** button. For example, an **Email**
field type is the markup of **Text** with the input type changed to `email`. Once saved, it can be used in any form.

In markup section you can use Twig and following variables:

 Property          | Type   | Description
-------------------|--------|----------------------------------------------------
 label             | String | Label for the field.
 field_id          | String | Unique field ID useful when pairing labels with inputs.
 label_class       | String | Label CSS classes.
 name              | String | HTML name attribute. Also used in mail template.
 default           | String | Default value for the field.
 comment           | String | Help block for the field.
 class             | String | HTML class.
 wrapper_class     | String | HTML wrapper class.
 placeholder       | String | Placeholder for the field.
 options           | Array  | Options for dropdown, radio list, checkbox list.
 custom_attributes | String | Custom HTML attributes. For example id="my-field".

### Available field types

| Field type | Renders |
|---|---|
| Text | a single-line text input |
| Textarea | a multi-line text box |
| E-mail, Phone number, URL, Numeric | an `email`, `tel`, `url` or `number` input |
| Date, Time, Datetime | a `date`, `time` or `datetime-local` input |
| Color Picker | a `color` input |
| Dropdown | a dropdown with the given options |
| Checkbox | a single checkbox |
| Checkbox List | a list of checkboxes |
| Radio List | a list of radio options, where only one can be selected |
| Hidden | a hidden input |
| Section | a heading and subheading for grouping fields |
| Submit | the submit button |
| reCaptcha, File upload, Country select, State select | see below |

#### reCaptcha

Renders Google reCAPTCHA, either **v2** (checkbox) or **v3** (invisible and score-based, no user interaction).

Create the keys on the [reCAPTCHA site](https://www.google.com/recaptcha/admin) — v2 and v3 keys are not
interchangeable — and enter them under **Settings → Form Builder → Google reCAPTCHA**:

- **Version** — reCAPTCHA v2 (Checkbox) or reCAPTCHA v3 (Invisible).
- **Site Key** and **Secret Key** — must match the selected version.
- **Score Threshold** (v3 only) — minimum score from 0.0 (likely bot) to 1.0 (likely human) needed to pass. Default is
  0.5.
- **Language** — language of the widget.
- **Theme** — light or dark v2 checkbox widget.

> **Important note:** This field must have **g-recaptcha-response** as field name and **required|recaptcha** in
> validation section to work properly.

#### File upload

Renders a file input.

##### Filter files selected by a user

To limit the file picker, add an `accept` custom attribute, for example `accept=".pdf,.doc"` for PDF and Word files or
`accept="image/*"` for images.

##### Validation

Add the rules in the field's validation section:

- `required` — a file must be chosen,
- `max:512` — at most 512 KB,
- `mimes:pdf` — PDF files only,
- `image` — images only.

See the [available validation rules](https://docs.octobercms.com/4.x/extend/services/validation.html#available-validation-rules)
for more.

##### Multiple files

To accept more than one file, check **Allow multiple files** in the **Upload Options** tab. Then check **Nested array
based form input** next to each rule so it applies to every uploaded file, except the `required` rule.

##### Send uploaded files as mail attachments

Uploaded files are attached to the mail by default. Uncheck the option to send the mail without them.

##### Display mode

Tells the backend how to show the uploaded files in a form submission. Choose `image` when only images are allowed.

#### Country select

Renders a dropdown with country options.

> **Important note:** You must install [Location Plugin](https://octobercms.com/plugin/rainlab-location) to use this
> field.

#### State select

Renders a dropdown with state options. This field depends on country select.

> **Important note:** You must install [Location Plugin](https://octobercms.com/plugin/rainlab-location) to use this
> field.

## Using form data in mail templates

Every submitted field is available in the mail template under its name. For a field named **name**:

```
{{ name }}
```

The value is already processed by Form Builder: dropdowns and radio lists return the **label** of the selected option,
checkbox lists the selected labels separated by commas, a checkbox *Yes* or *No*, and country and state selects the
name. The value exactly as the browser sent it is available with the `_raw` suffix:

```
{{ name_raw }}
```

## Form Submissions

Every submission is stored under **Form Builder → Form submissions** with the submitted values, the uploaded files, the
sender IP address and a preview of the sent e-mail. The autoresponder is stored as a separate submission, marked with
the **Autoresponder** column and filter. Turn logging off per form in the **Options** tab; a form without a mail
template always logs, because the submission would otherwise be lost.

Submissions are pruned by a daily scheduled job after **Prune period in days** from **Settings → Form Builder**.
It only runs if October's scheduler is running (`php artisan schedule:run` every minute). Leave the period empty to
keep submissions forever.

Submissions can be exported to CSV or JSON from the toolbar.

## Settings

Plugin settings are available at **Settings → Form Builder**.

- **reCAPTCHA version**, **Site key**, **Secret key**, **Score threshold**, **Language**, **Theme** — see the
  *reCaptcha* field type above. The pre-filled demo keys work with v2 only.
- **Prune period in days** — how long submissions are kept. Default: `30`.

## Permissions

| Permission | Grants |
|---|---|
| **Manage Forms** | the Forms list; create, update, delete and import/export have their own permission each |
| **Manage field types** | the Field types list; create, update, delete and import/export have their own permission each. Update also covers restoring the default markup |
| **Manage form submissions** | the Form submissions list; preview, delete, truncate and export have their own permission each |
| **Manage Settings** | the plugin settings page |

Every backend action checks its permission on the server, so a user without it gets a 403 even when the button is
reached by hand.

## Events

| Event | Fired when | Payload |
|---|---|---|
| `formBuilder.overrideForm` | before the form markup is rendered | `&$form` — replace or change the model |
| `formBuilder.overrideField` | before each field is rendered | `&$field`, `$form` |
| `formBuilder.formSubmitted` | the submission passed validation | `&$form` |
| `formBuilder.extendFormData` | before the mail data is built; return the array to replace it | `$data` |
| `formBuilder.beforeSendMessage` | before the mail is sent; return `false` to cancel it | `$form`, `$data` |

Listen in your plugin's `boot()` method:

```php
Event::listen('formBuilder.overrideForm', function ($form) {
    $form->css_class = 'form-horizontal';
});

Event::listen('formBuilder.overrideField', function ($field, $form) {
    if ($field->name === 'currency') {
        $field->default = 'USD';
    }
});

Event::listen('formBuilder.extendFormData', function ($data) {
    $data['foo'] = 'bar';

    return $data;
});

Event::listen('formBuilder.beforeSendMessage', function ($form, $data) {
    $form->from_email = 'john.doe@example.com';
    $form->from_name = 'John Doe';
});
```
