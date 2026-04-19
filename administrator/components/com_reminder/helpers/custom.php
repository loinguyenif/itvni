<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

class TSCustom
{
    public static function currencyFormat($value, $number_decimal = 2, $currency_symbol = '')
    {
        $config = JComponentHelper::getParams('com_reminder');
        if ($number_decimal != 0) $number_decimal = $config->get('number_decimal', 2);

        $price = number_format((float) $value,  $number_decimal, $config->get('decimal_point', '.'), $config->get('thousand_separator', ','));
        $currency_display = $config->get('currency_display', 0);
        if (!$currency_symbol) $currency_symbol = $config->get('currency_symbol', '$');
        $return = '';

        if ($currency_display == 0) {
            $return = $currency_symbol . $price;
        } else {
            $return = $price . $currency_symbol;
        }

        return $return;
    }

    public static function replaceParams($content, $params = array())
    {
        // replace params
        foreach ($params as $key => $value) {
            $content = str_replace($key, $value, $content);
        }

        $content = str_replace('src="', 'src="' . JUri::base(), $content);
        return $content;
    }

    public static function sendMail($mailto, $subject, $body, $cc = "", $attachFileName = "", $replyto = null, $replytoname = null)
    {

        $app = JFactory::getApplication();
        $mailer = JFactory::getMailer();
        $config = JFactory::getConfig();

        $sender = array(
            $config->get('mailfrom'),
            $config->get('fromname')
        );

        $recipient = explode(',', $mailto); //$user->email;

        $mailer->setSubject($subject);
        $mailer->isHTML(true);
        $mailer->setBody($body);

        if (!empty($attachFileName)) {
            $mailer->addAttachment($attachFileName);
        }

        $mailer->addRecipient($recipient);
        if (!empty($cc)) {
            $cc = explode(',', $cc);
            foreach ($cc as $value) {
                $mailer->addCC($value);
            }
        }
        $mailer->setSender($sender);

        // Take care of reply email addresses
        if (is_array($replyto)) {
            $numReplyTo = count($replyto);
            for ($i = 0; $i < $numReplyTo; $i++) {
                $mailer->addReplyTo(array($replyto[$i], $replytoname[$i]));
            }
        } elseif (isset($replyto)) {
            $mailer->addReplyTo(array($replyto, $replytoname));
        }

        $send = $mailer->Send();

        if ($send !== true) {
            return false;
        } else {
            return true;
        }
    }

    public static function writeToLog($data = null, $name = '')
    {

        $dbg = ($data === null) ? ob_get_clean() : $data;
        if (!empty($dbg)) {
            if (is_array($dbg) || is_object($dbg))
                $dbg = '<pre>' . str_replace(array("\r", "\n", "\r\n"), "\r\n", print_r($dbg, true)) . '</pre>';

            $dbg = "\r\n" . '<h3>' . date('m.d.y H:i:s') . (!empty($name) ? (' - ' . $name) : '') . '</h3>' . "\r\n" . $dbg;

            jimport('joomla.filesystem.file');
            $file = 'logs/june.log';
            $file = rtrim(JPath::clean(html_entity_decode($file)), DS . ' ');
            if (!preg_match('#^([A-Z]:)?/.*#', $file) && (!$file[0] == '/' || !file_exists($file)))
                $file = JPath::clean(JPATH_ROOT . DS . trim($file, DS . ' '));
            if (!empty($file) && defined('FILE_APPEND')) {
                if (!file_exists(dirname($file))) {
                    jimport('joomla.filesystem.folder');
                    JFolder::create(dirname($file));
                }
                file_put_contents($file, $dbg, FILE_APPEND);
            }
        }
        if ($data === null)
            ob_start();
    }


    //intial Session
    public static function initalData()
    {
        $data = new stdClass();
        $session = JFactory::getSession();
        $data = $session->set('data', $data);
    }

    //put in Session
    public static function setData($key, $value)
    {
        $session = JFactory::getSession();
        $data = $session->get('data');

        if ($data !== null) {
            return $data->$key = $value;
        } else {
            self::initalData();
            $data = $session->get('data');
            return $data->$key = $value;
        }
    }

    //get in Session
    public static function getData($key, $default = null)
    {
        $session = JFactory::getSession();
        $data = $session->get('data');

        if ($data !== null && isset($data->$key)) {
            return $data->$key;
        }

        return $default;
    }

    //get All
    public static function getDataAll()
    {
        $session = JFactory::getSession();
        return $session->get('data');
    }

    //delete
    public static function clearData()
    {
        $mainframe = JFactory::getApplication();
        $mainframe->setUserState("data", '');
    }

    public static function setKeyData($key, $data)
    {
        if ($data) {
            $array_data = array();
            foreach ($data as $row) {
                $array_data[$row->$key] = $row;
            }
            return $array_data;
        }
        return $data;
    }

}
