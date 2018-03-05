# Custom Drupal 7 Modules
This website demonstrates custom module development for Drupal 7. The modules implements general use of the menu system, the Render API, custom theme functions,  the Form API, as well as, SQL language to query the database.

## Menu Magic module
###### Adds paths and items to Drupal's menu system to display a page. Creates new menu items using the percent wildcard in the URL to pass in dynamic arguments to both the callback function and an access callback. The Menu Magic module implements a tab style menu, adds to the contextual menu while a page is in teaser view, as well as, uses an autoloader for the node object and attaches a separate PHP file for organization purposes.

###### The code adds an image to the page, every time this image displays on a page the attached CSS file loads and provides a red boarder around the image.  The cache property allows for PHP process such as loading information from a database or querying  a third party API to cache the output for reuse. The Menu Magic module uses a render able array to create content for the page, the theme property of a custom element allows another module or theme to change the unordered list into an order list without access to this module's code.

## Menu Mangler module
###### Changes the unordered list that is created by the Menu Magic module into an ordered list without hacking the module or writing regexp to change the HTML.

## Spy Glass module
###### 	Declares a custom theme function which displays theme-able data on the page wrapped in HTML but done in a way that sanitizes all potentially user input  data. The custom theme function is then redefined to put the HTML output into an attached template file.  The code implements a preprocess function to create variables that are sanitized before being passed into the template file. Results of using a separate template file means that this file can be moved into the theme folder for changes to the output without changes to the custom module code. This is the benefit of outputting in a theme-able format.

## Form Fun module
###### The "Cake or Pie?" page creates, submits, and validates a simple form. The code demonstrates how properties of an element (ie . #type and #title) can not only be used to display what the form looks like, but also can effect how the form is processed. The "I'm Lost" page uses the #tree property to keep values in an array while maintains the structure without collapsing or flattening the data which causes only the last value entered in a particular field to be saved. The "Partners!" page demonstrates the states system or dependent fields on a form, when the checkbox is clicked other fields are shown. The code makes use of a jQuery super selector to find  then select the form element.
## Alter module
###### Demonstrates altering a form that another module has created. The code changes the help text under Confirm password on the "User Profile form", as well as, creates custom validation to insure unsecure passwords are not entered. The Alter module also attaches a .inc file which displays a system settings form for blacklisting passwords used only by a site administrator. 

## Select module
###### General of use the SQL language in conjunction with Drupal to query the database. This module calculates the number of pages that are published and unpublished for each content type. The code creates a page under "Reports " in Admin section to display the results of a query after the data has been converted to an object then printed to the page.
