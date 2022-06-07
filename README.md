# plg_fields_urlparams
Creates a textfield that retrieves the value from the url parameter (only for Joomla 3!)

# usage
You can use this field for example in your user registration or in your contact form.

# installation
Install the zip package through your joomla extension installer and afterwards go to Extensions » Plugins and publish your plugin.

# parameter
The default parameter name is "subject" so if you link to your form you can include a parameter in the url that will prefill the value of your field.
The link https://mydomain.com/contact.html?subject=Inquiry will cause this field to have the value "Inquiry"
The part before the ?subject= part has to be the url of your form.

The default parameter can be changed:
1) In the global parameter options
2) In the field parameters

So you can use this field to prefill forms with different values.

# example usage
- You have a website with a showcase of several products and an inquiry link that leads to the contact form. 
With this field you can add a parameter to the url to prefill the field with your product id or whatever.

- You have a "register now" advertising over banners or where ever. Add a parameter to the register link to know where the people came from.

# hint
You can set this field on readonly and or hide it when read only with the joomla core parameters inside the field options.
