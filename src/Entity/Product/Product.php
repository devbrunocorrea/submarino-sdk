<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/submarino-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 *
 */

namespace Gpupo\SubmarinoSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Product extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema(): array
    {
        return [
            'sku' => 'string',
            'name' => 'string',
            'description' => 'string',
            'status' => 'string',
            'qty' => 'number',
            'price' => 'number',
            'promotional_price' => 'number',
            'cost' => 'number',
            'weight' => 'number',
            'height' => 'number',
            'width' => 'number',
            'length' => 'number',
            'brand' => 'string',
            'ean' => 'string',
            'nbm' => 'string',
            'categories' => 'array',
            'images' => 'array',
            'specifications' => 'array',
        ];
    }
}
