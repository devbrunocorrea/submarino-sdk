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

namespace Gpupo\SubmarinoSdk\Entity\Product\Sku;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string                                      getId()
 * @method                                             setId(string $id)
 * @method string                                      getName()
 * @method                                             setName(string $name)
 * @method string                                      getDescription()
 * @method                                             setDescription(string $description)
 * @method array                                       getEan()
 * @method                                             setEan(array $ean)
 * @method float                                       getHeight()
 * @method                                             setHeight(float $height)
 * @method float                                       getWidth()
 * @method                                             setWidth(float $width)
 * @method float                                       getLength()
 * @method                                             setLength(float $length)
 * @method float                                       getWeight()
 * @method                                             setWeight(float $weight)
 * @method int                                         getStockQuantity()
 * @method                                             setStockQuantity(integer $stockQuantity)
 * @method bool                                        getEnable()
 * @method                                             setEnable(boolean $enable)
 * @method Gpupo\SubmarinoSdk\Entity\Product\Sku\Price getPrice()
 * @method                                             setPrice(Gpupo\SubmarinoSdk\Entity\Product\Sku\Price $price)
 * @method string                                      getUpdatedAt()
 * @method                                             setUpdatedAt(string $updatedAt)
 * @method array                                       getUrlImage()
 * @method                                             setUrlImage(array $urlImage)
 * @method int                                         getCrossDocking()
 * @method                                             setCrossDocking(integer $crossDocking)
 */
class Sku extends EntityAbstract implements EntityInterface
{
    protected function setUp()
    {
        $this->setOptionalSchema(['height', 'width', 'length']);
    }

    public function getSchema()
    {
        return [
            'id' => 'string',
            'name' => 'string',
            'description' => 'string',
            'ean' => 'array',
            'height' => 'number',
            'width' => 'number',
            'length' => 'number',
            'weight' => 'number',
            'stockQuantity' => 'integer',
            'enable' => 'boolean',
            'price' => 'object',
            'updatedAt' => 'string',
            'urlImage' => 'array',
            'crossDocking' => 'integer',
        ];
    }

    protected function toStock()
    {
        return $this->piece('stockQuantity', 'quantity');
    }

    protected function toStatus()
    {
        return $this->piece('enable', 'enable');
    }
}
