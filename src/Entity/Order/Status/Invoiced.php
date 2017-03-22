<?php

/*
 * This file is part of gpupo/submarino-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://www.gpupo.com/>.
 */

namespace Gpupo\SubmarinoSdk\Entity\Order\Status;

class Invoiced extends \Gpupo\SubmarinoSdk\Entity\Order\Invoiced
{
    public function getSchema()
    {
        return array_merge(
            parent::getSchema(),
            [
                'danfeXml' => 'string',
            ]
        );
    }

    public function setRequired()
    {
        return $this->setRequiredSchema([
            'number',
            'line',
            'issueDate',
            'key',
        ]);
    }
}
