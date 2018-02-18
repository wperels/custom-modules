<?php

/* 
 * System settings form for blacklisting passwords
 */
function alter_passwords_form($form, &$form_state) {
  $form['alter_badpasswords'] = array( // name fields with the module name first, add fieldset or container names as well.   
      '#type' => 'textfield',
      '#title' => t('Bad Passwords'),
      '#default_value' => variable_get('alter_badpasswords'), // gets data from the variable table in db.
      '#description' => t('Enter a list of "bad passwords" seperated by commas'),
  );
  return (system_settings_form($form));  // $form wrapped in function that adds field to admin page, submit button, & validation     
}
