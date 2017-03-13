<?php

namespace Drupal\blendle\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Site\Settings;

/**
 * Class AdminSettingsForm.
 *
 * @package Drupal\blendle\Form
 */
class AdminSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'blendle.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('blendle.settings');

    $form['provider_uid'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Provider UID'),
      '#description' => $this->t('The provider UID as provided by Blendle.'),
      '#default_value' => $config->get('provider_uid'),
    ];

    $form['public_key'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Public Key'),
      '#description' => $this->t('The public key as provided by Blendle.'),
      '#default_value' => $config->get('public_key'),
    ];

    $api_secret = Settings::get('blendle_api_secret', NULL);

    $description = !empty($api_secret) ? t('API secret correctly setup in settings.php') : t('API secret missing. Please add the following line to your settings.php: !code', array('!code' => '<p><code>$settings[\'blendle_api_secret\'] = \'YOUR API SECRET\';</code></p>'));
    $form['api_secret'] = [
      '#type' => '#item',
      '#title' => $this->t('API Secret'),
      '#markup' => $description,
    ];

    $form['is_production'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Production'),
      '#description' => $this->t('Check this box to tell the Blendle API we are running on production'),
      '#default_value' => $config->get('is_production'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('blendle.settings')
      ->set('provider_uid', $form_state->getValue('provider_uid'))
      ->set('public_key', $form_state->getValue('public_key'))
      ->set('is_production', $form_state->getValue('is_production'))
      ->save();
  }
}
