<?php

namespace Docksal\DocksalTugboat\Blt\Plugin\EnvironmentDetector;

use Acquia\Blt\Robo\Common\EnvironmentDetector;

class DocksalDetector extends EnvironmentDetector {
  public static function getEnvironments() {
    $envs = parent::getEnvironments();
    return $envs + ['docksal' => self::isDocksalEnv()];
  }

  public static function isDocksalEnv() {
    return isset($_ENV['docksal']) && $_ENV['docksal'] == true;
  }

  public static function getCiSettingsFile() {
    return sprintf('%s/vendor/docksal/blt-docksal/settings/tugboat.settings.php', dirname(DRUPAL_ROOT));
  }
}