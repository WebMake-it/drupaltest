<?php

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
      '#type' => 'tel',
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
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // Handle submitted form data.
  }

  //End of dataForm class
}