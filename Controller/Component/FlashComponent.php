<?php
Class FlashComponent extends Component {
    public $components  = array('Session');

    public  $settings     = array();
    private $_defaults   = array(
        'style'      => 'AlertifyBootstrap',
        'class'      => array(
            'flash'  => true
        )
    );

    public function __construct(ComponentCollection $Collection, $settings = array()) {
        parent::__construct($Collection, $settings);
        $this->settings = array_merge($this->_defaults, $settings);
    }

    public function initialize(Controller $Controller) {}
    public function startup(Controller $Controller) {}
    public function beforeRender(Controller $Controller) {}
    public function shutdown(Controller $Controller) {}


    public function success($message, $element = null, $params = array()) {
        $method = sprintf('%s_%s', Inflector::underscore($this->settings['style']), 'success');
        if (method_exists($this, $method)) {
            return call_user_func_array([ &$this, $method ], func_get_args());
        }
    }

    public function log($message, $element = null, $params = array()) {
        $method = sprintf('%s_%s', Inflector::underscore($this->settings['style']), 'log');
        if (method_exists($this, $method)) {
            return call_user_func_array([ &$this, $method ], func_get_args());
        }
    }

    public function failure($message, $element = null, $params = array()) {
        $method = sprintf('%s_%s', Inflector::underscore($this->settings['style']), 'failure');
        if (method_exists($this, $method)) {
            return call_user_func_array([ &$this, $method ], func_get_args());
        }
    }

    // TITTER BOOTSTRAP
    /**
     * Twitter bootstrap alert
     *
     * @param  string $status  (success | info | waring | failure)
     * @param  string $message
     * @param  string $title
     * @param  array  $vars    Variables injected to elements (you can override it with $vars['elment'] = 'Views/Elements/myflash.ctp')
     * @return void
     */
    public function twitter($status, $message, $title, $vars = array()) {
        $this->settings['class']['alert']           = true;
        $this->settings['class']["alert-{$status}"] = true;
        $this->settings['type']                     = 'bootstrap';

        $_settings          = array_merge($this->settings, $vars);
        $_settings['class'] = implode(' ', array_keys($_settings['class']));
        $_settings['title'] = $title;

        $this->Session->setFlash($message, $_settings['element'], $_settings);
    }

    public function twitter_success($message, $title = '', $vars = array()) {
        $this->twitter('success', $message, $title, $vars);
    }

    public function twitter_failure($message, $title = '', $vars = array()) {
        $this->twitter('error', $message, $title, $vars);
    }

    public function twitter_warning($message, $title = '', $vars = array()) {
        $this->twitter('warning', $message, $title, $vars);
    }

    public function twitter_info($message, $title = '', $vars = array()) {
        $this->twitter('info', $message, $title, $vars);
    }


    // ALERTIFY
    public function alertify_bootstrap_failure($message, $title = null, $params = array()) {
        $this->Session->setFlash($message, $this->settings['style'], array_merge($params, ['plugin' => 'Flash', 'class' => 'error']));
    }

    public function alertify_bootstrap_success($message, $title = null, $params = array()) {
        $this->Session->setFlash($message, $this->settings['style'], array_merge($params, ['plugin' => 'Flash', 'class' => 'success']));
    }

    public function alertify_bootstrap_log($message, $title = null, $params = array()) {
        $this->Session->setFlash($message, $this->settings['style'], array_merge($params, ['plugin' => 'Flash', 'class' => 'log']));
    }

}

