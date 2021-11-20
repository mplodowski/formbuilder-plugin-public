# Form Builder plugin

Plugin allows you to build custom front-end forms with ease.
Without any technical knowledge create functional forms for all your needs.

> This plugin is fully compatible with the latest version of OctoberCMS 2.x from version 2.0.1.

![OctoberCMS Backup Manager](https://octobercms.com/storage/app/uploads/public/619/943/ffe/619943ffec690046671201.png)

## Features
* Build and manage your forms in OctoberCMS backend
* Use custom HTML markup for fields
* Create custom fields
* Reorder fields
* Example form with all default form controls
* Simple contact form included
* Files and images uploader
* Basic responsive mail templates
* Google reCaptcha support
* RainLab Translate Plugin support
* RainLab Location Plugin support
* RainLab Pages Plugin support to use form as snippet
* Duplicate form and field types
* Reply to functionality and autoresponder with custom mail template
* Form logs with export functionality
* Event for extending default functionality

## Why is this a paid plugin?

Something that is free has little or no perceived value. Users do not commit to free products and only use them until something else looks nice and is free comes along. When I invest my time in the development of a new plugin I commit to supporting and maintaining it. I ask my customers to do the same. I do not make money from this plugin by advertisements, upgrades or additional services like hosting or setup.

Did you know that 30% of your purchase or donation goes to help fund the October Project?

My plugins take many hours to develop (40-120+) and even more hours to document and maintain. My paid plugins have to pay for both this time, and the time I am spending on free plugins and less successful paid plugins. This means that it will take even a successful plugin years to become profitable. Please consider buying an extended license if you want me to continue to maintain these plugins for the very small fee I ask in return or hire me for adding functionality that you feel is missing but valuable.

## Like this plugin?

If you like this plugin, give this plugin a Like or Make donation with [PayPal](https://www.paypal.me/mplodowski).

## My other plugins

Please check my other [plugins](https://octobercms.com/author/Renatio).

## Support

Please use [GitHub Issues Page](https://github.com/mplodowski/formbuilder-plugin-public/issues) to report any issues with plugin.

> Reviews should not be used for getting support, if you need support please use the Plugin support link.

# Documentation

## Usage

After installation plugin will register backend **Form Builder** menu position. From there you will be able to manage your forms.

There will be three sub-menus, Forms, Field types and Form logs. Forms list all created forms. Field types list all available field types. Form logs list all forms submissions.

There will two examples forms included after installation. Simple contact form and default form, that will demonstrate all available fields.

Plugin will register `renderForm` component to use it on CMS page. After adding component to CMS page, you must inspect it (by clicking on it) and choose the form.

Plugin uses Ajax Framework to process form. Remember to add following code in layout:

```
{% framework extras %}
{% scripts %}
```

## Custom HTML markup for fields

You can change HTML markup for each field by going to Form Builder -> Field types and updating the field type. Recommended approach is to duplicate field type and then modify it as you wish.

## Custom field types

You can create custom field types by going to Form Builder -> Field types and clicking **New field type** button.

For example if you want to create **Email** field type just duplicate the markup from **Text** field type and change the type of the input from text to email.

Now after saving this field it will be possible to use it in your form.

In markup section you can use Twig and following variables:

Property | Type | Description
--------------------- | --------------------- | ---------------------
label | String | Label for the field.
label_class | String | Label CSS classes.
name | String | HTML name attribute. Also used in mail template.
default | String | Default value for the field.
comment | String | Help block for the field.
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

Next go to Settings -> Form Builder -> Google reCaptcha and fill your site key and secret.

> **Important note:** This field must have **g-recaptcha-response** as field name and **required|recaptcha** in validation section to work properly.

### Files uploader

Renders a file uploader for regular files.

> **Important note:** You must install [Uploader Plugin](https://octobercms.com/plugin/responsiv-uploader) to use this field.

### Images uploader

Renders an image uploader for image files.

> **Important note:** You must install [Uploader Plugin](https://octobercms.com/plugin/responsiv-uploader) to use this field.

### Country select

Renders a dropdown with country options.

> **Important note:** You must install [Location Plugin](https://octobercms.com/plugin/rainlab-location) to use this field.

### State select

Renders a dropdown with state options. This field depends on country select.

> **Important note:** You must install [Location Plugin](https://octobercms.com/plugin/rainlab-location) to use this field.

### Section

Renders a section heading and subheading. Useful for grouping fields.

### Submit

Renders form submit button.

## Form Logs

Form Builder plugin have built in simple logging information about sent form. Form log record will contain filled form data by user and corresponding file attachments.

### Events

Plugin will fire **formBuilder.beforeSendMessage** event before sending email. You can use this to extend Form Builder default functionality.

In your extension plugin boot method listen for this event:

    Event::listen('formBuilder.beforeSendMessage', function ($form, $data) {

    });

You will have access to form object and array with posted data.

If you return **false** from this event then this will stop default behavior of sending email message.
