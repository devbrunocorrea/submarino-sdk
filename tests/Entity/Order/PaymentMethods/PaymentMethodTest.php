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

namespace Gpupo\Tests\SubmarinoSdk\Entity\Order\PaymentMethods;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\SubmarinoSdk\Entity\Order\OrderTestCaseAbstract;

class PaymentMethodTest extends OrderTestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\SubmarinoSdk\Entity\Order\PaymentMethods\PaymentMethod';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'sequential' => 2,
            'id'         => 'string',
            'value'      => 12.99,
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    public function testCadaPedidoPossuiUmaColeçãoDeObjetosPaymentMethod()
    {
        foreach ($this->getList() as $order) {
            foreach ($order->getPaymentMethods() as $paymentMethod) {
                $this->assertInstanceOf('\Gpupo\SubmarinoSdk\Entity\Order\PaymentMethods\PaymentMethod',
                $paymentMethod);
            }
        }
    }

    /**
     * @testdox Possui método ``getSequential()`` para acessar Sequential
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterSequential(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('sequential', 'integer', $object, $expected);
    }

    /**
     * @testdox Possui método ``setSequential()`` que define Sequential
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterSequential(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('sequential', 'integer', $object);
    }

    /**
     * @testdox Possui método ``getId()`` para acessar Id
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterId(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('id', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setId()`` que define Id
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterId(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('id', 'string', $object);
    }

    /**
     * @testdox Possui método ``getValue()`` para acessar Value
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterValue(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('value', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setValue()`` que define Value
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterValue(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('value', 'number', $object);
    }
}
