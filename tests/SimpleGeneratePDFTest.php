<?php

use Ariefhikam\LaraChromePdf\LaraChromePdfProvider;
use Ariefhikam\LaraChromePdf\Facades\Facade;
use Orchestra\Testbench\TestCase as TestBench;
use Illuminate\Contracts\Config\Repository;

class SimpleGeneratePDFTest extends TestBench
{
    protected function getPackageProviders($app)
    {
        return [
            LaraChromePdfProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ChromePdf' => Facade::class,
        ];
    }

    protected function defineEnvironment($app)
    {
        tap($app->make('config'), function (Repository $config) {
            $config->set('view.paths', [
                __DIR__.'/resources/views',
            ]);
        });
    }

    public function test_simple_generate_pdf()
    {
        $pdf = ChromePdf::view('simple')->download();
        dd($pdf);
        $this->assertTrue(true);
    }
}
