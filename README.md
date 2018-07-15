# Form Builder plugin

This plugin allows you to build custom front-end forms with ease. With this plugin you can create not only contact form, but any form.

## Features
* Build and manage your forms in OctoberCMS backend
* Use custom HTML markup for fields
* Create custom fields
* Reorder fields
* Example form with all default form controls
* Files uploader
* Basic responsive mail template and layout
* Google reCaptcha support
* RainLab Translate Plugin support
* RainLab Location Plugin support
* Event for extending default functionality

## Future plans
* Import/Export functionality

# Documentation

## Usage

After installation plugin will register backend **Form Builder** menu position. From there you will be able to manage your forms.

There will be two sub-menus, Forms and Field types. Forms will list all created forms. Field types will list all available field types.

Plugin after installation will create example form with all supported field types.

Plugin will register renderForm component to use it on your page. After adding this component to page, you must inspect it (by clicking on it) and choose the form.

You can also specify the redirect page which will be showed to user after successful call.

Plugin uses Ajax Framework to process form. Remember to add in layout following code:

    {% framework extras %}
    {% scripts %}

## Custom HTML markup for fields

You can change HTML markup for each field by going to Form Builder > Field types and updating the field type.

## Custom field types

You can create custom field types by going to Form Builder > Field types and create **New field types** button.

For example if you want to create **Email** field type just copy the markup from **Text** field type and change the type of the input from text to email.

Now after saving this field it will be possible to use it in your form.

In markup section you can use Twig and following variables:

Property | Type | Description
--------------------- | --------------------- | ---------------------
label | String | Label for the field.
name | String | HTML name attribute. Also used in mail template.
default | String | Default value for the field.
class | String | HTML class.
wrapper_class | String | HTML wrapper class.
placeholder | String | Placeholder for the field.
options | Array | Options for dropdown, radio list, checkbox list.
custom_attributes | String | Custom HTML attributes. For example id="my-field".

## Available field types

### Text

Renders a single line text box.

### Textarea

Renders a multiline text box.

### Dropdown

Renders a dropdown with specified options.

### Checkbox

Renders a single checkbox.

### Checkbox List

Renders a list of checkboxes.

### Radio List

Renders a list of radio options, where only one item can be selected at a time.

### reCaptcha

Renders google reCaptcha box for SPAM protection.

Please visit [reCaptcha site](https://www.google.com/recaptcha/admin) to obtain credentials.

Next go to Settings > Form Builder > Google reCaptcha and fill your site key and secret.

> **Important note:** This field must have **g-recaptcha-response** as field name and **required|recaptcha** in validation section to work properly.

### File uploader

Renders a file uploader for regular files.

#### Files Validation

You can validate file types. Just specify file extensions like so: **mimes:jpg,jpeg,png**.

To validate max file size, use this syntax: **max:1024**. Max size value is in kilobytes.

To combine both validation rules use pipe (|). E.g. **mimes:jpg,jpeg,png|max:1024**.

For default, file uploader will allow to upload all file types which size not exceed 5mb size.

Uploaded files will be visible in sent email as mail attachments. You can also view them in Form Logs.

### Country select

Renders a dropdown with country options.

Use **country** as field name. This will allow to populate state options after country is selected.

> **Important note:** To use this and state select fields you must install **RainLab.Location** plugin.

### State select

Renders a dropdown with state options. This field depends on country select.

### Section

Renders a section with assigned fields. Useful to group multiple fields together. Fields has Section dropdown which is used to assign section to them.

File uploader field type is not currently supported in sections.

### Submit

Renders form submit button.

### Mail templates

Plugin uses mail templates created in CMS. To create new template, please go to Settings > Mail > Mail Templates.

Plugin will include basic responsive mail template, but you should customize it for your project.

### Reorder fields

**Reorder Fields** button will be visible in **Fields** tab, but only after you save the form. Remember to always save the form before reorder fields.

### Mail logging

Since version 1.0.4 Form Builder plugin have built in simple logging information about sent form. Form log record will contain filled form data by user and corresponding file attachments.

I recommend you to install [Mail stats & logger](http://octobercms.com/plugin/mja-mail) if you require extended functionality.

### Events

Plugin will fire **formBuilder.beforeSendMessage** event before sending email. You can use this to extend Form Builder default functionality.

In your extension plugin boot method listen for this event:

    Event::listen('formBuilder.beforeSendMessage', function ($form, $data, $files) {

    });

You will have access to form object, array with posted data and files collection (if form is with upload field).

If you **return true** from this event than this will stop default behavior of sending email message.

# Upgrade Guide

`1.2.6 to 1.2.7`: Plugin will register Contact Form Template and Default Form Template. If you would like to use new mail layout you need to create it manually from the source `/plugins/renatio/formbuilder/updates/mail/layouts/formbuilder/`. Layout code should be specified as `form_builder`. Assign newly created layout to the templates by updating them manually.  
`1.1.3 to 1.1.4`: Added **wrapper_class** to field properties. Update fields type manually if you want to use this.  
`1.0.1 to 1.1.0`: From version 1.1.0 plugin requires October build 300 and above.  