<?php
/*
  Zerfrex (R) RAD ADM
  Zerfrex RAD for Administration & Data Management

  Copyright (c) 2013-2022 by Jorge A. Montes Pérez <jorge@zerfrex.com>
  All rights reserved. Todos los derechos reservados.

  Este software solo se puede usar bajo licencia del autor.
  El uso de este software no implica ni otorga la adquisición de
  derechos de explotación ni de propiedad intelectual o industrial.
 */


/**
 * @package data-view
 */

namespace zfx;

use DateTime;

/**
 * String Map Field View
 */
class FieldViewDate extends FieldViewString
{
    public function __construct()
    {
        parent::__construct();
        $this->maxLength = 12;
    }

    // --------------------------------------------------------------------

    public function render($value, $packedPK = '')
    {
        if (!is_a($value, '\DateTime')) {
            $value = DateTime::createFromFormat(Config::get('dbDateFormat'), (string)$value);
            if (!$value) {
                $value = NULL;
            }
        }
        $locValue = $this->getLocalizer()->getDate($value);
        $this->renderView('date', $locValue, ['datetimeValue' => $value, 'pk' => $packedPK]);
    }

    // --------------------------------------------------------------------

    public function getOwnCssClass()
    {
        return 'zjFvDate';
    }

    // --------------------------------------------------------------------

    public function getJSH()
    {
        return 'dt';
    }
    // --------------------------------------------------------------------
}
