<?php

/**
 * @file
 * Contains \Drupal\drupaltest\Form\dataForm.
 */

namespace Drupal\drupaltest\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class dataForm extends FormBase
{

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    // Unique ID of the form.
    return 'dataForm';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    // Create a $form API array.

    //Input field for first name
    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Your Name'),
    );

    //Input field for surname
    $form['surname'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Your Surname'),
    );

    //Input field for phone number
    $form['phone'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Your phone number'),
    );

    //submit button
    $form['save'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    // Validate submitted form data.

    //name must be at least 4 characters long
    if (strlen($form_state->getValue('name')) < 3) {
      $form_state->setErrorByName('name', $this->t('Name is too short. Minimum lenght: 4 characters.'));
    }

    //surname must be at least 4 characters long
    if (strlen($form_state->getValue('surname')) < 3) {
      $form_state->setErrorByName('surname', $this->t('Name is too short. Minimum lenght: 4 characters.'));
    }

    //phone can't be empty
    if (strlen($form_state->getValue('phone')) < 1) {
      $form_state->setErrorByName('phone', $this->t('Please fill Phone field.'));
    }

    //phone must be numeric
    if (!is_numeric($form_state->getValue('phone'))) {
      $form_state->setErrorByName('phone', $this->t('Phone field must have numeric value.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // Save submitted FORM data to database.

    //Start database connection
    $connection = \Drupal::database();

    //get Form values to store
    $storageValues = [
        'name' => $form_state->getValue('name'),
        'surname' => $form_state->getValue('surname'),
        'phone' => $form_state->getValue('phone'),
    ];

    $connection->insert('drupaltest')
        ->fields(['name', 'surname', 'phone'])
        ->values($storageValues)
        ->execute();

    //initialize transaction
    $transaction = $connection->startTransaction();

    //try to insert data to table OR return an error code
    /*try
    {
      $insertquery = $connection->insert('drupaltest')
          ->fields(['name', 'surname', 'phone'])
          ->values($storageValues);

      return $insertquery;
    }
    catch(Exception $e)
    {
      //roll back transaction in case of error
      $transaction->rollBack();
      $message = 'There is an error here:'.$e;
      \Drupal::logger('drupaltest')->error($message);
    }*/

  }

  //End of dataForm class
}