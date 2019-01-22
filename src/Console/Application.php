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

namespace Gpupo\SubmarinoSdk\Console;

use Gpupo\CommonSdk\Console\AbstractApplication;
use Gpupo\SubmarinoSdk\Factory;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
final class Application extends AbstractApplication
{
    protected $commonParameters = [
        [
            'key' => 'client_id',
        ],
        [
            'key' => 'secret_key',
        ],
        [
            'key' => 'access_token',
        ],
        [
            'key' => 'env',
            'options' => ['sandbox', 'api'],
            'default' => 'sandbox',
            'name' => 'Version',
        ],
        [
            'key' => 'sslVersion',
            'options' => ['SecureTransport', 'TLS'],
            'default' => 'SecureTransport',
            'name' => 'SSL Version',
        ],
        [
            'key' => 'registerPath',
            'default' => false,
        ],
        [
            'key' => 'app_url',
        ],
    ];

    public function doRun(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<bg=green;options=bold>gpupo/submarino-sdk</>');
        $output->writeln('<options=bold>Atenção! Esta aplicação é apenas uma '.'ferramenta de apoio ao desenvolvedor e não deve ser usada no ambiente de produção!'.'</>');

        try {
            return parent::doRun($input, $output);
        } catch (\Exception $exception) {
            $output->writeln($exception->getmessage());
        }
    }

    public function factorySdk(array $options, $loggerChannel = 'bin', $verbose = false, CacheInterface $cache = null)
    {
        return  new Factory($options, $this->factoryLogger($loggerChannel, $verbose), $cache);
    }
}
