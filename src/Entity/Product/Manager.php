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

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\CommonSchema\ArrayCollection\Catalog\Product\Product;
use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\SubmarinoSdk\Entity\AbstractManager;
use Gpupo\SubmarinoSdk\Translator\AdTranslator;

class Manager extends AbstractManager
{
    protected $entity = Product::class;

    protected $maps = [
        'save' => ['POST', '/products'],
        'findById' => ['GET', '/products/{itemId}'],
        'update' => ['PUT', '/products/{itemId}'],
        'fetch' => ['GET', '/product?page={page}&per_page={limit}'],
    ];

    public function save(EntityInterface $entity, $route = 'save')
    {
        $existent = $entity->getPrevious();

        if ($existent) {
            return $this->update($entity, $existent);
        }

        $product = $this->translateFrom($entity);

        $body = ['product' => json_decode($product->toJson($route), true)];

        return $this->execute($this->factoryMap($route), json_encode($body));
    }

    public function update(EntityInterface $entity, EntityInterface $existent = null, $params = null)
    {
        $product = $this->translateFrom($entity);

        $update = [];
        foreach (['qty', 'price', 'promotional_price'] as $field) {
            if (isset($product[$field])) {
                $update[$field] = $product[$field];
            }
        }

        $body = ['product' => $update];

        return $this->execute($this->factoryMap('update', $params), json_encode($body));
    }

    public function translateFrom(EntityInterface $entity)
    {
        $translator = new AdTranslator();
        $translator->setForeign(new TranslatorDataCollection($entity->toArray()));

        return $translator->import();
    }

    protected function factoryEntity($data): CollectionInterface
    {
        $product = new Product($data);
        $product = $this->factoryORM($product, 'Entity\Catalog\Product\Product');
        // $translated = $this->translateMovementDataToCommon($array);
        // $ac = new AC($translated);
        // $movement = $this->factoryORM($ac, 'Entity\Banking\Movement\Movement');

        return $product;
    }
}
